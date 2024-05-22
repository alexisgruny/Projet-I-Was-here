<?php
//Déclaration de la classe user qui utilise la classe database
class user extends database
{

    // Liste des attributs
    public $id;
    public $username;
    public $password;
    public $email;
    public $creationDate;

    public function newUser()
    {
        //Déclaration de la requête SQL qui permet de stocker les données d'inscription dans la base de donnée
        $request = 'INSERT INTO `user` (`username`, `password`, `email`, `creationDate`) '
            . 'VALUES ( :username, :password, :email, :creationDate)';
        // Préparation de la requête SQL pour éviter les injections SQL
        $newUser = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $newUser->bindValue(':username', $this->username, PDO::PARAM_STR);
        $newUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $newUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $newUser->bindValue(':creationDate', $this->creationDate, PDO::PARAM_STR);
        // Si la requête c'est éxécuté on termine la fonction 
        if ($newUser->execute()) {
            return;
            echo 'execute';
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formErrorSignIn['execute'] = 'une erreur dans le processus d\'inscription';
        }
    }

    public function checkIfUserExist()
    {
        $request = 'SELECT COUNT(`id`) AS `count` FROM `user`'
            . ' WHERE `username` = :username OR `email` = :email';
        $check = $this->db->prepare($request);
        $check->bindValue(':username', $this->username, PDO::PARAM_STR);
        $check->bindValue(':email', $this->email, PDO::PARAM_STR);
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

    public function showUser()
    {
        $request = 'SELECT `user`.`id`, `user`.`username`, `user`.`email` '
            . 'FROM `user` ';
        $showUser = $this->db->prepare($request);
        if ($showUser->execute()) {
            return $showUser->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function userById()
    {
        $request = 'SELECT `user`.`id`, `user`.`username`, `user`.`email`, `user`.`password` '
            . 'FROM `user` '
            . 'WHERE `user`.`id` = :id ';
        $userId = $this->db->prepare($request);
        $userId->bindValue(':id', $this->id, PDO::PARAM_INT);
        $userId->execute();
        if (is_object($userId)) {
            // Stocke la requête dans $userId / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $userId->fetch(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    public function userConnection()
    {
        $state = false;
        $request = 'SELECT `user`.`id`, `user`.`username`, `user`.`password`, `user`.`email` '
            . 'FROM `user` '
            . 'WHERE `user`.`username` = :username';
        $result = $this->db->prepare($request);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            //On vérifie que l'on a bien trouvé un utilisateur
            if (is_object($selectResult)) {
                // On hydrate
                $this->username = $selectResult->username;
                $this->password = $selectResult->password;
                $this->email = $selectResult->email;
                $this->id = $selectResult->id;
                $state = true;
            }
        }
        return $state;
    }
}
