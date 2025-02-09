<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <title>About</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/welcome_about.css')); ?>">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <!-------------------------------------------------------- NAVBAR------------------------------------------------------------->
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

    <!--------------------------------------------------------------- SIDEBAR--------------------------------------------->
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

            <li><a href="javascript:void(0);" id="logout-link"><i class='bx bx-log-out'></i> <span>Logout</span></a>
            </li>


        </ul>
    </div>

    <!----------------------------------------ABOUT US ----------------------------------------------------------------------->
    <section class="aboutus">
        <div class="aboutus-content">
            <h1>About Us</h1>

        </div>
    </section>
    <!---------------------------------------- IMAGE 1 ----------------------------------------------------------------------->
    <section class="about-square">
        <div class="square">
            <img src="<?php echo e(asset('assets/img/auimg2.jpg')); ?>" alt="Square Image">
            <h1>DISCOVER ARKILA: </h1>
            <h2> Reliable Rides for Every Journey</h2>
            <p>Founded in 2024, ARKILA was created to make car rentals in Rizal convenient, affordable, and
                accessible
                for
                everyone. We started with a mission to provide flexible and reliable car rental solutions, tailored
                to
                meet
                the diverse needs of our customers. Whether you're planning a quick day trip, need a vehicle for an
                extended
                period, or require transport for a special occasion, ARKILA offers a wide selection of
                well-maintained
                vehicles to suit any journey.</p>
            <p>Our team comprises friendly, dedicated staff members committed to exceptional service. We understand
                the
                importance of a smooth rental experience, which is why we prioritize timely query responses and
                personalized
                support for every customer. With a diverse fleet and drivers known for their professionalism and
                local
                expertise, ARKILA ensures that every trip is memorable and worry-free.
            </p>

        </div>
    </section>
    <!---------------------------------------- COMPLETE BOOKINGS ----------------------------------------------------------------------->

    <div class="center-box">
        <div class="left">
            <h2>200+</h2>
            <p>Positive Reviews
            </p>
        </div>
        <div class="center">
            <h2>2,500+</h2>
            <p>Completed Bookings</p>
        </div>
        <div class="right">
            <h2>250+</h2>
            <p>Rented Cars</p>
        </div>
    </div>

    <!---------------------------------------- OUR SERVICES ----------------------------------------------------------------------->

    <div class="our-services">
        <h1>Our Services</h1>
        <h2>We work for your comfort</h2>
        <p>At ARKILA, we’re dedicated to providing a seamless and enjoyable car rental experience.
            Whether you're traveling for business, planning a family vacation, or need a vehicle for a special
            event,
            our services are designhed to meet your unique needs with flexibility, convenience, and affordability.
        </p>
    </div>


    <!-- Add the service boxes -->
    <div class="service-boxes">
        <div class="service-box">
            <h3>Personal Cars</h3>
            <p>We offer a wide range of options for you to choose from. From a van rental to a small Toyota Wigo.
            </p>
        </div>
        <div class="service-box">
            <h3>Affordable Prices</h3>
            <p>Quality car rentals at rates that fit your budget, with no hidden costs—just great value and
                exceptional
                service.</p>
        </div>
        <div class="service-box">
            <h3>Wide Selection of Vehicles</h3>
            <p>From compact cars for city driving to luxury SUVs for special occasions, we offer a wide variety of
                vehicles to suit your style and budget.</p>
        </div>
        <div class="service-box">
            <h3>Convenient Pickup & Drop-off</h3>
            <p>Satisfaction by providing flexibility, accessibility, and smooth transitions for users throughout
                their
                rental journey.</p>
        </div>
        <div class="service-box">
            <h3>Self-Drive Option</h3>
            <p>Users can rent a car and drive it themselves, giving them full control over their journey.</p>
        </div>
        <div class="service-box">
            <h3>Real-Time Vehicle Tracking</h3>
            <p>Provide users with real-time vehicle tracking for safety and convenience, allowing users or the admin
                to
                track the location.</p>
        </div>
    </div>
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
                            <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                <span>What is ARKILA??</span>
                                <span class="transition group-open:rotate-180">
                                    <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            <p class="group-open:animate-fadeIn mt-3 text-neutral-600">ARKILA was created to make
                                car
                                rentals in Rizal convenient, affordable, and accessible for everyone. We started
                                with a
                                mission to provide flexible and reliable car rental solutions, tailored to meet the
                                diverse needs of our customers. Whether you're planning a quick day trip, need a
                                vehicle
                                for an extended period, or require transport for a special occasion, ARKILA offers a
                                wide selection of well-maintained vehicles to suit any journey.</p>
                        </details>
                    </div>
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                <span>Can I get a refund for my subscription?</span>
                                <span class="transition group-open:rotate-180">
                                    <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We offer a 30-day money-back
                                guarantee for most of its subscription plans. If you are not satisfied with your
                                subscription within the first 30 days, you can request a full refund. Refunds for
                                subscriptions that have been active for longer than 30 days may be considered on a
                                case-by-case basis.</p>
                        </details>
                    </div>
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                <span>How do I cancel my subscription?</span>
                                <span class="transition group-open:rotate-180">
                                    <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            <p class="group-open:animate-fadeIn mt-3 text-neutral-600">To cancel your subscription,
                                you
                                can log in to your account and navigate to the subscription management page. From
                                there,
                                you should be able to cancel your subscription and stop future billing.</p>
                        </details>
                    </div>
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
                                <span>Is there a free trial?</span>
                                <span class="transition group-open:rotate-180">
                                    <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </summary>
                            <p class="group-open:animate-fadeIn mt-3 text-neutral-600">We offer a free trial of our
                                software for a limited time. During the trial period, you will have access to a
                                limited
                                set of features and functionality, but you will not be charged.</p>
                        </details>
                    </div>
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
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
                                platform or have any other questions, you can contact the company's support team by
                                submitting a support request through the website or by emailing
                                support@ourwebsite.com.
                            </p>
                        </details>
                    </div>
                    <div class="py-5">
                        <details class="group">
                            <summary class="flex cursor-pointer list-none items-center justify-between font-medium">
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
                <a href="{{ asset('documents/terms.pdf') }}" target="_blank" class="footer-bottom-link">Terms and
                    Condition</a>
                <a href="{{ asset('documents/terms.pdf') }}" target="_blank" class="footer-bottom-link">Privacy
                    Policy</a>
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

</body>
<script>
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

</html>