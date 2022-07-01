<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Client\ResponseSequence;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ( User::where('token',$request->header('Authorization'))->count() > 0 ) {
            return $next($request);
        }
       else return response(['message' => 'you are a bitch',
                             'Message' => 'go to your dashboard to get your token or register to get your token'],404);


    }
}
