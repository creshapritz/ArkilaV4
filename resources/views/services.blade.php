<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/services.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
</head>

<body>

    <div>
        <!-------------------------------------------------------- NAVBAR------------------------------------------------------------->
        <nav class="navbar">
            <div class="navbar-left">
                <img src="<?php echo e(asset('assets/img/whitelogoarkila.png')); ?>" alt="Logo" class="navbar-logo">
            </div>
            <div class="navbar-right">
                <button class="btn-partner" onclick="window.location.href='{{ route('partner') }}'">Become a
                    partner</button>
                <a href="{{ route('register') }}" class="btn-text">Sign Up</a> <!-- Updated link -->
                <button class="btn-login" onclick="window.location.href='{{ route('login') }}'">Login</button>


            </div>
        </nav>

        <!--------------------------------------------------------------- SIDEBAR--------------------------------------------->
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


                <li><a href="{{ route('rent') }}"><i class='bx bx-key'></i> <span>Rent</span></a></li>

                <li><a href="{{ route('contact') }}"><i class='bx bx-envelope'></i> <span>Contact Us</span></a></li>

                <li><a href="{{ route('partner') }}"><i class='bx bx-user-plus'></i> <span>Partnership</span></a></li>
                <li><a href="{{ route('settings') }}"><i class='bx bx-cog'></i> <span>Settings</span></a></li>

<li><a href="{{ route('logout') }}"><i class='bx bx-log-out'></i> <span>Logout</span></a></li>
            </ul>


        </div>
        <!---------------------------------------- IMG1 ----------------------------------------------------------------------->
        <section class="services">
            <div class="services-content">
                <h1>Services</h1>
            </div>
        </section>
        <div class="services-content1">
            <h1>Choose Your Car Rental Service</h1>
            <p>Renting a car in Rizal is very easy! Select your preferred car rental option below.</p>
            <div class="rental-buttons">
                <button class="rental-button">Self Driver</button>
                <button class="rental-button">With Driver</button>
            </div>
        </div>
        <div class="services-content2">
            <div class="services-contents2-text">
                <h3> ARKILA A CAR SELF DRIVE IN RIZAL </h3>
                <h1>Self Drive Rental</h1>
                <p>Experience the freedom of exploring on your own terms with Arkila's Self-Drive Car Rental. Designed
                    for
                    those who value independence and flexibility, our self-drive option lets you choose from a variety
                    of
                    vehicles and set your own schedule. Whether you're on a quick city trip or a scenic road adventure,
                    our
                    self-drive rentals provide you with a safe, comfortable, and private way to travel.
                </p>
                <p><br><br>With ARKILA, you’re in control of the journey.</p>
                <button class="additional-button">Learn More</button>
            </div>
            <div class="services-contents2-image">
                <img src="assets/img/selfdrive.png" alt="Car Rental">
            </div>
        </div>
        <div class="services-content3">
            <div class="services-contents3-image">
                <img src="assets/img/withdriver.png" alt="Car Rental">
            </div>
            <div class="services-contents3-text">
                <h3> ARKILA A CAR SELF DRIVE IN RIZAL </h3>
                <h1>Self Drive Rental</h1>
                <p>Relax and enjoy the ride with Arkila’s Car Rental with Driver service. Perfect for stress-free
                    travel, our
                    professional drivers ensure a safe, comfortable, and convenient journey, allowing you to focus on
                    what
                    matters most. Ideal for business trips, special occasions, or simply enjoying a hassle-free
                    experience on
                    the road.</p>
                <p><br><br>With ARKILA, you’re in control of the journey.</p>
                <button class="additional-button">Learn More</button>
            </div>
        </div>
        <!----------------------------------------------------- PALAGAY PO NG FAQS -------------------------------------------------------->
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


   
</body>

</html>