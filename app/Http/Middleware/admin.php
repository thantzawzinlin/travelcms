<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class admin
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
       if(!Auth::user()->admin)
       {
           toastr()->info('You do not have permission to perform this tesks');

            return redirect()->back();
       }
       return $next($request);
    }
     
}
