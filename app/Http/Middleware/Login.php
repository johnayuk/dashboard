<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;


use Closure;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->role == 'admin'){

            return $next($request);

        }elseif (Auth::user()->role == 'doctor') {

            return redirect('profile');
        }else{

            return redirect('/');

        }

    }
}
