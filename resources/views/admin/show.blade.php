@extends('layouts.admin')

@section('content')
    <h1>Admin Details</h1>
    <p><strong>First Name:</strong> {{ $admin->firstname }}</p>
    <p><strong>Last Name:</strong> {{ $admin->lastname }}</p>
    <p><strong>Role:</strong> {{ $admin->role }}</p>
    <p><strong>Status:</strong> {{ $admin->status ? 'Active' : 'Inactive' }}</p>
    <p><strong>Created At:</strong> {{ $admin->created_at->format('Y-m-d') }}</p>
    <a href="{{ route('admin.accounts') }}">Back to Admin List</a>
@endsection
