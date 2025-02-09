<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARKILA</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landpage.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
</head>


<body>
    <div id="scroll-progress"></div>

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
            </ul>
        </div>

        <!---------------------------------------- VIDEO1 ----------------------------------------------------------------------->

        <section class="home">
            <video autoplay muted loop id="background-video">
                <source src="{{ asset('assets/img/car.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-overlay"></div>
            <div class="home-content">
                <h1>Welcome to <span>ARKILA</span></h1>
            </div>
        </section>

        <!---------------------------------------------------------- IMG1 ------------------------------------------------------->
        <div class="content">
            <img src="<?php echo e(asset('assets/img/adver.png')); ?>" alt="Advertisement" class="advertisement">
        </div>

        <!--------------------------------------------------- AVAILABLE CAR BRANDS ----------------------------------------------->
        <section class="available-cars">
            <h2>Available Car Brands</h2>
            <div class="brands">
                <img src="<?php echo e(value: asset(path: 'assets/img/carbrands.png'))?>" alt="Brands"
                    class="available-cars">
            </div>

        </section>

        <!-------------------------------------------------- OUR PARTNERS --------------------------------------------------------->
        <section class="our-partners">
            <h2>Our Partners</h2>
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

        <!------------------------------------------------------- WHY CHOOSE US? ----------------------------------------->

        <section class="reviews-section">
            <h2>WHY CHOOSE US?</h2>
            <h3>Top-Rated Service</h3>
            <div class="reviews-container">
                <div class="arrow-container">
                    <div class="arrow left-arrow"><i class="bx bx-chevron-left"></i></div> <!-- Left Arrow -->
                </div>
                <div class="reviews-wrapper">
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilrutrum.</p>
                        <h4>Oliver</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>P Bibby Nay</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>Jay X Carmona</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>creng creng</h4>
                        <div class="rating">⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>ark</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>berong</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>oyie</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis
                            rutrum.</p>
                        <h4>rio</h4>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <div class="arrow-container">
                    <div class="arrow right-arrow"><i class="bx bx-chevron-right"></i></div> <!-- Right Arrow -->
                </div>
            </div>
        </section>

        <!------------------------------------------------ HOW TO BOOK ----------------------------------------------------->

        <section class="booking-section">
            <h1>HOW TO BOOK YOUR CAR RENTAL?</h1>
            <h2>Easy Process</h2>
            <p>Booking your car rental with us is quick and hassle-free! Simply choose from our wide selection of
                cars—whether you prefer a self-drive option for full freedom or
                a with-driver service for a more relaxed experience. Once you've picked your car, just select your
                pick-up
                and return dates, and confirm your reservation. Payment can be made after booking, ensuring a secure and
                easy transaction. When your booking is
                complete, simply pick up your car on the scheduled date and enjoy a smooth, stress-free ride.
            </p>
            <div class="steps-container" >
                <div class="step-box">
                    <img src="assets/img/choose.jpg" alt="Step 1 Image">
                    <h3>Choose a Car</h3>
                    <p>RESERVE A CAR
                        <a href="{{ route('vehicles') }}" class="arrow-link"><i class='bx bx-chevron-right'></i></a>
                    </p>
                </div>

                <div class="step-box center-box">
                    <img src="assets/img/date.jpg" alt="Step 2 Image">
                    <h3>Book a date</h3>
                    <p>RESERVE A CAR
                        <a href="{{ route('vehicles') }}" class="arrow-link"><i class='bx bx-chevron-right'></i></a>
                    </p>
                </div>

                <div class="step-box">
                    <img src="assets/img/feedback.jpg" alt="Step 3 Image">
                    <h3>Let Us Know!</h3>
                    <p>RESERVE A CAR
                        <a href="{{ route('vehicles') }}" class="arrow-link"><i class='bx bx-chevron-right'></i></a>
                    </p>
                </div>
            </div>
        </section>


        <!----------------------------------------------------- WANNA RENT A CAR ------------------------------------------------>
        <section class="wanna">
            <div class="content-wanna">
                <h3>WANNA RENT A CAR A ROUND RIZAL?</h3>
                <h1>Trust ARKILA <br>for Your Journey</h1>
                <p>Whether you're exploring the scenic routes of Rizal or heading to a special event,
                    ARKILA has you covered with exceptional service and trusted staff.
                    Here’s why ARKILA is the go-to choice for car rentals around Rizal:</p>

                <div class="lorem-container">
                    <div class="timeline-item">
                        <p>Friendly Staff</p>
                        <hr class="lorem-line">
                    </div>
                    <div class="timeline-item">
                        <p>Timely Query Responses</p>
                        <hr class="lorem-line">
                    </div>
                    <div class="timeline-item">
                        <p>Reliable Service</p>
                        <hr class="lorem-line">
                    </div>
                    <div class="timeline-item">
                        <p>Top-Notch Driver</p>
                        <hr class="lorem-line">
                    </div>
                </div>

            </div>

            <div class="boxes-wanna">
                <div class="box-wanna1">
                    <img src="<?php echo e(asset('assets/img/imgwanna.png')); ?>" alt="Image1">
                </div>

                <div class="box-wanna2"></div>
                <div class="box-wanna3"></div>

                <div class="box-wanna4">
                    <img src="<?php echo e(asset('assets/img/imgwanna1.png')); ?>" alt="Image2">
                </div>

                <div class="box-wanna5">
                    <img src="<?php echo e(asset('assets/img/imgwanna2.png')); ?>" alt="Image3">
                </div>
                <div class="box-wanna6"></div>
                <div class="box-wanna7"></div>
                <div class="box-wanna8">
                    <img src="<?php echo e(asset('assets/img/imgwanna3.png')); ?>" alt="Image4">
                </div>
            </div>


        </section>

        <!----------------------------------------------------- CHEAP CAR -------------------------------------------------------->
        <section class="cheap-car">
            <h2>Cheap Car Rental Deals in Rizal</h2>
            <div class="info-box">
                <img src="<?php echo e(asset('assets/img/warning.png')); ?>" alt="Warning Icon" class="warning-icon">
                <p>Discover the best prices and deals for you by selecting your travel dates. <span
                        class="hover-bold">Choose your dates.</span></p>
            </div>

            <div class="car-deals">
                @for ($i = 1; $i <= 15; $i++)
                    <div class="car-box">

                        <img src="<?php    echo e(asset('assets/img/car' . ($i % 1 + 1) . '.png')); ?>" alt="Car Image"
                            class="car-image">
                        <div class="logo-line">
                            <img src="<?php    echo e(asset('assets/img/oplogo' . ($i % 5 + 1) . '.png')); ?>"
                                alt="Partner Logo" class="partner-logo">
                            <hr class="logo-line-separator">
                        </div>
                        <h3 class="car-title">Honda {{$i}}</h3>
                        <p class="car-description">or similar SMALL {{$i}}.</p>
                        <div class="car-details">
                            <div class="detail-item">
                                <img src="<?php    echo e(asset('assets/img/icon1.png')); ?>" alt="Icon 1"
                                    class="detail-icon">
                                <span class="detail-text">4 adult passengers</span>
                            </div>
                            <div class="detail-item">
                                <img src="<?php    echo e(asset('assets/img/icon2.png')); ?>" alt="Icon 2"
                                    class="detail-icon">
                                <span class="detail-text">2 suitcase(s)</span>
                            </div>
                            <div class="detail-item">
                                <img src="<?php    echo e(asset('assets/img/icon3.png')); ?>" alt="Icon 3"
                                    class="detail-icon">
                                <span class="detail-text">Diesel fuel</span>
                            </div>
                            <div class="detail-item">
                                <img src="<?php    echo e(asset('assets/img/icon4.png')); ?>" alt="Icon 4"
                                    class="detail-icon">
                                <span class="detail-text">Manual transmission</span>
                            </div>
                        </div>
                        <button class="car-button" onclick="window.location.href='{{ route('rent') }}'">View Deal</button>
                    </div>
                @endfor
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

</body>

=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    landing page
</body>
>>>>>>> 913c2da (uploadingv1)
</html>