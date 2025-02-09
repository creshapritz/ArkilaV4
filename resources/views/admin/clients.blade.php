@extends('layouts.admin')

@section('content')
    <h1>Clients</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>DOB</th>
                <th>Contact</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->first_name }}</td>
                    <td>{{ $client->middle_name ?? '-' }}</td>
                    <td>{{ $client->last_name }}</td>
                    <td>{{ $client->age }}</td>
                    <td>{{ $client->dob }}</td>
                    <td>{{ $client->contact_number }}</td>
                    <td>{{ $client->username }}</td>
                    <td>{{ $client->email }}</td>
                    <td>
                        <a href="{{ route('admin.clients.show', $client->id) }}">
                            <i class='bx bx-show'></i> <!-- Eye Icon -->
                        </a>
                        <form action="{{ route('admin.clients.archive', $client->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to archive this client?')">
                                <i class='bx bx-archive'></i> <!-- Archive Icon -->
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
