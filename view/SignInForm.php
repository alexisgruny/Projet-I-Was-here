
<div class="container-fluid">   
        
        <!-- Formulaire d'inscription-->
        <form method="post" class="">
            <h1 class="mt-3">Inscription </h1>
            
            <!-- username -->
            <label for="usernameSignIn">nom de compte</label>
            <input  placeholder="username" id="usernameSignIn" type="text" name="usernameSignIn" value="<?= isset($newUser->username) ? $newUser->username : '' ?>" />
            <p class=""><?= isset($formError['usernameSignIn']) ? $formError['usernameSignIn'] : ''; ?></p>
            
            <!-- Password -->
            <label for="passwordSignIn">Mot de passe</label>
            <input placeholder="********" id="passwordSignIn" type="password" name="passwordSignIn" value="" />
            <p class=""><?= isset($formError['passwordSignIn']) ? $formError['passwordSignIn'] : ''; ?></p>
            
            <!-- PasswordConfirm -->
            <label for="passwordSignInConfirm">Confirmation mot de passe</label>
            <input  placeholder="********" id="passwordSignInConfirm" type="password" name="passwordSignInConfirm" value="<?= isset($newUser->passwordConfirm) ? $newUser->passwordConfirm : '' ?>" />
            <p class=""><?= isset($formError['passwordSignInConfirm']) ? $formError['passwordSignInConfirm'] : ''; ?></p>
            
            <!-- Email -->
            <label for="emailSignIn">E-mail</label>
            <input placeholder="Something@else.kek" id="emailSignIn" type="text" name="emailSignIn" value="<?= isset($newUser->email) ? $newUser->email : '' ?>" />
            <p class=""><?= isset($formError['emailSignIn']) ? $formError['emailSignIn'] : ''; ?></p>
            
            <!-- Submit -->
            <button class="" type="submit" name="signIn">S'inscrire</button>
            <p class=""><?= isset($formError['submit']) ? $formError['submit'] : ''; ?></p>
        </form>
        <!-- Fin du formulaire d'inscription -->
    </div>
</div>
</body>
</html>