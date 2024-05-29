<?php
require('../model/database.php');
require('../model/user.php');
require('../view/header.php');
require('../view/navbar.php');

// Déclaration des regex
define('REGEX_username', '/^[A-Za-z0-9_-]{3,20}$/');
define('REGEX_PASSWORD', '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/');
define('REGEX_EMAIL', '/^[A-z0-9._%+-]+@[A-z0-9.-]+\.[A-z]{2,4}$/');

// Déclaration des tableaux d'érreur
$formError = array();
// Instanciation de la classe user
$newUser = new user();

if (isset($_POST['signIn'])) {
    $form = ['usernameSignIn', 'passwordSignIn', 'passwordSignInConfirm', 'emailSignIn'];
    foreach ($form as $form) {
        if (empty($_POST[$form])) {
            $formError[$form] = 'Champs vide';
        }
    }

    if (count($formError) == 0) {
        // Date de creation
        $newUser->creationDate = date('Y/m/d');
        $newUser->role = 1;
        // Validation des nouveaux mots de passe
        if ($_POST['passwordSignIn'] == $_POST['passwordSignInConfirm']) {
            if (!preg_match(REGEX_PASSWORD, $_POST['passwordSignIn'])) {
                $formError['passwordSignIn'] = 'Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et être d\'au moins 8 caractères.';
            } else {
                $newUser->password = password_hash($_POST['passwordSignIn'], PASSWORD_DEFAULT);
            }
            // Validation du nom d'utilisateur
            if (!preg_match(REGEX_username, $_POST['usernameSignIn'])) {
                $formError['usernameSignIn'] = 'Le nom d\'utilisateur doit contenir entre 3 et 20 caractères et ne peut contenir que des lettres, des chiffres, des tirets et des underscores.';
            } else {
                $newUser->username = htmlspecialchars($_POST['usernameSignIn']);
            }

            // Validation de l'email
            if (!preg_match(REGEX_EMAIL, $_POST['emailSignIn'])) {
                $formError['emailSignIn'] = 'Le champ email est incorrect';
            } else {
                $newUser->email = htmlspecialchars($_POST['emailSignIn']);
            }
            // Si aucune erreur, mise à jour de l'utilisateur
            if (count($formError) == 0) {
                $newUser->newUser();
                $formError['success'] = "Modification avec succès!";
            }
        } else {
            $formError['passwordConfirm'] = 'Les mots de passe ne correspondent pas';
        }
    }
}

require('../view/SignInForm.php');
require('../view/footer.php');
