<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $check = $request->only("email", "password");

        if (Auth::attempt($check)) {
            $request->session()->regenerate();
            return redirect()->route("admin.event.home");
        }

        return back()->with(["message" => "Email or password not correct"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
}
