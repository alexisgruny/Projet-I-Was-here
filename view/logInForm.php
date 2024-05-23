
    <div class="container-fluid">
    <div id="errorMessages" style="color: red;"></div>
    <form id="loginForm" method="post" action="../controller/login.php">
        <label for="usernameLogIn">Nom d'utilisateur:</label>
        <input type="text" id="usernameLogIn" name="usernameLogIn" required>
        <br>
        <label for="passwordLogIn">Mot de passe:</label>
        <input type="password" id="passwordLogIn" name="passwordLogIn" required>
        <br>
        <button type="submit" name="logIn">Connexion</button>
    </form>
    </div>
    <script src="/assets/script/LogIn.js" ></script>
</body>