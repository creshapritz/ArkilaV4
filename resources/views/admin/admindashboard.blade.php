<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">


    <title>Admin Dashboard</title>


</head>

<body>



    <!-- Sidebar -->
    <div class="sidebar">
        <img src="{{ asset('assets/img/arkila_logo.png') }}" alt="Arkila Logo">
        <h1>Arkila</h1>
        <ul>
            <h2 class="centered-header">Overview</h2>
            <li class="">
                <i class='bx bx-home'></i>
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <h2 class="centered-header">Car Rental Management</h2>
            @php
                $carRentalManagementLinks = [
                    ['url' => '/bookings', 'icon' => 'bx bx-book', 'text' => 'Bookings'],
                    ['url' => '/admin/vehicles', 'icon' => 'bx bx-car', 'text' => 'Vehicles'],
                    ['url' => '/admin/gps', 'icon' => 'bx bx-map', 'text' => 'GPS Tracking']
                ];
            @endphp
            @foreach ($carRentalManagementLinks as $link)
                <li>
                    <i class="{{ $link['icon'] }}"></i>
                    <a href="{{ $link['url'] }}">{{ $link['text'] }}</a>
                </li>
            @endforeach
            <h2 class="centered-header">User Management</h2>
            <li><i class='bx bx-user'></i><a href="{{ route('admin.clients') }}">Clients</a></li>
            <li><i class='bx bx-user'></i><a href="/drivers">Drivers</a></li>
            <li><i class='bx bx-user'></i><a href="/partners">Partners</a></li>
            <li><i class='bx bx-user'></i><a href="{{ route('admin.accounts') }}">Accounts</a></li>

            <h2 class="centered-header">Others</h2>
            <li><i class='bx bx-cog'></i><a href="/sett">Settings</a></li>
            <li><i class='bx bx-bar-chart'></i><a href="/reports">Reports</a></li>

            <li class="logout-item">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit"><i class='bx bx-log-out'></i> Logout</button>
                </form>
            </li>

        </ul>
    </div>

    <!-- Main Content Area -->
    <section class="content">
        <!-- Navigation bar -->
        <nav class="navbar">
            <div class="navbar-left">
                <h2>Dashboard</h2>
            </div>
            <div class="navbar-right">
                <div class="dropdown">
                    <button class="dropbtn"><i class='bx bx-chevron-down'></i></button>

                    <div class="dropdown-content">
                        <a href="/profile">Profile</a>
                        <a href="/settings">Settings</a>
                        <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="logout-button"
                                style="background: none; border: none; color: inherit; cursor: pointer; padding: 12px 16px; text-decoration: none; display: block; transition: background-color 0.3s;">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <section class="dashboard-content">
            <!-- Welcome Message -->
            <h1>Welcome to the Admin Dashboard</h1>
            @auth('admin')
    <p>Welcome, {{ Auth::guard('admin')->user()->email }}</p>
@else
    <p>No admin logged in.</p>
@endauth

            <!-- Example Stats Section -->
            <section class="stats">
                <div class="stat-item">
                    <h3>Total Clients:</h3>
                    <p>123<i class='bx bx-stats'></i></p>
                </div>
                <div class="stat-item">
                    <h3>Total Drivers:</h3><br>
                    <p>123<i class='bx bx-stats'></i></p>
                </div>
                <div class="stat-item">
                    <h3>Total Partners:</h3><br>
                    <p>123<i class='bx bx-stats'></i></p>
                </div>
            </section>
        </section> <!--end of dashboard content-->


        <section class="car-acc">
            <div class="addacc-content">
                <a href="/acc" class="addacc-link">
                    <div class="addacc">
                        <i class='bx bx-user'></i> <!-- Add icon here -->
                        <h3>Add account</h3>
                        <p>To register a new account, click here</p>
                    </div>
                </a>
            </div>
            <div class="addcar-content">
                <a href="{{ route('vehicles.add') }}" class="addcar-link">
                    <div class="addcar">
                        <i class='bx bx-car'></i> <!-- Add icon here -->
                        <h3>Add Car</h3>
                        <p>To register a new car, click here</p>
                    </div>
                </a>
            </div>
        </section>


        <section class="filter">

            <form action="{{ route('admin.filter-cars') }}" method="GET">

                <div class="filter-box">
                    <h3>Car Availability</h3>
                    <div class="filterbg">
                        <div class="filter-item">
                            <label for="car-type">Car Type:</label>
                            <select id="car-type" name="type">
                                <option value="">All Types</option>
                                <option value="sedan" {{ request('type') == 'sedan' ? 'selected' : '' }}>Sedan</option>
                                <option value="suv" {{ request('type') == 'suv' ? 'selected' : '' }}>SUV</option>
                                <option value="hatchback" {{ request('type') == 'hatchback' ? 'selected' : '' }}>Hatchback
                                </option>
                                <option value="truck" {{ request('type') == 'truck' ? 'selected' : '' }}>Truck</option>
                            </select>
                        </div>

                        <div class="filter-item">
                            <label for="car-brand">Brand:</label>
                            <select id="car-brand" name="brand">
                                <option value="">All Brands</option> <!-- This is the "All" option -->
                                <option value="Toyota" {{ request('brand') == 'Toyota' ? 'selected' : '' }}>Toyota
                                </option>
                                <option value="Honda" {{ request('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                                <option value="Ford" {{ request('brand') == 'Ford' ? 'selected' : '' }}>Ford</option>
                                <option value="Suzuki" {{ request('brand') == 'Suzuki' ? 'selected' : '' }}>Suzuki
                                </option>
                            </select>
                        </div>

                        <div class="filter-item">
                            <label for="car-color">Car Color:</label>
                            <select id="car-color" name="color">
                                <option value="">All Colors</option> <!-- This is the "All" option -->
                                <option value="Red" {{ request('color') == 'Red' ? 'selected' : '' }}>Red</option>
                                <option value="Blue" {{ request('color') == 'Blue' ? 'selected' : '' }}>Blue</option>
                                <option value="Black" {{ request('color') == 'Black' ? 'selected' : '' }}>Black</option>
                                <option value="White" {{ request('color') == 'White' ? 'selected' : '' }}>White</option>
                            </select>
                        </div>

                        <div class="filter-item">
                            <label for="date-availability">Date Availability:</label>
                            <input type="date" id="date-availability" name="availability"
                                value="{{ request('availability') }}">

                        </div>

                       

                        <div class="filter-button-container">
                            <button type="submit" class="filter-button">Check</button>

                        </div>
                    </div>
                </div>

            </form>
        </section>

        <section class="car-ov">
            <div class="car-ov-container">
                <h3>Car Overview</h3>
                <div class="trycon">
                    @if (isset($cars) && $cars->isNotEmpty())
                        @foreach ($cars->take(4) as $car)
                            <div class="car-bg">
                                <div class="car-header">
                                    <div class="car-details">
                                        <h3 class="car-name">{{$car->name}}</h3>
                                        <p class="car-brand">{{$car->brand}}</p>
                                        <img src="{{asset('storage/' . $car->primary_image)}}" alt="{{$car->name}}"
                                            class="car-image" loading="lazy">

                                    </div>
                                </div>
                                <section class="car-info">
                                    <p><i class='bx bx-user'></i> {{ $car->seating_capacity }}</p>
                                    <p><i class='bx bx-briefcase'></i> {{ $car->num_bags }}</p>
                                    <p><i class='bx bx-gas-pump'></i> {{ $car->gas_type }}</p>
                                    <p><i class='bx bx-cog'></i> {{ $car->transmission }}</p>
                                </section>
                                <div class="view-button-container">
                                    <a href="{{ route('vehicles.show', ['id' => $car->id]) }}" class="view-icon">
                                        <button class="view-button">View</button>
                                    </a>
                                </div>

                            </div>

                        @endforeach
                    @else
                        <p>No cars found with the applied filters.</p>
                    @endif
                </div>
            </div>

        </section>








    </section> <!-- End of content -->

</body>

</html>