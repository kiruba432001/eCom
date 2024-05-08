<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return Inertia::render('AdminLogin');
    }

    public function login(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    
    if (Auth::attempt($credentials)) {
        if (Auth::user()->role_id==1){
            return response()->json(['success' => true]);
        }
        elseif (Auth::user()->role_id==2){
            return response()->json(['success' => true]);
        }
    }

    
    return response()->json(['success' => false], 401);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
