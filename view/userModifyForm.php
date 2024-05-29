<body>
    <!-- Formulaire de modification -->
    <form id="profilModify" method="post" class="">
        <h2 class="">Modification du profil</h2>
        <label for="usernameModify">username</label>
        <input placeholder="username" class="" id="usernameModify" type="text" name="usernameModify" value="<?= $_SESSION['username'] ?>" />
        <Br>
        <label for="oldPassword">Ancien mot de passe</label>
        <input placeholder="Ancien ********" class="" id="oldPassword" type="password" name="oldPassword" value="" />
        <Br>
        <label for="newPassword">Nouveau mot de passe</label>
        <input placeholder="Nouveau ********" class="" id="newPassword" type="password" name="newPassword" value="" />
        <Br>
        <label for="passwordConfirm">Confirmation mot de passe</label>
        <input placeholder="Confirmer ********" class="" id="passwordConfirm" type="password" name="passwordConfirm" value="" />
        <Br>
        <label for="emailModify">E-mail</label>
        <input placeholder="email" class="" id="emailModify" type="text" name="emailModify" value="<?= $_SESSION['email'] ?>" />
        <Br>
        <button class="" type="submit" name="modify">Modifier</button>
        <a class="" href="profil.php">Annuler</a>
    </form>
    <p id="errorMessages"></p>
    <?php if (isset($formError['oldPassword'])) { ?>
        <p> Mot de passe incorrect </p>
    <?php } ?>
    <?php if (isset($formError['success'])) { ?>
        <p class="">Votre modification a été prise en compte.</p>
    <?php } ?>
    </div>
    </div>
    <script src="/assets/script/modifyProfil.js"></script>
</body>