<?php
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');
require('../view/logInForm.php');

// Déclaration des regex
$regexUsername = '/^[0-9A-z]+$/';
$regexPasse = '/^[0-9A-z]+$/';
//tableau d'érreur
$formErrorConnect = array();

if (isset($_POST['logIn'])) {
    //Si username existe , la passer au test regex , si elle passe la stocker dans $username sinon c'est vide
        if (isset($_POST['username'])) {
            //déclarion de la variable lastname avec le htmlspecialchar qui change l'interprétation des balises par le code
            $username = htmlspecialchars($_POST['username']);
            //test de la regex si elle est invalide
            if (!preg_match($regexUsername, $username)) {
                // Si le champ n'est pas valide, stocker dans le tableau le rapport d'érreur
                $formErrorConnect['username'] = 'Le champ usernamenyme est incorrect';
            }
            // verifie si le champs de nom et vide
            if (empty($username)) {
                //stocker dans le tableau le rapport d'érreur
                $formErrorConnect['username'] = 'Champ requis.';
            }
        }
        // meme chose pour le champ password
        if (isset($_POST['password'])) {
            $password = htmlspecialchars($_POST['password']);
            if (!preg_match($regexPasse, $password)) {
                $formErrorConnect['password'] = 'Le champ mot de passe est incorrect';
            }
            if (empty($password)) {
                $formErrorConnect['password'] = 'Champ requis.';
            }
        }
        // Test de connection
        if (count($formErrorConnect) == 0) {
            // Instenciation de la classe user
            $user = new user();
            $user->username = $username;
            // Appel de la méthode userConnection
            if ($user->userConnection()) {
                if (password_verify($password, $user->password)) {
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
                    $formErrorConnect['error'] = 'Mauvais nom de compte ou de mot de passe';
                }
            } else {
                $formErrorConnect['error'] = 'Erreur de connexion';
            }
        }
    };
?>