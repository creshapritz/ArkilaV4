@extends('layouts.admin')




    
@section('content')
<div class="container">
    <div class="flex justify-between items-center mb-4">
        <h2>List of Vehicles</h2>
        <a href="{{ route('vehicles.add') }}" class="btn btn-success">Add Car</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cars->isEmpty())
        <p>No vehicles found.</p>
    @else
        <div class="vehicle-list">
            @foreach($cars as $car)
                <div class="vehicle-card">
                    <div class="vehicle-image">
                        @if($car->primary_image)
                        <img src="{{ asset('storage/' . $car->primary_image) }}" alt="{{ $car->name }}" class="car-image">
                        @else
                            <img src="{{ asset('assets/img/default-car.png') }}"
                                 alt="Default Car Image" class="car-image">
                        @endif
                    </div>
                    <div class="vehicle-details">
                        <div class="vehicle-info">
                            <div class="name-brand">
                                <span class="vehicle-name">{{ $car->name }}</span>
                                <span class="vehicle-brand"><strong>Brand:</strong> {{ $car->brand }}</span>
                                <span class="vehicle-id"><strong>Car ID:</strong> {{ $car->id }}</span>
                            </div>
                            <div class="additional-info">
                                <span class="vehicle-platenum"><strong>Plate Number:</strong> {{ $car->platenum }}</span>
                                <span class="vehicle-availability"><strong>Availability:</strong> {{ $car->availability ? 'Available' : 'Not Available' }}</span>
                                <span class="vehicle-price"><strong>Price Per Day:</strong> ${{ number_format($car->price_per_day, 2) }}</span>
                            </div>
                        </div>
                        <div class="vehicle-actions">
                            <a href="{{ route('vehicles.show', ['id' => $car->id]) }}" class="view-icon">
                            <i class="bx bx-show"></i>
                            </a>
                            <a href="javascript:void(0);" class="archive-icon" onclick="deleteVehicle({{ $car->id }})">
                            <i class='bx bx-box'></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    function deleteVehicle(vehicleId) {
        if (confirm("Are you sure you want to delete this vehicle?")) {
            fetch(`/vehicles/${vehicleId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.success);
                location.reload(); // Refresh the list after deletion
            })
            .catch(error => console.error('Error:', error));
        }
    }
</script>

@endsection

