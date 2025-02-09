
function togglePassword(fieldId, eyeIcon) {
    var field = document.getElementById(fieldId);
    if (field.type === "password") {
        field.type = "text";
        eyeIcon.innerHTML = '<i class="bx bx-show"></i>';
    } else {
        field.type = "password";
        eyeIcon.innerHTML = '<i class="bx bx-hide"></i>';
    }
}
function validateForm() {
    var firstName = document.getElementById('first_name').value.trim();
    var middleName = document.getElementById('middle_name').value.trim();
    var lastName = document.getElementById('last_name').value.trim();
    var username = document.getElementById('username').value.trim();
    var email = document.getElementById('email').value.trim();
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirm_password').value;
    var dob = document.getElementById('dob').value;
    var ageInput = parseInt(document.getElementById('age').value, 10);
    var contactNumber = document.getElementById('contact_number').value.trim();
    var emergencyContact = document.getElementById('emergency_contact').value.trim();
    var terms = document.getElementById('terms').checked;

    // Check required fields
    if (!(firstName && lastName && username && email && password && confirmPassword && dob && contactNumber && emergencyContact && terms)) {
        Swal.fire({
            icon: 'error',
            title: 'Missing Fields',
            text: 'Please fill out all required fields.',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        });
        return false;
    }

    // Check password match
    if (password !== confirmPassword) {
        Swal.fire({
            icon: 'error',
            title: 'Password Mismatch',
            text: 'Passwords do not match. Please try again.',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        });
        return false;
    }

    // Check password strength
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordRegex.test(password)) {
        Swal.fire({
            icon: 'error',
            title: 'Weak Password',
            text: 'Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.',
            confirmButtonText: 'OK',
            allowOutsideClick: false
        });
        return false;
    }

    // Calculate age from DOB
    var birthDate = new Date(dob);
    var today = new Date();
    var calculatedAge = today.getFullYear() - birthDate.getFullYear();
    var monthDifference = today.getMonth() - birthDate.getMonth();
    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
        calculatedAge--;
    }

    // Check age consistency
    if (calculatedAge !== ageInput) {
        Swal.fire({
            icon: 'error',
            title: 'Age Mismatch',
            text: 'The age you entered does not match your date of birth.',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            confirmButtonColor: '#F07324',
            background: '#F9F8F2',
            iconColor: '#F07324'
        });
        return false;
    }

    // Check age limit
    if (calculatedAge < 18) {
        Swal.fire({
            icon: 'error',
            title: 'Underage',
            text: 'You must be at least 18 years old to register.',
            confirmButtonText: 'OK',
            allowOutsideClick: false,
            confirmButtonColor: '#F07324',
            background: '#F9F8F2',
            iconColor: '#F07324'
        });
        return false;
    }

    // Check duplicate contact numbers
    if (contactNumber === emergencyContact) {
        Swal.fire({
            icon: 'error',
            title: 'Duplicate Contacts',
            text: 'Contact number and emergency contact number cannot be the same.',
            confirmButtonText: 'OK',
            allowOutsideClick: false, 
            confirmButtonColor: '#F07324',
            background: '#F9F8F2',
            iconColor: '#F07324'
        });
        return false;
    }

    // All validations passed
    // Swal.fire({
    //     icon: 'success',
    //     title: 'Form Validated',
    //     text: 'Your form has been successfully validated!',
    //     confirmButtonText: 'Proceed',
    //     allowOutsideClick: false, 
    //     confirmButtonColor: '#F07324',
    //     background: '#F9F8F2',
    //     iconColor: '#F07324'
    // }).then(() => {
    //     localStorage.setItem('currentStep', 2);
    //     window.location.href = '/register2';
    // });

    return false; // Prevent form submission after redirection
}






function highlightStep(step) {
    // Remove active class from all steps and lines
    document.querySelectorAll('.timeline-step').forEach(function (element) {
        element.classList.remove('active');
    });
    document.querySelectorAll('.timeline-line').forEach(function (element) {
        element.classList.remove('active');
    });

    // Highlight based on the current step
    if (step >= 1) {
        document.getElementById('step-1').classList.add('active'); // Highlight Step 1
    }
    if (step >= 2) {
        document.getElementById('step-2').classList.add('active'); // Highlight Step 2
        document.getElementById('line-1').classList.add('active'); // Highlight Line 1
    }
    if (step === 3) {
        document.getElementById('step-3').classList.add('active'); // Highlight Step 3
        document.getElementById('line-2').classList.add('active'); // Highlight Line 2
    }
}

document.querySelector('form').addEventListener('submit', function (event) {
    // Combine all code inputs into one string
    const codeInputs = document.querySelectorAll('.code-input');
    let verificationCode = '';
    codeInputs.forEach(input => {
        verificationCode += input.value;
    });

    // Add combined code to a hidden input
    let hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'verification_code';
    hiddenInput.value = verificationCode;

    // Append hidden input to the form
    this.appendChild(hiddenInput);

    // Prevent form submission until hidden input is added
    event.preventDefault();

    // Submit the form
    this.submit();
});




// On page load, determine the current step
document.addEventListener('DOMContentLoaded', function () {
    // Define step mapping based on the page
    const pageSteps = {
        '/register': 1,  // Step 1 for register
        '/register2': 2, // Step 2 for register2
        '/register3': 3, // Step 3 for register3
    };

    // Get the current page path
    const currentPath = window.location.pathname;

    // Get the corresponding step or default to step 1
    const currentStep = pageSteps[currentPath] || 1;
    // Log current step for debugging
    console.log('Current Step:', currentStep);
    // Highlight the appropriate step
    highlightStep(currentStep);
});




// Show/Hide Forms
document.getElementById('self-drive-button').addEventListener('click', function () {
    document.getElementById('self-drive-form').classList.remove('hidden');
});

document.getElementById('with-driver-button').addEventListener('click', function () {
    document.getElementById('self-drive-form').classList.add('hidden');
});

document.addEventListener("DOMContentLoaded", function () {
    const selfDriveButton = document.getElementById("self-drive-button");
    const withDriverButton = document.getElementById("with-driver-button");
    const selfDriveForm = document.getElementById("self-drive-form");
    const withDriverForm = document.getElementById("with-driver-form");

    selfDriveButton.addEventListener("click", () => {
        selfDriveForm.classList.add("visible");
        selfDriveForm.classList.remove("hidden");
        withDriverForm.classList.add("hidden");
        withDriverForm.classList.remove("visible");
    });

    withDriverButton.addEventListener("click", () => {
        withDriverForm.classList.add("visible");
        withDriverForm.classList.remove("hidden");
        selfDriveForm.classList.add("hidden");
        selfDriveForm.classList.remove("visible");
    });
});


function validateFile(input) {
    const file = input.files[0];
    const allowedExtensions = ['jpeg', 'jpg', 'png', 'pdf'];
    const maxSize = 5 * 1024 * 1024; // 5MB in bytes

    if (file) {
        const fileExtension = file.name.split('.').pop().toLowerCase();
        const fileSize = file.size;

        if (!allowedExtensions.includes(fileExtension)) {
            alert('Invalid file type. Only JPEG, PNG, and PDF files are allowed.');
            input.value = ''; // Clear the input
            return false;
        }

        if (fileSize > maxSize) {
            alert('File size exceeds 5MB. Please upload a smaller file.');
            input.value = ''; // Clear the input
            return false;
        }

        // Display the selected file name
        const fileNameSpan = input.nextElementSibling;
        fileNameSpan.textContent = file.name;
    }
    return true;
}



function goToBack() {
    window.history.back();
}



document.querySelectorAll('.code-input').forEach((input, index, inputs) => {
    input.addEventListener('input', () => {
        if (input.value.length === input.maxLength && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
    });
});


