<body>               
                <!-- Formulaire de modification -->
                <form method="post" class="">
                                    <h2 class="">Modification du profil</h2>

                    <label for="username">username</label>
                    <input placeholder="username" class=""  id="username" type="text" name="username" value="<?= isset($getPassword->username) ? $getPassword->username : '' ?>" />
                    <p class=""><?= isset($formErrorModify['username']) ? $formErrorModify['username'] : ''; ?></p>

                    <label for="oldPassword">Ancien mot de passe</label>
                    <input placeholder="Ancien ********" class=""  id="oldPassword" type="password" name="oldPassword" value="<?= isset($getPassword->oldPassword) ? $getPassword->oldPassword : '' ?>" />
                    <p class=""><?= isset($formErrorModify['oldPassword']) ? $formErrorModify['oldPassword'] : ''; ?></p>

                    <label for="newPassword">Nouveau mot de passe</label>
                    <input placeholder="Nouveau ********" class=""  id="newPassword" type="password" name="newPassword" value="<?= isset($getPassword->newPassword) ? $getPassword->newPassword : '' ?>" />
                    <p class=""><?= isset($formErrorModify['newPassword']) ? $formErrorModify['newPassword'] : ''; ?></p>

                    <label for="passwordConfirm">Confirmation mot de passe</label>
                    <input placeholder="Confirmer ********" class=""  id="passwordConfirm" type="password" name="passwordConfirm" value="<?= isset($getPassword->passwordConfirm) ? $getPassword->passwordConfirm : '' ?>" />
                    <p class=""><?= isset($formErrorModify['passwordConfirm']) ? $formErrorModify['passwordConfirm'] : ''; ?></p>

                    <label for="email">E-mail</label>
                    <input placeholder="Email"  class=""  id="email" type="text" name="email" value="<?= isset($getPassword->email) ? $getPassword->email : '' ?>" />
                    <p class=""><?= isset($formErrorModify['email']) ? $formErrorModify['email'] : ''; ?></p>

                    <button class="" type="submit" name="modify">Modifier</button>
                    <a class=""  href="profil.php">Annuler</a>                
                </form>
                <?php if (isset($_POST['modify']) && (count($formErrorModify) == 0)) { ?>
        <p class="">Votre modification a été prise en compte.</p>
        <?php } ?>
        </div>
    </div>
</body>