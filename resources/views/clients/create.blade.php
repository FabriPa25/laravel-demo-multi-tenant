<x-layout>

    <div class="form-card">
        <h4 class="form-title">Aggiungi Cliente</h4>

        <form method="POST" action="{{ route('clients.store') }}">
            @csrf

            <div class="form-group">
                <label class="form-label">Nome completo</label>
                <input type="text" name="name" class="form-input" value="{{ old('name') }}" placeholder="es. Mario Rossi" required>
                @error('name')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ old('email') }}" placeholder="es. mario@azienda.com" required>
                @error('email')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Salva</button>
                <a href="{{ route('clients.index') }}" class="btn btn-ghost">Annulla</a>
            </div>
        </form>
    </div>

</x-layout>