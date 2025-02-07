const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('error')) {
    const error = urlParams.get('error');
    let message = '';
    switch (error) {
        case 'passwords_do_not_match':
            message = 'Passwords do not match.';
            break;
        case 'invalid_email_format':
            message = 'Invalid email format.';
            break;
        case 'username_or_email_taken':
            message = 'Username or email is already taken.';
            break;
        case 'registration_failed':
            message = 'Registration failed. Please try again.';
            break;
        default:
            message = 'An unknown error occurred.';
    }
    showErrorModal(message);
}

function togglePasswordVisibility(passwordFieldId) {
    const passwordField = document.getElementById(passwordFieldId);
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;
}