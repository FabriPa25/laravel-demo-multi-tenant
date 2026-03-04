<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureCompany
{
    public function handle(Request $request, Closure $next)
    {
        // Controlla se c'è un cliente nella rotta
        if ($request->route('client')) {
            $client = $request->route('client');
            if ($client->company_id !== Auth::user()->company_id) {
                abort(403, 'Access denied'); // blocca accesso
            }
        }
        return $next($request);
    }
}