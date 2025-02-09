<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <title>Rent</title>
    <link rel="stylesheet" href="{{ asset('assets/css/searchcars.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header>
        <section>
            <!-- NAVBAR -->
            <nav class="navbar">
        <div class="navbar-left">
            <img src="<?php echo e(asset('assets/img/whitelogoarkila.png')); ?>" alt="Logo" class="navbar-logo">
        </div>
        <div class="navbar-right">
            <button class="btn-bookings">My Bookings</button>
            <button class="btn-partner" onclick="window.location.href='{{ route('welcome_partner') }}'">Become a
                partner</button>
            <!-- Check if the user is logged in -->
            @if(Auth::check())
                <button class="btn-client">
                    <img src="{{ Auth::user()->profile_picture ?? '/assets/img/default-profile.png' }}"
                        alt="Profile Picture" class="navbar-profile-pic">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </button>
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
                    <li><a href="{{ route('welcome') }}"><i class='bx bx-home'></i> <span>Home</span></a></li>

                    <li><a href="{{ route('welcome_about') }}"><i class='bx bx-info-circle'></i> <span>About
                                Us</span></a></li>

                    <li><a href="{{ route('welcome_vehicles') }}"><i class='bx bx-car'></i> <span>Vehicles</span></a>
                    </li>

                    <li><a href="{{ route('welcome_services') }}"><i class='bx bx-wrench'></i> <span>Services</span></a>
                    </li>

                    <li><a href="{{ route('welcome_rent') }}"><i class='bx bx-key'></i> <span>Rent</span></a></li>

                    <li><a href="{{ route('welcome_contact') }}"><i class='bx bx-envelope'></i> <span>Contact
                                Us</span></a></li>

                    <li><a href="{{ route('welcome_partner') }}"><i class='bx bx-user-plus'></i>
                            <span>Partnership</span></a>
                    </li>

                    <li><a href="{{ route('welcome_settings') }}"><i class='bx bx-cog'></i> <span>Settings</span></a>
                    </li>

                    <li><a href="javascript:void(0);" id="logout-link"><i class='bx bx-log-out'></i>
                            <span>Logout</span></a></li>

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

        <section class="filter-section">
            <form method="GET" action="{{ route('cars.search') }}">
                <!-- <button class="filter-btn" type="submit"><i class='bx bx-filter'></i></button> -->

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


                <button type="submit" id="filterButton" class="btn-filter">Apply Filters</button>
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
                                <img src="{{ asset('storage/' . $car->primary_image) }}" alt="{{ $car->name }}" class="car-image">

                                <img src="{{ asset('storage/' . $car->company_logo) }}" alt="Car Logo" class="car-logo">

                                </div>

                                <!-- Center Section -->
                                <div class="car-center">
                                    <h3>{{ $car->name }}</h3>

                                    <!-- Car Info with Icons -->
                                    <div class="car-info">
                                        <div class="info-item">
                                            <i class="bx bx-car"></i> <!-- Seating capacity icon -->
                                            <span>{{ $car->seating_capacity }} Seats</span>
                                        </div>
                                        <div class="info-item">
                                            <i class='bx bx-shopping-bag'></i> <!-- Bags icon -->
                                            <span>{{ $car->num_bags }} Bags</span>
                                        </div>
                                        <div class="info-item">
                                            <i class="bx bx-gas-pump"></i> <!-- Diesel icon -->
                                            <span>{{ $car->gas_type }}</span>
                                        </div>
                                        <div class="info-item">
                                            <i class='bx bx-cog'></i> <!-- Manual icon -->
                                            <span>{{ $car->transmission }}</span>
                                        </div>
                                    </div>



                                    <!-- Location -->
                                    <p class="location"> <i class='bx bx-map'></i> {{ $car->location }}</p>

                                    <!-- Features List -->
                                    <ul class="features">
                                        <li><i class="bx bx-check-circle"></i> Free cancellation (48h)</li>
                                        <li><i class="bx bx-check-circle"></i> Fuel policy: same-to-same</li>
                                        <li><i class="bx bx-check-circle"></i> Unlimited mileage included</li>
                                        <li><i class="bx bx-check-circle"></i> Theft protection waiver</li>
                                        <li><i class="bx bx-check-circle"></i> Third-party coverage</li>
                                        <li><i class="bx bx-check-circle"></i> Collision damage waiver</li>
                                    </ul>
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






    <!----------------------------------------------------- VIDEO 2 -------------------------------------------------------->
    <section class="video2">
        <div class="video2">
            <video src="<?php echo e(asset('assets/img/output.mp4')); ?>" autoplay loop muted></video>
        </div>
    </section>


    <!----------------------------------------------------- FOOTER -------------------------------------------------------->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <img src="<?php echo e(asset('assets/img/whitelogoarkila.png')); ?>" alt="Arkila Logo"
                    class="footer-logo">
                <div class="footer-links">
                    <a href="#" class="footer-link">Home</a>
                    <span class="footer-link">About Us</span>
                    <span class="footer-link">Vehicles</span>
                    <span class="footer-link">Services</span>
                    <span class="footer-link">Rent</span>
                    <span class="footer-link">Contact Us</span>
                    <span class="footer-link">Partnership</span>
                </div>
            </div>
            <div class="footer-section center-section">
                <h3 class="footer-title">Payment Method</h3>
                <div class="footer-links">
                    <span class="payment-method-link">Cash</span>
                    <span class="payment-method-link">E-Wallet</span>
                    <span class="payment-method-link">Card</span>
                    <span class="payment-method-link">Cheque</span>
                </div>
            </div>
            <div class="footer-section right-section">
                <h3 class="footer-title">Permits</h3>
                <div class="footer-links">
                    <span class="payment-method-link">Business Permit</span>
                    <span class="payment-method-link">DTI Permit</span>
                    <span class="payment-method-link">Barangay Permit</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom-links">
            <a href="#" class="footer-bottom-link">Terms and Condition</a>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
            <a href="#" class="footer-bottom-link">FAQ's</a>
        </div>
        <hr class="footer-line">
        <div class="footer-social-media">
            <p>&copy;{{ date('Y') }} ARKILA. All Rights Reserved.</p>
            <a href="#" class="social-media-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-media-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-media-link"><i class="fab fa-google"></i></a>
            <a href="#" class="social-media-link"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script>
        document.getElementById('filterButton').addEventListener('click', function () {
            // Get the parent form of the filter button
            var form = document.querySelector('.filter-section');
            // Submit the form when the filter button is clicked
            form.submit();
        });

        document.getElementById('logout-link').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent the default link action

            Swal.fire({
                title: 'Are you sure you want to logout?',
                text: "You will need to log in again to continue.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#F07324',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the logout form using POST
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('logout') }}';

                    var csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });

    </script>


</body>


</html>