<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    // Mostra la lista dei clienti dell'azienda loggata
    public function index()
    {
        $clients = Client::where('company_id', Auth::user()->company_id)->get();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        // uso la paginazione per non caricare tutti i clienti in memoria
        // se fossero 1000 record fare ->get() sarebbe troppo pesante
        $clients = Client::where('company_id', Auth::user()->company_id)
                    ->latest()
                    ->paginate(10);

        return view('clients.create', compact('clients'));
    }

    // Salva un nuovo cliente associato all'azienda corrente
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // TODO: aggiungere validazione email duplicata per company

        $data = $request->only('name', 'email');
        $data['company_id'] = Auth::user()->company_id;

        Client::create($data);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Aggiorna i dati del cliente
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        $client->update($request->only('name', 'email'));

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        // TODO: valutare soft delete in futuro
        $client->delete();

        return redirect()->route('clients.index');
    }
}