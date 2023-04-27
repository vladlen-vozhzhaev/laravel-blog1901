<?php

namespace App\Http\Middleware;

use App\Models\BindRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userId = auth()->user()->getAuthIdentifier();
        $bindRole = BindRole::where('user_id', $userId)->first();
        // $bindRole->role_id  ==== vip(1)
        if(!empty($bindRole) and $bindRole->role_id == 1)
            return $next($request);
        else{
            return redirect()->intended('/');
        }
    }
}
