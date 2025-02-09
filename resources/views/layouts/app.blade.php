<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
    <!-- Add CSS or Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/searchcars.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
</head>

<body>
    <header>
        <section>
            <!-- NAVBAR -->
            <nav class="navbar">
                <div class="navbar-left">
                    <img src="{{ asset('assets/img/whitelogoarkila.png') }}" alt="Logo" class="navbar-logo">
                </div>
                <div class="navbar-right">
                    <button class="btn-bookings">My Bookings</button>
                    <button class="btn-partner">Become a partner</button>
                    @if(Auth::check())
                        <button class="btn-client"><i class='bx bx-user'></i>{{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}</button>
                    @else
                        <a href="{{ route('login') }}" class="btn-client-login">Login</a>
                    @endif
                </div>
            </nav>

            <!-- SIDEBAR -->
            <div class="sidebar">
                <a href="#menu" class="menu-link" id="menu-button">
                    <i class='bx bx-menu' id="menu-icon"></i>
                    <span class="menu-text">ARKILA</span>
                </a>
                <ul>
                    <li><a href="{{ route('landingpage') }}"><i class='bx bx-home'></i> <span>Home</span></a></li>
                    <li><a href="{{ route('about') }}"><i class='bx bx-info-circle'></i> <span>About Us</span></a></li>
                    <li><a href="{{ route('vehicles') }}"><i class='bx bx-car'></i> <span>Vehicles</span></a></li>
                    <li><a href="{{ route('services') }}"><i class='bx bx-wrench'></i> <span>Services</span></a></li>
                    <li><a href="{{ route('welcome_rent') }}"><i class='bx bx-key'></i> <span>Rent</span></a></li>
                    <li><a href="{{ route('contact') }}"><i class='bx bx-envelope'></i> <span>Contact Us</span></a></li>
                    <li><a href="{{ route('partner') }}"><i class='bx bx-user-plus'></i> <span>Partnership</span></a>
                    </li>
                    <li><a href="{{ route('settings') }}"><i class='bx bx-cog'></i> <span>Settings</span></a></li>
                    <li><a href="{{ route('logout') }}"><i class='bx bx-log-out'></i> <span>Logout</span></a></li>
                </ul>
            </div>
        </section>
    </header>


    <main>
        <!-- Booking Form Section -->
        <div class="search-cars-container">
            <div class="booking-form-container">
                <div class="booking-form">
                    <form action="{{ route('cars.search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <label for="destination">Destination</label>
                            <input type="text" name="destination" id="destination" placeholder="Enter place" required
                                value="{{ request('destination') }}">
                        </div>
                        <div class="input-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" id="start_date" required
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="input-group">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" id="end_date" required value="{{ request('end_date') }}">
                        </div>
                        <button type="submit" class="btn-search">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <section>
            <form method="GET" action="{{ route('cars.search') }}" class="filter-section">
                <button class="filter-btn" type="submit"><i class='bx bx-filter'></i></button>

                <select name="type">
                    <option value="">Car Type</option>
                    <option value="Sedan" {{ request('type') == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                    <option value="Hatchback" {{ request('type') == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
                    <option value="SUV" {{ request('type') == 'SUV' ? 'selected' : '' }}>SUV</option>
                </select>

                <select name="capacity">
                    <option value="">Capacity</option>
                    <option value="2" {{ request('capacity') == '2' ? 'selected' : '' }}>2-Seater</option>
                    <option value="4" {{ request('capacity') == '4' ? 'selected' : '' }}>4-Seater</option>
                    <option value="6" {{ request('capacity') == '6' ? 'selected' : '' }}>6-Seater</option>
                </select>

                <select name="transmission">
                    <option value="">Transmission</option>
                    <option value="Automatic" {{ request('transmission') == 'Automatic' ? 'selected' : '' }}>Automatic
                    </option>
                    <option value="Manual" {{ request('transmission') == 'Manual' ? 'selected' : '' }}>Manual</option>
                </select>

                <select name="location">
                    <option value="">Location</option>
                    <option value="Angono" {{ request('location') == 'Angono' ? 'selected' : '' }}>Angono</option>
                    <option value="Taytay" {{ request('location') == 'Taytay' ? 'selected' : '' }}>Taytay</option>
                    <option value="Antipolo" {{ request('location') == 'Antipolo' ? 'selected' : '' }}>Antipolo</option>
                    <option value="Binangonan" {{ request('location') == 'Binangonan' ? 'selected' : '' }}>Binangonan
                    </option>
                </select>
                <button type="button" id="filterButton">Apply Filters</button>
            </form>
        </section>




        <!-- car section  -->

        @if(isset($cars))
            <div class="search-results">
                <h2>Available Cars</h2>
                @if($cars->isEmpty())
                    <p class="no-cars-message">No cars available for the selected criteria.</p>
                @else
                    <div class="car-list">
                        @foreach($cars as $car)
                            <div class="car-card">
                                <!-- Left Side -->
                                <div class="car-left">
                                    <img src="{{ $car->image }}" alt="{{ $car->name }}" class="car-image">
                                    <img src="assets/img/oplogo1.png" alt="Logo" class="car-logo">
                                </div>

                                <!-- Center Section -->
                                <div class="car-center">
                                    <h3>{{ $car->name }}</h3>
                                    <p>Brand: {{ $car->brand }}</p>
                                    <p>Type: {{ $car->type }}</p>
                                    <p>Seating Capacity: {{ $car->seating_capacity }}</p>
                                    <p>Bags: {{ $car->num_bags }}</p>
                                    <p>Fuel: {{ $car->gas_type }}</p>
                                    <p>Transmission: {{ $car->transmission }}</p>
                                    <p>Location: {{ $car->location }}</p>
                                </div>

                                <!-- Right Side -->
                                <div class="car-right">
                                    <p class="price">₱{{ number_format($car->price_per_day, 2) }}</p>
                                    <button class="btn-book">Select</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif




    </main>
    <script>
        document.getElementById('filterButton').addEventListener('click', function () {
    // Get the parent form of the filter button
    var form = document.querySelector('.filter-section');
    // Submit the form when the filter button is clicked
    form.submit();
});

    </script>


    <footer>
        <p>&copy; {{ date('Y') }} ARKILA Car Rental System</p>
    </footer>


</body>


</html>