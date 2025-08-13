<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        $promotion = Promotion::first();
        return view('admin.promotion.index', compact('promotion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'redirect_link' => 'nullable|url',
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480', // Max 20MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB
        ]);

        // Sirf ek promotion hai, to first record fetch kar lo
        $promotion = Promotion::first() ?? new Promotion();

        // Agar video upload ho rahi hai, to purani video delete karo
        if ($request->hasFile('video')) {
            if ($promotion->video_path && Storage::disk('public')->exists($promotion->video_path)) {
                Storage::disk('public')->delete($promotion->video_path);
            }

            // Nayi video save karo
            $videoPath = $request->file('video')->store('promotion_videos', 'public');
            $promotion->video_path = $videoPath;

            // Agar video upload ho gayi, to purani image bhi hata do (sirf ek hi media allow hai)
            if ($promotion->image && Storage::disk('public')->exists($promotion->image)) {
                Storage::disk('public')->delete($promotion->image);
                $promotion->image = null;
            }
        }

        // Agar image upload ho rahi hai, to purani image delete karo
        if ($request->hasFile('image')) {
            if ($promotion->image && Storage::disk('public')->exists($promotion->image)) {
                Storage::disk('public')->delete($promotion->image);
            }

            // Nayi image save karo
            $imagePath = $request->file('image')->store('promotion_images', 'public');
            $promotion->image = $imagePath;

            // Agar image upload ho gayi, to purani video bhi hata do (sirf ek hi media allow hai)
            if ($promotion->video_path && Storage::disk('public')->exists($promotion->video_path)) {
                Storage::disk('public')->delete($promotion->video_path);
                $promotion->video_path = null;
            }
        }

        // Update other fields
        $promotion->redirect_link = $request->redirect_link;
        $promotion->is_active = $request->has('is_active');
        $promotion->save();

        return redirect()->back()->with('success', 'Promotion updated successfully.');
    }
}
