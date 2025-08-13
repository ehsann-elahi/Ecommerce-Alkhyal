<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'newsletter_usr_email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->newsletter_usr_email,
        ]);

        return redirect()->back()->with([
            'variant' => 'success',
            'message' => 'Subscribe Successfully.'
        ]);
    }
}
