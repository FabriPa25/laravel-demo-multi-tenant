<x-layout>

    <div class="stats-row">
        <div class="stat-card blue">
            <div class="stat-label">Clienti totali</div>
            <div class="stat-value">{{ $clients->count() }}</div>
        </div>
        <div class="stat-card green">
            <div class="stat-label">Azienda</div>
            <div class="stat-value" style="font-size: 16px; padding-top: 4px">
                {{ Auth::user()->company->name ?? '—' }}
            </div>
        </div>
        <div class="stat-card red">
            <div class="stat-label">Questo mese</div>
            <div class="stat-value">
                {{ $clients->where('created_at', '>=', now()->startOfMonth())->count() }}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Lista Clienti</div>
            <div class="card-count">{{ $clients->count() }} clienti</div>
            <div class="card-actions">
                <a href="{{ route('clients.create') }}" class="btn btn-primary btn-sm">+ Aggiungi</a>
            </div>
        </div>

        @if($clients->isEmpty())
            <div class="empty-state">
                <!-- <div class="empty-title"></div> -->
                <div class="empty-title">Nessun cliente trovato</div>
                <div class="empty-sub">Inizia aggiungendo il primo cliente</div>
                <a href="{{ route('clients.create') }}" class="btn btn-primary">+ Aggiungi cliente</a>
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Aggiunto il</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>
                            <div class="client-cell">
                                <div class="client-avatar">
                                    {{ strtoupper(substr($client->name, 0, 2)) }}
                                </div>
                                <span class="client-name">{{ $client->name }}</span>
                            </div>
                        </td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="actions-cell">
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-edit">Modifica</a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo cliente?')">
                                        Elimina
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-layout>