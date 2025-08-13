<?php

namespace  App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hash;

class UserController extends Controller
{

    public function userregister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->Route('login')->with([
                'variant' => 'danger',
                'message' => 'This email is already registered. Please log in.'
            ]);
        }

        $data = $request->all();

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->Route('login')->with([
            'variant' => 'success',
            'message' => 'Created Successfully.'
        ]);
    }

    public function dashboard()
    {
        $user_id = Auth::guard('user')->id();

        // Fetch all orders for the authenticated user
        $orders = Order::where('user_id', $user_id)->count();

        // Optimize sales calculation by querying only confirmed orders
        $sales = Order::where('user_id', $user_id)
            ->where('status', 1)
            ->sum('total_price');

        return view('user.dashboard', compact('orders', 'sales'));
    }


    public function profile()
    {
        $profile = UserProfile::whereUserId(auth()->user()->id)->first();
        return view('user.profile', compact('profile'));
    }

    public function profilesave(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:190',
            'mobile_number' => 'required|string|max:190',
            'address' => 'required|string|max:190',
            'email' => 'required|max:190|email',
            'image' => 'image|mimes:jpg,png',
        ]);
        $data = array(
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'email' => $request->email,
            'user_id' => auth()->user()->id,
        );

        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/upload/profile', $name);

            $data['image'] = $name;
        }

        auth()->user()->update($data);
        UserProfile::create($data);
        return redirect()->Route('user-dashboard')->with([
            'variant' => 'success',
            'message' => 'Profile Created Successfully.'
        ]);
    }

    public function profileupdate(Request $request)
    {
        $data = [
            'name' => $request->name,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'email' => $request->email,
        ];

        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/upload/profile', $name);

            $data['image'] = $name;
        }

        auth()->user()->update($data);
        UserProfile::whereUserId(auth()->user()->id)->update($data);
        return redirect()->Route('user-dashboard')->with([
            'variant' => 'success',
            'message' => 'Profile Update Successfully.'
        ]);
    }

    public function userchangepassword()
    {
        return view('user.changepassword');
    }

    public function userupdatepassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed', // Ensure password is confirmed
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->withErrors([
                'old_password' => 'The provided old password does not match our records.'
            ]);
        }

        $data = [
            'password' => Hash::make($request->new_password),
        ];

        auth()->user()->update($data);
        return redirect()->Route('user-dashboard')->with([
            'variant' => 'success',
            'message' => 'Update Password Successfully.'
        ]);
    }
}
