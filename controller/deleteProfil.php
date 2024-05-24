<?php
    session_start();
    require('../src/database.php');
    require('../src/user.php');
    require('../view/header.php');
    require('../view/navbar.php');

    if (isset($_POST['delete'])){
        $user = new user();
        $user->id = $_SESSION['id'];
        $user->userDelete();
        header('location: ../controller/logIn.php');
    }

    require('../view/deleteProfilView.php');
    require('../view/footer.php');