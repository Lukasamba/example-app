<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class AdminCheck
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
        if(Session()->has('userInfo')){
            $currentId = Session()->get('userInfo')['id'];
            $isAdmin = DB::table('users')->where('id', $currentId)->value('admin');
            if($isAdmin == 'YES'){
                return $next($request);
            }
            else {
                return redirect('/');
            }
        }
        else {
            return redirect('login')->with('fail','You have to login first.');
        }
    }
}
