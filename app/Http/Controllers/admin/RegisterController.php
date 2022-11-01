<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisterController extends Controller
{

    public function index()
    {
        return view('admin.home');
    }

    public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect(RouteServiceProvider::admin_HOME);
    }
}
