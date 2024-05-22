<?php
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');
session_start();
$regexusername = '/^[0-9A-z]+$/';
$regexPasse = '/^[0-9A-z]+$/';
$regexMail = '/^[A-z0-9._%+-]+[\@]{1}[A-z0-9.-]+[\.]{1}[A-z]{2,4}$/';
$formErrorModify = array();
$modifyUser =  new user();
$modifyUser->id = $_SESSION['id'];
$getPassword = $modifyUser->userById();

if (isset($_POST['modify'])) {
    if (password_verify($_POST['oldPassword'], $getPassword->password)) {
        if (isset($_POST['username'])) {
            $modifyUser->username = htmlspecialchars($_POST['username']);
            if (!preg_match($regexusernamenyme, $modifyUser->username)) {
                $formErrorModify['username'] = 'Le champ username est incorrect';
            }
            if (empty($modifyUser->username)) {
                $formErrorModify['username'] = 'Champ requis.';
            }
        }
        if (!empty($_POST['newPassword']) && !empty($_POST['passwordConfirm']) && $_POST['Password'] == $_POST['passwordConfirm']) {
            $modifyUser->password = htmlspecialchars($_POST['newPassword']);
            if (!preg_match($regexPasse, $modifyUser->password)) {
                $formErrorModify['password'] = 'Le champ mot de passe est incorrect';
            }
            $modifyUser->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            if (empty($modifyUser->password)) {
                $formErrorModify['password'] = 'Champ requis.';
            }
        }
        if (isset($_POST['email'])) {
            $modifyUser->email = htmlspecialchars($_POST['email']);
            if (!FILTER_VAR($modifyUser->email, FILTER_VALIDATE_EMAIL)) {
                $formErrorModify['email'] = 'Le champ email est incorrect.';
            }
            if (empty($modifyUser->email)) {
                $formErrorModify['email'] = 'Champ requis.';
            }
        }
        $modifyUser->modifyUser();
    }
}

require('../view/userModifyForm.php');

?>