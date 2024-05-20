<?php

class user extends database {

// Liste des attributs
    public $id;
    public $username;
    public $password;
    public $email;

    public function newUser() {
        //Déclaration de la requête SQL qui permet de stocker les données d'inscription dans la base de donnée
        $request = 'INSERT INTO `user` (`username`, `password`, `email`) '
                . 'VALUES ( :username, :password, :email)';
        // Préparation de la requête SQL pour éviter les injections SQL
        $newUser = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $newUser->bindValue(':username', $this->username, PDO::PARAM_STR);
        $newUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $newUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        // Si la requête c'est éxécuté on termine la fonction 
        if ($newUser->execute()) {
            return;
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formError['execute'] = 'une erreur dans le processus d\'inscription';
        }
    }

    public function checkIfUserExist() {
        //Déclaration de la requête SQL qui permet de vérifier si un utilisateur est déja présent ou non dans la base de donnée
        $request = 'SELECT COUNT(`id`) AS `count` FROM `user`'
                . ' WHERE `username` = :username OR `email` = :email';
        // Préparation de la requête SQL pour éviter les injections SQL
        $check = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $check->bindValue(':username', $this->username, PDO::PARAM_STR);
        $check->bindValue(':email', $this->email, PDO::PARAM_STR);
        // Si la requête c'est éxécuté , récupére un booléan 
        if ($check->execute()) {
            $result = $check->fetch(PDO::FETCH_OBJ);
            $bool = $result->count;
        } else {
            // si la requête ne s'éxécute pas , on déclare une variable et on lui donne la valeur False
            $bool = FALSE;
        }
        // Retourne bool et stop la fonction
        return $bool;
    }
}