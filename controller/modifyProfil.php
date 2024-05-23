<?php
session_start();
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');

// Déclaration des constantes pour les regex
define('REGEX_USERNAME', '/^[0-9A-z]+$/');
define('REGEX_PASSWORD', '/^[0-9A-z]+$/');
define('REGEX_EMAIL', '/^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$/');

$formErrorModify = array();
$modifyUser =  new user();
$modifyUser->id = $_SESSION['id'];
$getPassword = $modifyUser->userById();

if (isset($_POST['modify'])) {
    // Vérification du mot de passe actuel
    if (password_verify($_POST['oldPassword'], $getPassword->password)) {
        // Validation des champs du formulaire
        $fields = ['username', 'newPassword', 'passwordConfirm', 'email'];
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $formErrorModify[$field] = 'Champs vide';
            }
        }

        if (count($formErrorModify) == 0) {
            // Validation des nouveaux mots de passe
            if ($_POST['newPassword'] == $_POST['passwordConfirm']) {
                if (!preg_match(REGEX_PASSWORD, $_POST['newPassword'])) {
                    $formErrorModify['newPassword'] = 'Le champ mot de passe est incorrect';
                } else {
                    $modifyUser->password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                }

                // Validation du nom d'utilisateur
                if (!preg_match(REGEX_USERNAME, $_POST['username'])) {
                    $formErrorModify['username'] = 'Le champ username est incorrect';
                } else {
                    $modifyUser->username = htmlspecialchars($_POST['username']);
                }

                // Validation de l'email
                if (!preg_match(REGEX_EMAIL, $_POST['email'])) {
                    $formErrorModify['email'] = 'Le champ email est incorrect';
                } else {
                    $modifyUser->email = htmlspecialchars($_POST['email']);
                }

                // Si aucune erreur, mise à jour de l'utilisateur
                if (count($formErrorModify) == 0) {
                    $modifyUser->modifyUser();
                    $formErrorModify['success'] = "Modification avec succès!";
                }
            } else {
                $formErrorModify['passwordConfirm'] = 'Les mots de passe ne correspondent pas';
            }
        }
    } else {
        $formErrorModify['oldPassword'] = "Ancien mot de passe incorrect";
    }
}
require('../view/userModifyForm.php');
