<x-layout>
    <x-navbar />

    <div class="container mt-5">
        <h2>Clients</h2>

        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">
            Add Client
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>