<?php
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');

//tableau d'érreur
$formError = array();

if (isset($_POST['logIn'])) {
    $form = ['usernameLogIn', 'passwordLogIn'];
    foreach ($form as $form) {
        if (empty($_POST[$form])) {
            $formError[$form] = 'Champs vide';
        }
    }
    if (count($formError) == 0) {
        // Instenciation de la classe user
        $user = new user();
        $user->username = $_POST['usernameLogIn'];
        // Appel de la méthode userConnection
        if ($user->userConnection()) {
            if (password_verify($_POST['passwordLogIn'], $user->password)) {
                //la connexion se fait
                //On rempli la session avec les attributs de l'objet issus de l'hydratation
                session_start();
                $_SESSION['username'] = $user->username;
                $_SESSION['id'] = $user->id;
                $_SESSION['email'] = $user->email;
                $_SESSION['isConnect'] = true;
                // Redirection sur la page du profil de l'utilisateur
                header('location: ../controller/profil.php');
            } else {
                //la connexion échoue
                $formError['error'] = 'Mauvais nom de compte ou de mot de passe';
            }
        } else {
            $formError['error'] = 'Mauvais nom de compte ou de mot de passe';
        }
    }
};

require('../view/logInForm.php');
require('../view/footer.php');
