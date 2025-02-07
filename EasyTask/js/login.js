function togglePasswordVisibility(passwordFieldId) {
    const passwordField = document.getElementById(passwordFieldId);
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;
}