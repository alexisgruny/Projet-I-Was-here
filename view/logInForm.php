<body>
    <div class="container-fluid">

        <form method="POST" class="" white-text">
            <h1 class=""> Connexion </h1>

            <!-- username -->
            <i class=""></i>
            <label for="usernameLogIn" class="">Username</label>
            <input class="" placeholder="username" id="usernameLogIn" type="text" name="usernameLogIn" value="<?= isset($username) ? $username : '' ?>" />
            <p class=""><?= isset($formError['usernameLogIn']) ? $formError['usernameLogIn'] : ''; ?></p>

            <!-- Password -->
            <i class=""></i>
            <label for="passwordLogIn" class="">Mot de passe</label>
            <input class="" placeholder="********" id="passwordLogIn" type="password" name="passwordLogIn" value="<?= isset($password) ? $password : '' ?>" />
            <p class=""><?= isset($formError['passwordLogIn']) ? $formError['passwordLogIn'] : ''; ?></p>

            <!-- Input Submit -->
            <button class="" type="submit" name="logIn">Se connecter</button>
            <p class=""><?= isset($formError['error']) ? $formError['error'] : '' ?></p>
        </form>
    </div>
</body>