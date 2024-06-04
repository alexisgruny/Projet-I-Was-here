<div class="container-fluid">
    <div class="row">
        <div class="">
            <img src="<?= $_SESSION['profilPicture'] ?>"/>
            <h1 class="">Profil</h1>
            <p class="">Nom d'utilisateur : <?= $_SESSION['username'] ?></p>
            <p class="">email : <?= $_SESSION['email'] ?></p>
            <p class=""> <?= $_SESSION['profilDescription'] ?></p>
            <a href="/controller/profilDescription.php">Modifier votre description</a>
            <a href="/controller/profilPicture.php">Modifier la photo du profil</a>
            <a href="/controller/modifyProfil.php">Modifier les informations du profil</a>
            <a href="/controller/deleteProfil.php">supprimer profil</a>
        </div>
    </div>
    </body>