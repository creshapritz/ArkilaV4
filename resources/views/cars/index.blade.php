@extends('layouts.app')

@section('content')
<div class="search-cars-page">
    <!-- Booking Form Section -->
    <div class="booking-form-container">
        <div class="booking-form">
            <form action="{{ route('cars.search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <label for="destination">Destination</label>
                    <input type="text" name="destination" id="destination" placeholder="Enter place" required value="{{ request('destination') }}">
                </div>
                <div class="input-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" required value="{{ request('start_date') }}">
                </div>
                <div class="input-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" required value="{{ request('end_date') }}">
                </div>
                <button type="submit" class="btn-search">Search</button>
            </form>
        </div>
    </div>

    <!-- Search Results Section -->
    @if(isset($cars))
    <div class="search-results">
        <h2>Available Cars</h2>
        @if($cars->isEmpty())
            <p class="no-cars-message">No cars available for the selected criteria.</p>
        @else
            <div class="car-list">
                @foreach($cars as $car)
                <div class="car-card">
                    <img src="{{ $car->image }}" alt="{{ $car->name }}">
                    <h3>{{ $car->name }}</h3>
                    <p>Brand: {{ $car->brand }}</p>
                    <p>Type: {{ $car->type }}</p>
                    <p>Location: {{ $car->location }}</p>
                    <p>Price per Day: ₱{{ number_format($car->price_per_day, 2) }}</p>
                    <button class="btn-book">Book Now</button>
                </div>
                @endforeach
            </div>
        @endif
    </div>
    @endif
</div>
@endsection
