<?php

namespace App\Http\Controllers\Auth;

use Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller

{
    public function __construct()
    {
        $this->middleware('guest:user', ['except' => ['logout']]);
    }

    public function login(Request $request)
    {
        $valid =  $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required',

        ]);

        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended(route('user-dashboard'));
        }
        Session::flash('error', "Invalid email or password.");

        // return $request;
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
