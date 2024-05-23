<?php
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');

$formError = array();

if (isset($_POST['logIn'])) {
    $fields = ['usernameLogIn', 'passwordLogIn'];
    foreach ($fields as $field) {
        if (empty($_POST[$field])) {
            $formError[$field] = 'Champs vide';
        }
    }

    if (count($formError) == 0) {
        // Instanciation de la classe user
        $user = new user();
        $user->username = htmlspecialchars($_POST['usernameLogIn']);

        // Appel de la méthode userConnection
        if ($user->userConnection()) {
            if (password_verify($_POST['passwordLogIn'], $user->password)) {
                // La connexion est réussie
                session_start();
                $_SESSION['username'] = $user->username;
                $_SESSION['id'] = $user->id;
                $_SESSION['email'] = $user->email;
                $_SESSION['isConnect'] = true;

                // Redirection vers la page du profil de l'utilisateur
                header('Location: ../controller/profil.php');
                exit();
            } else {
                $formError['error'] = 'Mauvais nom de compte ou mot de passe';
            }
        } else {
            $formError['error'] = 'Erreur de connexion';
        }
    }
}

require('../view/logInForm.php');
