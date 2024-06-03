<?php
session_start();
require('../model/database.php');
require('../model/user.php');
require('../view/header.php');
require('../view/navbar.php');
$formError = array();
$modifyDescription =  new user();

if (isset($_POST['submitDescription'])) {
    if(!empty($_POST['profilDescription'])){
        $modifyDescription->profilDescription = htmlspecialchars($_POST['profilDescription']);
        $modifyDescription->id = $_SESSION['id'];
        $modifyDescription->modifyDescription();
    } else {
        $formError['profilDescription'] = 'champs vide';
    }
}
require('../view/profilDescriptionForm.php');
require('../view/footer.php');
?>