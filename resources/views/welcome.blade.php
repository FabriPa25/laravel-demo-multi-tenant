<x-layout>

    @auth
        <div class="main-content">
            <h2 style="margin-bottom: 8px">Benvenuto, {{ Auth::user()->name }}!</h2>
            <p style="color: #888; margin-bottom: 24px">Questa è la tua dashboard.</p>

            <div class="stats-row">
                <div class="stat-card blue">
                    <div class="stat-label">La tua azienda</div>
                    <div class="stat-value" style="font-size: 16px; padding-top: 4px">
                        {{ Auth::user()->company->name ?? '—' }}
                    </div>
                </div>
                <div class="stat-card green">
                    <div class="stat-label">Clienti registrati</div>
                    <div class="stat-value">
                        {{ Auth::user()->company ? Auth::user()->company->clients()->count() : 0 }}
                    </div>
                </div>
            </div>

            <a href="{{ route('clients.index') }}" class="btn btn-primary">Vai ai clienti</a>
        </div>
    @endauth

    @guest
        @include('auth.login')
    @endguest

</x-layout>