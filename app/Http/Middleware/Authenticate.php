<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        

        if (! $request->expectsJson()) {

            if(($request->is('admin') || $request->is('admin/*'))){
                return route('admin-login.create');
            }
    
            return route('login');
    
        }

      
    }
}
