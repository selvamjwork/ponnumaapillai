<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class IsProfileCompleted
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
        if (!$request->is('user/update-profile') && \Auth::check()) 
        {
            $user = json_decode(\Auth::user(),true);

            $ProfileCompleted = $user['profile_completed'];
            unset($user['mobile_verified']);
            unset($user['profile_completed']);
            $isNotCompleted = false;

            if($isNotCompleted && !$ProfileCompleted)
            {
                session()->flash('profileCompleted', 'Please Complete your Profile and get 10 points.');
            }

            if(!$isNotCompleted && $ProfileCompleted)
            {
                DB::table('users')->where('id','=',$user['id'])->update(['profile_completed'=>1]);
            }

        }
        return $next($request);
    }
}
