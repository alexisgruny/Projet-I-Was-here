
<div class="container-fluid">   
        
        <!-- Formulaire d'inscription-->
        <form method="post" class="">
            <h1 class="mt-3">Inscription </h1>
            
            <!-- username -->
            <label for="usernameSignIn">nom de compte</label>
            <input  placeholder="username" id="usernameSignIn" type="text" name="usernameSignIn" value="<?= isset($newUser->usernameSignIn) ? $newUser->usernameSignIn : '' ?>" />
            <p class=""><?= isset($formErrorSignIn['usernameSignIn']) ? $formErrorSignIn['usernameSignIn'] : ''; ?></p>
            
            <!-- Password -->
            <label for="passwordSignIn">Mot de passe</label>
            <input placeholder="********" id="passwordSignIn" type="password" name="passwordSignIn" value="<?= isset($newUser->passwordSignIn) ? $newUser->passwordSignIn : '' ?>" />
            <p class=""><?= isset($formErrorSignIn['passwordSignIn']) ? $formErrorSignIn['passwordSignIn'] : ''; ?></p>
            
            <!-- PasswordConfirm -->
            <label for="passwordConfirm">Confirmation mot de passe</label>
            <input  placeholder="********" id="passwordConfirm" type="password" name="passwordConfirm" value="<?= isset($newUser->passwordConfirm) ? $newUser->passwordConfirm : '' ?>" />
            <p class=""><?= isset($formErrorSignIn['passwordConfirm']) ? $formErrorSignIn['passwordConfirm'] : ''; ?></p>
            
            <!-- Email -->
            <label for="email">E-mail</label>
            <input placeholder="Something@else.kek" id="email" type="text" name="email" value="<?= isset($newUser->email) ? $newUser->email : '' ?>" />
            <p class=""><?= isset($formErrorSignIn['email']) ? $formErrorSignIn['email'] : ''; ?></p>
            
            <!-- Submit -->
            <button class="btn btn-primary btn-md" type="submit" name="signIn">S'inscrire</button>
        </form>
        <!-- Fin du formulaire d'inscription -->
    </div>
</div>
</body>
</html>