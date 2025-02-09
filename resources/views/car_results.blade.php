@extends('layouts.app')

@section('content')
<section class="car-results">
    <h1>Available Cars</h1>
    @if($cars->isEmpty())
        <p>No cars available for the selected criteria.</p>
    @else
        <div class="car-list">
            @foreach($cars as $car)
                <div class="car-item">
                    <h2>{{ $car->name }}</h2>
                    <p>Brand: {{ $car->brand }}</p>
                    <p>Type: {{ $car->type }}</p>
                    <p>Location: {{ $car->location }}</p>
                    <p>Price per Day: ₱{{ number_format($car->price_per_day, 2) }}</p>
                    <a href="#" class="btn">View Details</a>
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
