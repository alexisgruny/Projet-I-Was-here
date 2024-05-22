<?php
require('../src/database.php');
require('../src/user.php');
require('../view/header.php');
require('../view/navbar.php');


// Déclaration des regex
$regexUsername = '/^[0-9A-z]+$/';
$regexPasse = '/^[0-9A-z]+$/';
$regexMail = '/^[A-z0-9._%+-]+[\@]{1}[A-z0-9.-]+[\.]{1}[A-z]{2,4}$/';
// Déclaration des tableaux d'érreur
$formErrorSignIn = array();

if (isset($_POST['signIn'])) {
    // Instanciation de la classe user
    $newUser = NEW user();
    $newUser->creationDate = date('Y/m/d');
   
    if (isset($_POST['usernameSignIn'])) {
        //déclarion de la variable usernameSignIn avec le htmlspecialchar qui change l'interprétation des balises par le code
        $newUser->username = htmlspecialchars($_POST['usernameSignIn']);
        //test de la regex si elle est invalide
        if (!preg_match($regexUsername, $newUser->username)) {
            // Si le champ n'est pas valide, stocker dans le tableau le rapport d'érreur
            $formErrorSignIn['usernameSignIn'] = 'Le champ username est incorrect';
        }
        // verifie si le champs usernameSignIn et vide
        if (empty($newUser->username)) {
            //stocker dans le tableau le rapport d'érreur
            $formErrorSignIn['usernameSignIn'] = 'Champ requis.';
        }
    }
    
    // meme chose pour password
    if(!empty($_POST['passwordSignIn']) && !empty($_POST['passwordConfirm']) && $_POST['passwordSignIn'] === $_POST['passwordConfirm']) {
        $newUser->password = htmlspecialchars($_POST['passwordSignIn']);
        if (!preg_match($regexPasse, $newUser->password)) {
            $formErrorSignIn['passwordSignIn'] = 'Le champ mot de passe est incorrect';
        }
        $newUser->password =  password_hash($_POST['passwordSignIn'], PASSWORD_DEFAULT);
    }
    if (empty($_POST['passwordSignIn'])) {
        $formErrorSignIn['passwordSignIn'] = 'Champ requis.';
    }
    if (empty($_POST['passwordConfirm'])) {
        $formErrorSignIn['passwordConfirm'] = 'Champ requis.';
    }

    // meme chose pour email
    if (isset($_POST['email'])) {
        $newUser->email = htmlspecialchars($_POST['email']);
        if (!FILTER_VAR($newUser->email, FILTER_VALIDATE_EMAIL)) {
            $formErrorSignIn['email'] = 'Le champ email est incorrect.';
        }
        if (empty($newUser->email)) {
            $formErrorSignIn['email'] = 'Champ requis.';
        }
    }
    // Test si l'utilisateur n'existe pas déja
    if (count($formErrorSignIn) == 0) {
        $check = $newUser->checkIfUserExist();
        if ($check == '0') {
            if (!$newUser->newUser()) {
                $formErrorSignIn['submit'] = 'Il y a eu un problème';
            }
        } else if ($check === FALSE) {
            $formErrorSignIn['submit'] = 'Il y a eu un problème';
        } else {
            $formErrorSignIn['submit'] = 'Ce profile existe déja';
        }
    }
    var_dump($formErrorSignIn);
    var_dump($newUser);
}

require('../view/SignInForm.php');
?>