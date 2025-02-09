<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <script src="{{ asset('assets/js/register.js') }}" defer></script>
</head>

<body>
    <div class="registration-container">

        <div class="image-container">
            <div class="logo-container">
<<<<<<< HEAD
                <img src="{{ asset('assets/img/whitelogo.png') }}" alt="Logo" class="logo">
=======
                <img src="{{ asset('assets/img/arkila_logo.png') }}" alt="Logo" class="logo">
>>>>>>> 913c2da (uploadingv1)
                <p class="logo-text">Access a ride <br> that's ready when you are</p>
            </div>
            <img src="{{ asset('assets/img/background1.png') }}">
        </div>

        <!-- Right Side (Form) -->
        <div class="form-container">

            <form action="{{ route('register.complete.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-header">
                    <h1>Welcome!</h1>
                    <p>Adventure Awaits! Sign up with ARKILA to get moving.</p>
                </div>

                <!-- timeline and registration heading container -->
                <div class="timeline-registration-container">
                    <div class="timeline">
                        <div class="timeline-step" id="step-1">1</div>
                        <div class="timeline-line" id="line-1"></div>
                        <div class="timeline-step" id="step-2">2</div>
                        <div class="timeline-line" id="line-2"></div>
                        <div class="timeline-step" id="step-3">3</div>
                    </div>
                </div>

                <div class="valid-ids-section">
                    <h2 class="valid-id-heading">Valid IDs</h2>
                    <p>III. Would you prefer to drive the vehicle yourself or have a professional driver assist you?
                        <br> <span>Please select your preferred option: Self-Drive or With Driver</span>
                    </p>

                    <!-- Buttons for Self-Drive and With Driver -->
                    <div class="service-buttons-container">
                        <button type="button" class="service-button" id="self-drive-button">Self-Drive</button>
                        <button type="button" class="service-button" id="with-driver-button">With Driver</button>
                    </div>

                    <!-- Self-Drive Form -->
                    <form action="{{ route('upload.files') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div id="self-drive-form" class="hidden">
                            <div class="form-group">
                                <label for="driver-license">Select Driver's License</label>
                                <select id="driver-license" name="driver_license">
                                    <option value="professional">Professional</option>
<<<<<<< HEAD
                                    
=======
                                    <option value="non-professional">Non-Professional</option>
>>>>>>> 913c2da (uploadingv1)
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="front-license-upload">Upload Front of Driver's License</label>
                                <div class="file-upload-box">
                                    <input type="file" id="front-license-upload" name="front_license"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="front-license-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('front-license-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="back-license-upload">Upload Back of Driver's License</label>
                                <div class="file-upload-box">
                                    <input type="file" id="back-license-upload" name="back_license"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="back-license-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('back-license-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>


                            <!-- Second ID Section -->
                            <div class="form-group">
                                <label for="second-id">Select Second ID</label>
                                <select id="second-id" name="second_id">
                                    <option value="passport">Passport</option>
                                    <option value="ssr">SSS ID</option>
                                    <option value="philhealth">PhilHealth ID</option>
                                    <option value="voters">Voter's ID</option>
                                    <option value="postal">Postal ID</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="front-second-id-upload">Upload Front of Selected ID</label>
                                <div class="file-upload-box">
                                    <input type="file" id="front-second-id-upload" name="front_second_id"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="front-second-id-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('front-second-id-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="back-second-id-upload">Upload Back of Selected ID</label>
                                <div class="file-upload-box">
                                    <input type="file" id="back-second-id-upload" name="back_second_id"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="back-second-id-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('back-second-id-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>


                            <div class="id-verification-instructions">
                                <h3>Self - Drive: ID Verification Instructions for ARKILA</h3>
                                <p><strong>Prepare Your IDs:</strong></p>
                                <ul>
                                    <li>Make sure you have (2) two different valid IDs available, you are required to
                                        upload your Driver's License.</li>
                                    <li>The IDs should be government-issued and should include your full name, clear
                                        photo, and birthdate.</li>
                                </ul>
                                <p><strong>Requirements for Uploaded IDs:</strong></p>
                                <ul>
                                    <li>The IDs must be clear and legible. Blurry, obscured, or low-quality images may
                                        result in delays in the verification process.</li>
                                    <li>Accepted ID formats: JPEG, PNG, or PDF.</li>
                                    <li>File size should not exceed 5 MB per ID.</li>
                                </ul>
                                <p><strong>Uploading Both Sides of Each ID:</strong></p>
                                <ul>
                                    <li><strong>Front of ID:</strong> Ensure the front of each ID is clear, showing your
                                        photo, name, and other details.</li>
                                    <li><strong>Back of ID:</strong> Make sure to capture the back side, which often
                                        includes additional information and security features.</li>
                                </ul>
                                <p><strong>Privacy Protection:</strong></p>
                                <ul>
                                    <li>Your documents are stored securely and will be used only for verification
                                        purposes,
                                        in compliance with our Privacy Policy.</li>
                                </ul>
                            </div>

                        </div>

                        <!-- With Driver Form -->
                        <div id="with-driver-form" class="hidden">
                            <div class="form-group">
                                <label for="first-id">Select First ID</label>
                                <select id="first-id" name="first_id">
                                    <option value="passport">Passport</option>
                                    <option value="sss">SSS ID</option>
                                    <option value="philhealth">PhilHealth ID</option>
                                    <option value="voters">Voter's ID</option>
                                    <option value="postal">Postal ID</option>
                                </select>
                            </div>

                            <!-- Upload Front of First ID -->
                            <div class="form-group">
                                <label for="first-id-front-upload">Upload Front of First ID</label>
                                <div class="file-upload-box">
                                    <input type="file" id="first-id-front-upload" name="first_id_front"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="first-id-front-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('first-id-front-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>

                            <!-- Upload Back of First ID -->
                            <div class="form-group">
                                <label for="first-id-back-upload">Upload Back of First ID</label>
                                <div class="file-upload-box">
                                    <input type="file" id="first-id-back-upload" name="first_id_back"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="first-id-back-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('first-id-back-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="second-id">Select Second ID</label>
                                <select id="second-id" name="second_id">
                                    <option value="passport">Passport</option>
                                    <option value="sss">SSS ID</option>
                                    <option value="philhealth">PhilHealth ID</option>
                                    <option value="voters">Voter's ID</option>
                                    <option value="postal">Postal ID</option>
                                </select>
                            </div>

                            <!-- Upload Front of Second ID -->
                            <div class="form-group">
                                <label for="second-id-front-upload">Upload Front of Second ID</label>
                                <div class="file-upload-box">
                                    <input type="file" id="second-id-front-upload" name="second_id_front"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="second-id-front-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('second-id-front-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>

                            <!-- Upload Back of Second ID -->
                            <div class="form-group">
                                <label for="second-id-back-upload">Upload Back of Second ID</label>
                                <div class="file-upload-box">
                                    <input type="file" id="second-id-back-upload" name="second_id_back"
                                        accept=".jpeg,.jpg,.png,.pdf" onchange="validateFile(this)"
                                        style="display: none;" />
                                    <span id="second-id-back-filename">No file chosen</span>
                                    <button type="button" class="custom-file-upload"
                                        onclick="document.getElementById('second-id-back-upload').click();">Choose
                                        File</button>
                                </div>
                            </div>

                            <!-- ID Verification Instructions -->
                            <div class="id-verification-instructions">
                                <h3>With Driver : ID Verification Instructions for ARKILA</h3>
                                <p><strong>Prepare Your IDs:</strong></p>
                                <ul>
                                    <li>Make sure you have (2) two different valid IDs available.</li>
                                    <li>The IDs should be government-issued and should include your full name, clear
                                        photo, and birthdate.</li>
                                </ul>
                                <p><strong>Requirements for Uploaded IDs:</strong></p>
                                <ul>
                                    <li>The IDs must be clear and legible. Blurry, obscured, or low-quality images may
                                        result in delays in the verification process.</li>
                                    <li>Accepted ID formats: JPEG, PNG, or PDF.</li>
                                    <li>File size should not exceed 5 MB per ID.</li>
                                </ul>
                                <p><strong>Uploading Both Sides of Each ID:</strong></p>
                                <ul>
                                    <li><strong>Front of ID:</strong> Ensure the front of each ID is clear, showing your
                                        photo, name, and other details.</li>
                                    <li><strong>Back of ID:</strong> Make sure to capture the back side, which often
                                        includes additional information and security features.</li>
                                </ul>
                                <p><strong>Privacy Protection:</strong></p>
                                <ul>
                                    <li>Your documents are stored securely and will be used only for verification
                                        purposes,
                                        in compliance with our Privacy Policy.</li>
                                </ul>
                            </div>
                        </div>


                        <!-- New Checkbox with Different Naming Convention -->
                        <div class="form-group new-terms">
                            <input type="checkbox" id="agree-privacy" class="new-custom-checkbox" name="agree_privacy">
                            <label for="agree-privacy">
<<<<<<< HEAD
                                I have read and agreed to the <a href="{{ asset('documents/terms.pdf') }}" target="_blank"> Privacy Policy</a>.
=======
                                I have read and agreed to the <a href="#"> Privacy Policy</a>.
>>>>>>> 913c2da (uploadingv1)
                            </label>
                        </div>

                        <div class="navigation-buttons">
                            <button type="submit" class="next1-button">Proceed to Login</button>
                            <button type="button" class="back1-button" onclick="goToBack()">Back</button>
                        </div>

                    </form>
                </div>
            </form>
        </div>
    </div>
</body>

</html>