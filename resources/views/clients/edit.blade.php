<x-layout>
<div class="row d-flex justify-content-center mb-5">
     <div class="form-card mt-5">
        <h4 class=" text-center">Modifica Cliente</h4>      
    </div>
</div>
   


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-4">

  <form method="POST" action="{{ route('clients.update', $client) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nome completo</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $client->name) }}" required>
                @error('name')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ old('email', $client->email) }}" required>
                @error('email')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Aggiorna</button>
                <a href="{{ route('clients.index') }}" class="btn btn-ghost">Annulla</a>
            </div>
        </form>


        </div>
    </div>
</div>


</x-layout>