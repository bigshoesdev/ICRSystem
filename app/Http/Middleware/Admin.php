<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        if (Auth::check()){
            $user = Auth::user();
            $route = $request->route()->getName();
            if ($user->admin == 1){
                return $next($request);
            }
            if ($user->admin == 2) {
                if( strpos($route, 'admin.posts.') === 0 || strpos($route, 'admin.category.') === 0 || strpos($route, 'admin.tag') === 0)
                {
                    return $next($request);
                }
            }
            if ($user->admin == 3) {
//                if( strpos($route, 'adminSupports.') === 0 ||  strpos($route, 'adminSupport.') === 0 )
//                {
//                    return $next($request);
//                }
            }
            Session::flash('message', trans('general/message.not_have_permission'));
            Session::flash('type', 'error');
            Session::flash('title', trans('general/message.per_not_grant'));

            return redirect()->route('dashboard');
        }
        return abort(404);
    }
}
