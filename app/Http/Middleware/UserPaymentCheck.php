<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Auth;

class UserPaymentCheck
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
        $user = $request->user();
        $created_at = new Carbon(($user->payment_date));
        $days = Carbon::now()->diffInDays($created_at);
        $expired_date = Carbon::parse($created_at)->addMonths(12)->format('d-m-Y');
        if ($days >= 355 && $days < 365) {
            session()->flash('error', 'This is a reminder that your membership with Ponnumaapillai expired on '.$expired_date.' and you are now within your membership grace period.');
        }
        if ($days >= 365) {
            $user = Auth::user();
            $user->payment_completed = '0';
            $user->update();
            Auth::logout();
            return redirect()->back()->with('error', 'your membership grace period!');
        }
        return $next($request);
    }
}
