<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureCompany
{
    /**
     * Controlla che l'utente appartenga alla stessa azienda del cliente
     * che sta cercando di visualizzare o modificare.
     * Serve per isolare i dati tra tenant diversi.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('client')) {
            $client = $request->route('client');

            // se il cliente non appartiene all'azienda dell'utente, blocca
            if ($client->company_id !== Auth::user()->company_id) {
                abort(403, 'Non hai i permessi per accedere a questo cliente.');
            }
        }

        return $next($request);
    }
}