<div class="container-fluid">
    <!-- Formulaire d'inscription-->
    <form id="signInForm" method="post" action="">
        <label for="profilDescription"> Description de profil </label>
        <br>
        <textarea class="" placeholder="Votre description" name="profilDescription"> <?= $_SESSION['profilDescription'] ?> </textarea>
        <Br>
        <button class="" type="submit" name="submitDescription">Confirmer</button>
        <a class="" href="profil.php">Annuler</a>
    </form>
