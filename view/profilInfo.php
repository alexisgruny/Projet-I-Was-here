<body>
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <h1 class="">Profil</h1>
                <p class="">Nom d'utilisateur : <?= $_SESSION['username'] ?></p>
                <p class="">email : <?= $_SESSION['email'] ?><p>
                <a href="/controller/modifyProfil.php">Modifier profil</a>
            </div>
        </div>
</body>