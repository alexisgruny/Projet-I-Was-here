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
    public $role;
    public $profilPicture;
    public $profilDescription;

    public function newUser()
    {
        //Déclaration de la requête SQL qui permet de stocker les données d'inscription dans la base de donnée
        $request = 'INSERT INTO `users` (`username`, `password`, `email`, `creationDateUser`, `idRole`) '
            . 'VALUES ( :username, :password, :email, :creationDate, :role)';
        // Préparation de la requête SQL pour éviter les injections SQL
        $newUser = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $newUser->bindValue(':username', $this->username, PDO::PARAM_STR);
        $newUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $newUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        $newUser->bindValue(':creationDate', $this->creationDate, PDO::PARAM_STR);
        $newUser->bindValue(':role', $this->role, PDO::PARAM_STR);
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
        $request = 'SELECT COUNT(`idUser`) AS `count` FROM `users`'
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
        $request = 'SELECT `users`.`idUser`, `users`.`username`, `users`.`email` '
            . 'FROM `user` ';
        $showUser = $this->db->prepare($request);
        if ($showUser->execute()) {
            return $showUser->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function userById()
    {
        $request = 'SELECT `users`.`idUser`, `users`.`username`, `users`.`email`, `users`.`password` '
            . 'FROM `users` '
            . 'WHERE `users`.`idUser` = :id ';
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
        $request = 'SELECT `users`.`idUser`, `users`.`username`, `users`.`password`, `users`.`email`, `users`.`profilPicture`, `users`.`profilDescription`  '
            . 'FROM `users` '
            . 'WHERE `users`.`username` = :username';
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
                $this->id = $selectResult->idUser;
                $this->profilPicture = $selectResult->profilPicture;
                $this->profilDescription = $selectResult->profilDescription;
                $state = true;
            }
        }
        return $state;
    }

    public function modifyUser()
    {
        //Déclaration de la requête SQL qui permet de modifier un utilisateur
        $request = 'UPDATE `users` '
            . 'SET `username` = :username, `password` = :password, `email` = :email '
            . 'WHERE `idUser` = :id ';
        // Prépare la requéte SQL pour éviter les injections 
        $modifyUser = $this->db->prepare($request);
        // Remplacement des marqueurs nominatif
        $modifyUser->bindValue(':username', $this->username);
        $modifyUser->bindValue(':password', $this->password);
        $modifyUser->bindValue(':email', $this->email);
        $modifyUser->bindValue(':id', $this->id);
        // Execution de la requête 
        if ($modifyUser->execute()) {
            return;
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formErrorModify['modify'] = 'une erreur dans le processus de modification';
        }
    }

    public function userDelete()
    {
        // Prépare la requête SQL qui permet de supprimer un utilisateur
        $deleteUser = $this->db->prepare('DELETE FROM `users` WHERE `idUser` = :id');
        // Remplacement des marqueurs nominatif
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Execute la requête 
        $deleteUser->execute();
        return $deleteUser;
    }

    public function modifyDescription()
    {
        $request = 'UPDATE `users` '
            . 'SET `profilDescription` = :profilDescription '
            . 'WHERE `idUser` = :id ';
        $modifyDescription = $this->db->prepare($request);
        $modifyDescription->bindValue(':id', $this->id);
        $modifyDescription->bindValue(':profilDescription', $this->profilDescription);
        if ($modifyDescription->execute()) {
            $_SESSION['profilDescription'] = $this->profilDescription;
            return;
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formErrorModify['modifyDescription'] = 'une erreur dans le processus de modification';
        }
    }

    public function deleteDescription()
    {
        $deleteDescritpion = $this->db->prepare('DELETE `profilDescription` FROM `users` WHERE `idUser` = :id');
        $deleteDescritpion->bindValue(':id', $this->id, PDO::PARAM_INT);
        $deleteDescritpion->execute();
        return $deleteDescritpion;
    }

    function uploadPicture()
    {
        $request = 'UPDATE `users` '
            . 'SET `profilPicture` = :profilPicture '
            . 'WHERE `idUser` = :id ';
        $uploadPicture = $this->db->prepare($request);
        $uploadPicture->bindValue(':profilPicture', $this->profilPicture, PDO::PARAM_STR);
        $uploadPicture->bindValue(':id', $this->id, PDO::PARAM_STR);
        if ($uploadPicture->execute()) {
            $_SESSION['profilPicture'] = $this->profilPicture;
            echo 'execute';
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formErrorSignIn['execute'] = 'une erreur dans le processus d\'inscription';
        }
    }
}
