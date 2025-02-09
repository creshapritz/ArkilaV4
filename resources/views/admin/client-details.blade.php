@extends('layouts.admin')

@section('content')
    <h1>Client Details</h1>

    <p><strong>Full Name:</strong> {{ $client->first_name }} {{ $client->middle_name ?? '' }} {{ $client->last_name }}</p>
    <p><strong>Age:</strong> {{ $client->age }}</p>
    <p><strong>Date of Birth:</strong> {{ $client->dob }}</p>
    <p><strong>Contact Number:</strong> {{ $client->contact_number }}</p>
    <p><strong>Address:</strong> {{ $client->address }}</p>
    <p><strong>Email:</strong> {{ $client->email }}</p>
    <p><strong>Driver License:</strong> {{ $client->driver_license_type ?? 'N/A' }}</p>

    <a href="{{ route('admin.clients') }}">Back</a>
@endsection
