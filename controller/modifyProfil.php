<?php
session_start();
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');
$regexUsername = '/^[0-9A-z]+$/';
$regexPasse = '/^[0-9A-z]+$/';
$regexMail = '/^[A-z0-9._%+-]+[\@]{1}[A-z0-9.-]+[\.]{1}[A-z]{2,4}$/';
$formErrorModify = array();
$modifyUser =  new user();
$modifyUser->id = $_SESSION['id'];
$getPassword = $modifyUser->userById();

if (isset($_POST['modify'])) {
    if (password_verify($_POST['oldPassword'], $getPassword->password)) {
        if (empty($_POST['username'])) {
            $formErrorModify['username'] = 'Champs vide';
        }
        if (empty($_POST['newPassword'])) {
            $formErrorModify['newPassword'] = 'Champs vide';
        }
        if (empty($_POST['passwordConfirm'])) {
            $formErrorModify['passwordConfirm'] = 'Champs vide';
        }
        if (empty($_POST['email'])) {
            $formErrorModify['email'] = 'Champs vide';
        }
        if (count($formErrorModify) == 0) {
            if ($_POST['newPassword'] == $_POST['passwordConfirm']) {
                if (!preg_match($regexPasse, $_POST['newPassword'])) {
                    $formErrorModify['newPassword'] = 'Le champ mot de passe est incorrect';
                } else {
                    $modifyUser->password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                }
                if (!preg_match($regexUsername, $_POST['username'])) {
                    $formErrorModify['username'] = 'Le champ username est incorrect';
                } else {
                    $modifyUser->username = htmlspecialchars($_POST['username']);
                }
                if (!preg_match($regexMail, $_POST['email'])) {
                    $formErrorModify['email'] = 'Le champ email est incorrect';
                } else {
                    $modifyUser->email = htmlspecialchars($_POST['email']);
                }
                if (count($formErrorModify) == 0) {
                    $modifyUser->modifyUser();
                    $formErrorModify['success'] = "Modification avec succée!";
                }
            }
        }
    } else {
        $formErrorModify['oldPassword'] = "Ancien mot de passe incorrect";
    }
}
require('../view/userModifyForm.php');
