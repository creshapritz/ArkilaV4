<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/list-vehicle.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    

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
        @yield('content')

      
        </section>
</body>
</html>