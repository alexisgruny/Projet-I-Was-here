document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("loginForm");
    form.addEventListener("submit", function(event) {
        let valid = true;
        const username = document.getElementById("usernameLogIn");
        const password = document.getElementById("passwordLogIn");
        const errorMessages = document.getElementById("errorMessages");

        errorMessages.innerHTML = ""; // Clear previous error messages

        if (username.value.trim() === "") {
            valid = false;
            const error = document.createElement("p");
            error.textContent = "Le champ nom d'utilisateur est vide.";
            errorMessages.appendChild(error);
        }

        if (password.value.trim() === "") {
            valid = false;
            const error = document.createElement("p");
            error.textContent = "Le champ mot de passe est vide.";
            errorMessages.appendChild(error);
        }
        
        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});