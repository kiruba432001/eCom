<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                    return response()->json(['status' => true],200);
            } 
            return response()->json(['status' => false], 200);
        } elseif(Auth::user() && Auth::user()->role_id == User::ADMIN) {
            return Inertia::render('AdminDashboard');
        }
        return Inertia::render('AdminLogin');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
