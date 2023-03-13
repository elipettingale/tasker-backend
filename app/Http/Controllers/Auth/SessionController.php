<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return $this->error('The credientials you have provided are invalid.');
        }

        $request->session()->regenerate();

        return $this->success();
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return $this->success();
    }
}
