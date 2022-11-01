<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;


class LoginController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
  

public function store(Request $request)
{
     $request->validate([
        'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
    ]);

    if (Auth::guard('admin')->attempt($request->only('email','password'),$request->filled('remember'))) {
        $request->session()->regenerate();

        return redirect()->intended('/admin/home');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
  
}
