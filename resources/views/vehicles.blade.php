<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <title>Vehicles</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/vehicles.css')); ?>">
    <script src="{{ asset('assets/js/landpage.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

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
        font-family: 'sf pro display', sans-serif;
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
        font-family: 'sf pro display', sans-serif;
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
        font-family: 'sf pro display', sans-serif;
        font-size: 14px;
        background: #F5F5F5;
    }

    #chatbot-input button {
        background: #F07324;
        color: white;
        border: none;
        padding: 12px 14px;
        cursor: pointer;
        font-family: 'sf pro display', sans-serif;
        font-size: 14px;
        border-radius: 8px;
        margin-left: 8px;
        transition: background 0.3s ease;
    }

    #chatbot-input button:hover {
        background: #E0611D;
    }
</style>


<body>

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

                <li><a href="{{ route('partner') }}"><i class='bx bx-user-plus'></i> <span>Partnership</span></a>
                </li>
                <!-- 
                    <li><a href="{{ route('settings') }}"><i class='bx bx-cog'></i> <span>Settings</span></a></li>

                    <li><a href="{{ route('logout') }}"><i class='bx bx-log-out'></i> <span>Logout</span></a></li> -->

            </ul>
        </div>
        <!---------------------------------------- IMAGE1 ----------------------------------------------------------------------->
        <div class="navbar-image">
            <div class="navbar-content">
                <h1>Vehicles</h1>
            </div>
        </div>

        <!-- -------------------------------------------------------- RELIABLE CONTENT ---------------------------------------------->
        <section class="reliable">
            <div class="reliable-content">
                <h3>OUR VEHICLES</h3>
                <h1>Reliable Cars For Rent</h1>
                <p>We pride ourselves on offering a fleet of reliable cars for rent, designed to make your travel
                    experience smooth and worry-free. Whether you're going on a business trip, a weekend getaway, or a
                    special event, our cars are carefully selected and maintained to ensure top-notch performance,
                    comfort, and safety.</p>
                <!---------------------------------------- SUV SECTION ----------------------------------------------------------------------->
                <div class="suv-section">
                    <div class="suv-text">
                        <h2>SUV Car</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                            Sed
                            cursus ante dapibus diam.</p>
                        <button class="proceed-button"
                            onclick="window.location.href='{{ route('rent') }}'">Proceed</button>
                    </div>
                    <div class="suv-image">
                        <img src="assets/img/suv.png" alt="SUV Image">
                    </div>
                </div>
                <div class="suv-section">
                    <div class="suv-text">
                        <h2>SUV Car</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                            Sed cursus ante dapibus diam.</p>
                        <button class="proceed-button"
                            onclick="window.location.href='{{ route('rent') }}'">Proceed</button>
                    </div>
                    <div class="suv-image">
                        <img src="assets/img/suv.png" alt="SUV Image">
                    </div>
                </div>
                <div class="suv-section">
                    <div class="suv-text1">
                        <h2>Small Car</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                            Sed cursus ante dapibus diam.</p>
                        <button class="proceed-button"
                            onclick="window.location.href='{{ route('rent') }}'">Proceed</button>
                    </div>
                    <div class="suv-image1">
                        <img src="assets/img/suv.png" alt="SUV Image1">
                    </div>
                </div>
                <div class="suv-section">
                    <div class="suv-text1">
                        <h2>Large Car</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                            Sed cursus ante dapibus diam.</p>
                        <button class="proceed-button"
                            onclick="window.location.href='{{ route('rent') }}'">Proceed</button>
                    </div>
                    <div class="suv-image1">
                        <img src="assets/img/suv.png" alt="SUV Image1">
                    </div>
                </div>
                <div class="suv-section">
                    <div class="suv-text1">
                        <h2>Van Car</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.
                            Sed cursus ante dapibus diam.</p>
                        <button class="proceed-button"
                            onclick="window.location.href='{{ route('rent') }}'">Proceed</button>
                    </div>
                    <div class="suv-image1">
                        <img src="assets/img/suv.png" alt="SUV Image1">
                    </div>
                </div>


            </div>
        </section>


    </div>

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

        <script>


           

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