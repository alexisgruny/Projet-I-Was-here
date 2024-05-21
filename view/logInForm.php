<body>
    <div class="container-fluid">

        <form method="POST" class="" white-text">
            <h1 class=""> Connexion </h1>

            <!-- username -->
            <i class=""></i>
            <label for="username" class="">Username</label>
            <input class="" placeholder="username" id="username" type="text" name="username" value="<?= isset($username) ? $username : '' ?>" />
            <p class=""><?= isset($formErrorConnect['username']) ? $formErrorConnect['username'] : ''; ?></p>

            <!-- Password -->
            <i class=""></i>
            <label for="password" class="">Mot de passe</label>
            <input class="" placeholder="********" id="password" type="password" name="password" value="<?= isset($password) ? $password : '' ?>" />
            <p class=""><?= isset($formErrorConnect['password']) ? $formErrorConnect['password'] : ''; ?></p>

            <!-- Input Submit -->
            <button class="" type="submit" name="logIn">Se connecter</button>
            <p class=""><?= isset($formErrorConnect['error']) ? $formErrorConnect['error'] : '' ?></p>
        </form>
    </div>
</body>