<body>               
                <!-- Formulaire de modification -->
                <form method="post" class="">
                                    <h2 class="">Modification du profil</h2>

                    <label for="usernameModify">username</label>
                    <input placeholder="username" class=""  id="usernameModify" type="text" name="usernameModify" value="<?= isset($getPassword->username) ? $getPassword->username : '' ?>" />
                    <p class=""><?= isset($formError['usernameModify']) ? $formError['usernameModify'] : ''; ?></p>

                    <label for="oldPassword">Ancien mot de passe</label>
                    <input placeholder="Ancien ********" class=""  id="oldPassword" type="password" name="oldPassword" value="" />
                    <p class=""><?= isset($formError['oldPassword']) ? $formError['oldPassword'] : ''; ?></p>

                    <label for="newPassword">Nouveau mot de passe</label>
                    <input placeholder="Nouveau ********" class=""  id="newPassword" type="password" name="newPassword" value="" />
                    <p class=""><?= isset($formError['newPassword']) ? $formError['newPassword'] : ''; ?></p>

                    <label for="passwordConfirm">Confirmation mot de passe</label>
                    <input placeholder="Confirmer ********" class=""  id="passwordConfirm" type="password" name="passwordConfirm" value="" />
                    <p class=""><?= isset($formError['passwordConfirm']) ? $formError['passwordConfirm'] : ''; ?></p>

                    <label for="emailModify">E-mail</label>
                    <input placeholder="Email"  class=""  id="emailModify" type="text" name="emailModify" value="<?= isset($getPassword->email) ? $getPassword->email : '' ?>" />
                    <p class=""><?= isset($formError['emailModify']) ? $formError['emailModify'] : ''; ?></p>

                    <button class="" type="submit" name="modify">Modifier</button>
                    <a class=""  href="profil.php">Annuler</a>                
                </form>
                <?php if (isset($formError['success'])){ ?>
        <p class="">Votre modification a été prise en compte.</p>
        <?php } ?>
        </div>
    </div>
</body>