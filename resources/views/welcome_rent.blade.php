<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/rent.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/rent.css')); ?>">
</head>


<body>
    <section>
        <div>
            <!-------------------------------------------------------- NAVBAR------------------------------------------------------------->
            <nav class="navbar">
                <div class="navbar-left">
                    <img src="<?php echo e(asset('assets/img/whitelogoarkila.png')); ?>" alt="Logo" class="navbar-logo">
                </div>
                <div class="navbar-right">
                    <button class="btn-bookings">My Bookings</button>
                    <button class="btn-partner">Become a partner</button>
                    <!-- Check if the user is logged in -->
                    @if(Auth::check())
                        <button class="btn-client"><i class='bx bx-user'></i>{{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}</button>
                    @else
                        <a href="{{ route('login') }}" class="btn-client-login">Login</a>
                    @endif


                </div>
            </nav>
            <!---------------------------------------------------- SIDEBAR------------------------------------------------------>
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
            <!----------------------------------------rent ----------------------------------------------------------------------->
            <section class="rent">
                <div class="rent-content">
                    <h1>Rent</h1>
                </div>
            </section>


            <!-- Booking Section -->
            <section class="booking-section">
                <div class="booking-content">
                    <h2>Booking Your Car Rental</h2>
                    <p>Choose the car of your choice</p>

                    <!-- Booking Form with Background -->
                    <div class="booking-form-container">
                        <div class="booking-form">


                            <form action="{{ route('cars.search') }}" method="GET">
                                @csrf
                                <div class="input-group">
                                    <label for="destination">Destination</label>
                                    <input type="text" name="destination" id="destination" placeholder="Enter place"
                                        required>
                                </div>
                                <div class="input-group">
                                    <label for="start-date">Start Date</label>
                                    <input type="date" name="start_date" id="start-date" required>
                                </div>
                                <div class="input-group">
                                    <label for="end-date">End Date</label>
                                    <input type="date" name="end_date" id="end-date" required>
                                </div>
                                <button type="submit" class="btn-search">Search</button>
                            </form>



                        </div>
                    </div>
                </div>
            </section>



            <section class="our-partners">
                <h2>Meet our Partners</h2>
                <div class="partners">
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo1.png')); ?>" alt="Partner 1">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo2.png')); ?>" alt="Partner 2">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo3.png')); ?>" alt="Partner 3">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo4.png')); ?>" alt="Partner 4">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo5.png')); ?>" alt="Partner 5">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo6.png')); ?>" alt="Partner 6">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo7.png')); ?>" alt="Partner 7">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo8.png')); ?>" alt="Partner 8">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo9.png')); ?>" alt="Partner 9">
                    </div>
                    <div class="partner-box">
                        <img src="<?php echo e(asset('assets/img/oplogo10.png')); ?>" alt="Partner 10">
                    </div>
                </div>
            </section>

            <!---------------------------------------- FAQ SECTION ----------------------------------------------------------------------->
            <div class="faq-box">
                <div
                    class="relative w-full bg-white px-6 pt-10 pb-8 mt-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-2xl sm:rounded-lg sm:px-10">
                    <div class="mx-auto px-5">
                        <div class="faqs-header">
                            <h2 class="freq">ABOUT US</h2>
                            <p class="ffreq">Frequently Asked Questions</p>
                        </div>
                        <div class="mx-auto mt-8 grid max-w-xl divide-y divide-neutral-200">
                            <div class="py-5">
                                <details class="group">
                                    <summary
                                        class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span>What is ARKILA??</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">ARKILA was created to
                                        make
                                        car
                                        rentals in Rizal convenient, affordable, and accessible for everyone. We started
                                        with a
                                        mission to provide flexible and reliable car rental solutions, tailored to meet
                                        the
                                        diverse needs of our customers. Whether you're planning a quick day trip, need a
                                        vehicle
                                        for an extended period, or require transport for a special occasion, ARKILA
                                        offers a
                                        wide selection of well-maintained vehicles to suit any journey.</p>
                                </details>
                            </div>
                            <div class="py-5">
                                <details class="group">
                                    <summary
                                        class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span>Can I get a refund for my subscription?</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We offer a 30-day
                                        money-back
                                        guarantee for most of its subscription plans. If you are not satisfied with your
                                        subscription within the first 30 days, you can request a full refund. Refunds
                                        for
                                        subscriptions that have been active for longer than 30 days may be considered on
                                        a
                                        case-by-case basis.</p>
                                </details>
                            </div>
                            <div class="py-5">
                                <details class="group">
                                    <summary
                                        class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span>How do I cancel my subscription?</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">To cancel your
                                        subscription,
                                        you
                                        can log in to your account and navigate to the subscription management page.
                                        From
                                        there,
                                        you should be able to cancel your subscription and stop future billing.</p>
                                </details>
                            </div>
                            <div class="py-5">
                                <details class="group">
                                    <summary
                                        class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span>Is there a free trial?</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We offer a free trial of
                                        our
                                        software for a limited time. During the trial period, you will have access to a
                                        limited
                                        set of features and functionality, but you will not be charged.</p>
                                </details>
                            </div>
                            <div class="py-5">
                                <details class="group">
                                    <summary
                                        class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span>How do I contact support?</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">If you need help with our
                                        platform or have any other questions, you can contact the company's support team
                                        by
                                        submitting a support request through the website or by emailing
                                        support@ourwebsite.com.
                                    </p>
                                </details>
                            </div>
                            <div class="py-5">
                                <details class="group">
                                    <summary
                                        class="flex cursor-pointer list-none items-center justify-between font-medium">
                                        <span>Do you offer any discounts or promotions?</span>
                                        <span class="transition group-open:rotate-180">
                                            <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                                <path d="M6 9l6 6 6-6"></path>
                                            </svg>
                                        </span>
                                    </summary>
                                    <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We may offer discounts or
                                        promotions from time to time. To stay up-to-date on the latest deals and special
                                        offers,
                                        you can sign up for the company's newsletter or follow it on social media.</p>
                                </details>
                            </div>
                        </div>
                    </div>
                </div>

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
                        <p>&copy; 2024-2025 ARKILA. All Rights Reserved.</p>
                        <a href="#" class="social-media-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-media-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-media-link"><i class="fab fa-google"></i></a>
                        <a href="#" class="social-media-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </footer>



            </div>

    </section>



</body>

</html>