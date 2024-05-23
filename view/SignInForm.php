<div class="container-fluid">
    <!-- Formulaire d'inscription-->
    <form id="signInForm" method="post" action="">
        <label for="usernameSignIn">Nom d'utilisateur:</label>
        <input type="text" id="usernameSignIn" name="usernameSignIn">
        <br>
        <label for="passwordSignIn">Mot de passe:</label>
        <input type="password" id="passwordSignIn" name="passwordSignIn">
        <br>
        <label for="passwordSignInConfirm">Confirmer le mot de passe:</label>
        <input type="password" id="passwordSignInConfirm" name="passwordSignInConfirm">
        <br>
        <label for="emailSignIn">Email:</label>
        <input type="email" id="emailSignIn" name="emailSignIn">
        <br>
        <button type="submit" name="signIn">Inscription</button>
        <p id="errorMessages"></p>
    </form>
</div>
<script src="/assets/script/signIn.js"></script>
</body>
