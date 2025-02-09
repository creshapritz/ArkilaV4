@extends('layouts.admin')

@section('content')
    <h1>Admin Accounts</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->firstname }}</td>
                    <td>{{ $admin->lastname }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>{{ $admin->created_at->format('Y-m-d') }}</td>
                    <td>{{ $admin->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.show', $admin->id) }}">View</a>
                        <a href="{{ route('admin.edit', $admin->id) }}">Edit</a>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
