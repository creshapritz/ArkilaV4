<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <title>ARKILA</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landpage.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Chatbot Button */
        #chatbot-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: rgba(240, 115, 36, 0.7);
            /* Subtle background */
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        #chatbot-btn:hover {
            transform: scale(1.1);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }

        #chatbot-btn img {
            width: 80%;
            height: 80%;
            border-radius: 50%;
        }

        /* Chatbot Container */
        #chatbot-container {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            visibility: hidden;
            overflow: hidden;
        }

        #chatbot-container.active {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
        }

        /* Chatbot Header */
        #chatbot-header {
            background: #F07324;
            color: white;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 12px 12px 0 0;
            font-family: 'sf pro display',sans-serif;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #bot-profile {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        #chatbot-header .close-btn {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }

        /* Chatbot Messages */
        #chatbot-messages {
            height: 350px;
            overflow-y: auto;
            padding: 15px;
            font-family: 'sf pro display',sans-serif;
            font-size: 14px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* User and Bot Messages */
        .message {
            max-width: 80%;
            padding: 10px 14px;
            border-radius: 18px;
            font-size: 14px;
            word-wrap: break-word;
        }

        .user-message {
            align-self: flex-end;
            background: #F07324;
            color: white;
            border-radius: 18px 18px 0 18px;
        }

        .bot-message {
            align-self: flex-start;
            background: #F1F1F1;
            color: black;
            border-radius: 18px 18px 18px 0;
        }

        /* Chatbot Input */
        #chatbot-input {
            display: flex;
            border-top: 1px solid #ddd;
            padding: 10px;
            background: #ffffff;
        }

        #chatbot-input input {
            flex: 1;
            padding: 12px;
            border: none;
            outline: none;
            border-radius: 8px;
            font-family: 'sf pro display',sans-serif;
            font-size: 14px;
            background: #F5F5F5;
        }

        #chatbot-input button {
            background: #F07324;
            color: white;
            border: none;
            padding: 12px 14px;
            cursor: pointer;
            font-family: 'sf pro display',sans-serif;
            font-size: 14px;
            border-radius: 8px;
            margin-left: 8px;
            transition: background 0.3s ease;
        }

        #chatbot-input button:hover {
            background: #E0611D;
        }
    </style>

</head>


<body>

    <!-- Chatbot Button -->
    <button id="chatbot-btn">
        <img src="{{ asset('assets/img/whitelogo.png') }}" alt="Chatbot Logo" id="chatbot-logo">
    </button>

    <!-- Chatbot Window -->
    <div id="chatbot-container">
        <div id="chatbot-header">
            <img src="{{ asset('assets/img/whitelogo.png') }}" alt="Bot Profile" id="bot-profile">
            ARKILA Support Agent
        </div>
        <div id="chatbot-messages"></div>
        <div id="chatbot-input">
            <input type="text" id="chatbot-text" placeholder="Type a message...">
            <button id="chatbot-send">Send</button>
        </div>
    </div>



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
                <h1>Welcome to <span> ARKILA</span></h1>
            </div>
        </section>

        <!---------------------------------------------------------- IMG1 ------------------------------------------------------->
        <div class="content">
            <img src="<?php echo e(asset('assets/img/adver.png')); ?>" alt="Advertisement" class="advertisement">
        </div>

        <!--------------------------------------------------- AVAILABLE CAR BRANDS ----------------------------------------------->
        <section class="available-cars">
            <h2>Available Car Brands</h2>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand1.png'))?>"
                            alt="Brand 1" class="brand-img"></div>
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand2.png'))?>"
                            alt="Brand 2" class="brand-img"></div>
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand3.png'))?>"
                            alt="Brand 3" class="brand-img"></div>
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand4.png'))?>"
                            alt="Brand 4" class="brand-img"></div>
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand5.png'))?>"
                            alt="Brand 5" class="brand-img"></div>
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand6.png'))?>"
                            alt="Brand 6" class="brand-img"></div>
                    <div class="swiper-slide"><img src="<?php echo e(value: asset(path: 'assets/img/brand7.png'))?>"
                            alt="Brand 7" class="brand-img"></div>
                </div>
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
                        <div class="rating">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i
                                class="bx bxs-star"></i><i class="bx bxs-star"></i>
                        </div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis rutrum.</p>
                        <h4>P Bibby Nay</h4>
                        <div class="rating">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i
                                class="bx bxs-star"></i><i class="bx bxs-star"></i>
                        </div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis rutrum.</p>
                        <h4>Jay X Carmona</h4>
                        <div class="rating">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i
                                class="bx bxs-star"></i><i class="bx bxs-star"></i>
                        </div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis rutrum.</p>
                        <h4>creng creng</h4>
                        <div class="rating">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i
                                class="bx bxs-star"></i>
                        </div>
                    </div>
                    <div class="review-box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vehicula nisl et massa
                            facilisis rutrum.</p>
                        <h4>ark</h4>
                        <div class="rating">
                            <i class="bx bxs-star"></i><i class="bx bxs-star"></i><i class="bx bxs-star"></i><i
                                class="bx bxs-star"></i><i class="bx bxs-star"></i>
                        </div>
                    </div>
                    <!-- Add more review boxes as needed -->
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
            <div class="steps-container">
                <div class="step-box">

                    <h3>Choose a Car</h3>
                    <p>RESERVE A CAR
                        <a href="{{ route('vehicles') }}" class="arrow-link"><i class='bx bx-chevron-right'></i></a>
                    </p>
                </div>

                <div class="step-box center-box">

                    <h3>Book a date</h3>
                    <p>RESERVE A CAR
                        <a href="{{ route('vehicles') }}" class="arrow-link"><i class='bx bx-chevron-right'></i></a>
                    </p>
                </div>

                <div class="step-box">

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

            <div class="car-deals-wrapper">
                <div class="car-deals-container">
                    <div class="car-deals">
                        @for ($i = 1; $i <= 10; $i++)
                            <div class="car-box">
                                <img src="<?php    echo e(asset('assets/img/car' . ($i % 1 + 1) . '.png')); ?>"
                                    alt="Car Image" class="car-image">
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
                                <button class="car-button" onclick="window.location.href='{{ route('rent') }}'">View
                                    Deal</button>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="nav-buttons">
                    <button class="arrow left-arrow" onclick="scrollDeals(-1)">&#10094;</button>
                    <button class="arrow right-arrow" onclick="scrollDeals(1)">&#10095;</button>
                </div>
            </div>
        </section>

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


        <script>
            let currentScroll = 0;

            function scrollDeals(direction) {
                const container = document.querySelector('.car-deals');
                const containerWidth = document.querySelector('.car-deals-container').offsetWidth;
                const carBoxWidth = document.querySelector('.car-box').offsetWidth + 20; // Box width + gap
                const maxScroll = container.scrollWidth - containerWidth;

                const scrollAmount = carBoxWidth * 2; // Adjust the number of items scrolled (e.g., 2 instead of 4)

                if (direction === 1 && currentScroll < maxScroll) {
                    currentScroll += scrollAmount;
                    if (currentScroll > maxScroll) currentScroll = maxScroll; // Prevent over-scrolling
                } else if (direction === -1 && currentScroll > 0) {
                    currentScroll -= scrollAmount;
                    if (currentScroll < 0) currentScroll = 0; // Prevent negative scrolling
                }

                container.style.transform = `translateX(-${currentScroll}px)`;
            }


            document.addEventListener('DOMContentLoaded', function () {
                const chatbotBtn = document.getElementById('chatbot-btn');
                const chatbotContainer = document.getElementById('chatbot-container');
                const chatMessages = document.getElementById('chatbot-messages');
                const chatInput = document.getElementById('chatbot-text');
                const sendButton = document.getElementById('chatbot-send');

                // Toggle chatbot visibility
                chatbotBtn.addEventListener('click', function () {
                    chatbotContainer.classList.toggle('active');
                });


                // Function to add messages in a container with timestamp below
                function addMessage(sender, message, color, alignment) {
                    let time = new Date().toLocaleTimeString(); // Get current time
                    let messageHtml = `
            <div style="display: flex; flex-direction: column; align-items: ${alignment}; margin-bottom: 10px;">
                <div style="max-width: 70%; padding: 10px; border-radius: 10px; background-color: ${color}; color: white;">
                    <strong>${sender}:</strong> ${message}
                </div>
                <span style="font-size: 12px; color: gray; margin-top: 5px;">${time}</span>
            </div>
        `;
                    chatMessages.innerHTML += messageHtml;
                    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
                }

                // Send message function
                function sendMessage() {
                    let userMessage = chatInput.value.trim();
                    if (userMessage === "") return;

                    addMessage("You", userMessage, "#2e2e2e", "flex-end");
                    chatInput.value = "";


                    fetch('/chat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ message: userMessage })
                    })
                        .then(response => response.json())
                        .then(data => {
                            let botMessage = data.reply ? data.reply : "No response received";
                            addMessage("ARKILA", botMessage, "#F07324", "flex-start");
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            addMessage("ARKILA", "Error: Unable to process request.", "#dc3545", "flex-start"); // Red for errors
                        });
                }

                // Send message on button click
                sendButton.addEventListener('click', sendMessage);

                // Send message on Enter key press
                chatInput.addEventListener('keypress', function (event) {
                    if (event.key === 'Enter') {
                        sendMessage();
                    }
                });
            });


        </script>


</body>

</html>