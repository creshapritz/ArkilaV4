@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="left-section">
        <h3>Car Details</h3>
        <!-- Displaying the car's primary image dynamically -->
        @if($car->primary_image)
            <img src="{{ asset('storage/' . $car->primary_image) }}" alt="Car Image" class="car-image">
        @else
            <p>No primary image available.</p>
        @endif

        <!-- Displaying car details dynamically in grid format -->
        <div class="car-details-grid">
            <p class="car-details"><strong>Car ID:</strong> {{ $car->id }}</p>
            <p class="car-details"><strong>Car Brand:</strong> {{ $car->brand }}</p>
            <p class="car-details"><strong>Car Model:</strong> {{ $car->name }}</p>
            <p class="car-details"><strong>Plate Number:</strong> {{ $car->platenum ?? 'N/A' }}</p>
            <p class="car-details"><strong>Mileage:</strong> {{ $car->mileage ?? 'N/A' }}</p>
            <p class="car-details"><strong>Car Color:</strong> {{ $car->color ?? 'N/A' }}</p>
            <p class="car-details"><strong>Registration Expiry Date:</strong> {{ $car->regexpiry ?? 'N/A' }}</p>
            <p class="car-details"><strong>Price Per Day:</strong> ₱{{ number_format($car->price_per_day, 2) }}</p>
        </div>
        <!-- Edit Button -->
        <div class="edit-button-container">
            <a href="{{ route('admin.vehicles.edit', $car->id) }}" class="edit-button">Edit</a>
        </div>

    </div>

    <!-- Right Section (additional info) -->
    <div class="right-section">
        <div class="car-features">
            <h3>Features</h3>
            <ul>
                <li><strong>Transmission:</strong> {{ $car->transmission }}</li>
                <li><strong>Seating Capacity:</strong> {{ $car->seating_capacity }} persons</li>
                <li><strong>Gas Type:</strong> {{ $car->gas_type }}</li>
                <li><strong>Number of Bags:</strong> {{ $car->num_bags }}</li>
            </ul>
        </div>

        <!-- Additional Images Carousel -->
        @if($car->additional_image)
            <h4>Additional Images</h4>
            <div class="carousel">
                <div class="carousel-inner">
                    @foreach(json_decode($car->additional_image) as $key => $imagePath)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $imagePath) }}" class="carousel-image" alt="Additional Image">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="carousel-control-next" onclick="moveSlide(1)">&#10095;</button>
            </div>
        @else
            <div class="no-images-message">
                <p>No Additional Images Available</p>
            </div>
        @endif



        <!-- Company Logo -->
        @if ($car->company_logo)
            <div class="company-logo">
                <h4>Company Logo</h4>
                <img src="{{ asset('storage/' . $car->company_logo) }}" alt="Company Logo" class="company-logo-img">
            </div>
        @else
            <p>No company logo available.</p>
        @endif
    </div>
</div>
    </div>
</div>

<style>
    .container {
        display: flex;
        justify-content: space-between;
        margin: 20px;
    }

    .left-section {
        width: 60%;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
    }

    .right-section {
        width: 35%;
        height: 50%;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 10px;
    }

    .car-image {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .company-logo-img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
        margin-top: 20px;
    }

    .car-details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .car-details {
        font-size: 1.2em;
    }

    .car-features {
        margin-top: 20px;
    }

    .car-features h3 {
        margin-bottom: 10px;
    }

    .car-features ul {
        list-style: none;
        padding: 0;
    }

    .car-features li {
        margin-bottom: 5px;
    }

    /* Carousel styles */
    .carousel {
        position: relative;
        max-width: 100%;
        margin-top: 20px;
    }

    .carousel-inner {
        display: flex;
        overflow: hidden;
    }

    .carousel-item {
        display: none;
        flex-shrink: 0;
        width: 100%;
    }

    .carousel-item.active {
        display: block;
    }

    .carousel-image {
        width: 100%;
        max-width: 500px;
        max-height: 500px;
        border-radius: 5px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .carousel-control-prev {
        left: 10px;
    }

    .carousel-control-next {
        right: 10px;
    }

    .no-images-message {
        margin-top: 20px;
        text-align: center;
        font-size: 1.2em;
        color: #888;
    }

    .edit-button-container {
        margin-top: 20px;
        text-align: center;
    }

    .edit-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #F07324;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        transition: background 0.3s ease;
    }


    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .left-section,
        .right-section {
            width: 100%;
        }

        .car-details-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    let currentSlide = 0;

    function moveSlide(step) {
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;

        currentSlide = (currentSlide + step + totalSlides) % totalSlides;
        slides.forEach((slide, index) => {
            slide.classList.remove('active');
            if (index === currentSlide) {
                slide.classList.add('active');
            }
        });
    }
</script>

@endsection