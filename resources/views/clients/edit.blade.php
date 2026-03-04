<x-layout>
    <x-navbar />

    <div class="container mt-5">
        <h2>Edit Client</h2>

        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $client->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $client->email }}" class="form-control" required>
            </div>

            <button class="btn btn-primary">Update Client</button>
        </form>
    </div>
</x-layout>