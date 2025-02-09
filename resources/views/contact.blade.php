<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/contact.css')); ?>">
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


                    <li><a href="{{ route('rent') }}"><i class='bx bx-key'></i> <span>Rent</span></a></li>

                    <li><a href="{{ route('contact') }}"><i class='bx bx-envelope'></i> <span>Contact Us</span></a></li>

                    <li><a href="{{ route('partner') }}"><i class='bx bx-user-plus'></i> <span>Partnership</span></a>
                    </li>

                    <li><a href="{{ route('settings') }}"><i class='bx bx-cog'></i> <span>Settings</span></a></li>

<li><a href="{{ route('logout') }}"><i class='bx bx-log-out'></i> <span>Logout</span></a></li>
                </ul>
            </div>
        <!---------------------------------------- CONTACT US ----------------------------------------------------------------------->
        <section class="contactus">
            <div class="contactus-content">
                <h1>Contact Us</h1>
            </div>
        </section>

        <!----------------------------------------- TWO IMAGES---------------------------------------------------------------------->
        <div class="image-container">
            <div class="image-item">
                <img src="<?php echo e(asset('assets/img/contactus2.png')); ?>" alt="Contact Us 2">
                <p>arkila.support@gmail.com</p>
            </div>
            <div class="image-item">
                <img src="<?php echo e(asset('assets/img/contactus3.png')); ?>" alt="Contact Us 3">
                <p>+63 9560062076</p>
            </div>
        </div>

        <!----------------------------------------- SEND EMAILS---------------------------------------------------------------------->
        <section class="send-emails">
            <h2>Send e-mails here or sent to support.arkila@gmail.com</h2>
            <p>Since emails are not instant replies, if you have an urgent concern (e.g cancel, problem with payment,
                unable
                to find location), please call or chat with us online so we can better help you. ARKILA will not be
                responsible for other costs arising therefrom.</p>
            <div class="image-and-form">
                <div class="form-group-horizontal">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first-name">
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last-name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment-id">Payment ID (If Applicable)</label>
                    <input type="text" id="payment-id" name="payment-id">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <button type="submit">Send</button>
                </form>
            </div>
    </div>
    
</body>


</html>