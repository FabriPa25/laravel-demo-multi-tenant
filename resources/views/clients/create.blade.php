<x-layout>
    <x-navbar />

    <div class="container mt-5">
        <h2>Add New Client</h2>

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button class="btn btn-success">Create Client</button>
        </form>
    </div>
</x-layout>