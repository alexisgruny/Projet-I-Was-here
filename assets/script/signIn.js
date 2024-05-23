document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signInForm");
    const errorMessages = document.getElementById("errorMessages");
  
    form.addEventListener("submit", function(event) {
        let valid = true;
        errorMessages.innerHTML = ""; // Clear previous error messages

        const username = document.getElementById("usernameSignIn");
        const password = document.getElementById("passwordSignIn");
        const passwordConfirm = document.getElementById("passwordSignInConfirm");
        const email = document.getElementById("emailSignIn");

        // Regex definitions
        const regexUsername = /^[A-Za-z0-9_-]{3,20}$/;
        const regexPassword = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        const regexEmail = /^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$/;

        // Username validation
        if (!regexUsername.test(username.value)) {
            valid = false;
            const error = document.createElement("p");
            error.textContent = "Le nom d'utilisateur doit contenir entre 3 et 20 caractères et ne peut contenir que des lettres, des chiffres, des tirets et des underscores.";
            errorMessages.appendChild(error);
        }

        // Password validation
        if (!regexPassword.test(password.value)) {
            valid = false;
            const error = document.createElement("p");
            error.textContent = "Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et être d'au moins 8 caractères.";
            errorMessages.appendChild(error);
        }

        // Password confirmation validation
        if (password.value !== passwordConfirm.value) {
            valid = false;
            const error = document.createElement("p");
            error.textContent = "Les mots de passe ne correspondent pas.";
            errorMessages.appendChild(error);
        }

        // Email validation
        if (!regexEmail.test(email.value)) {
            valid = false;
            const error = document.createElement("p");
            error.textContent = "Le champ email est incorrect.";
            errorMessages.appendChild(error);
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});