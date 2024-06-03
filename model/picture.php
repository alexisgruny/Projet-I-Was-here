<?php


class picture extends database
{
    public $target_file;
    public $profilPicture;
    function uploadPicture(){
        $request= "INSERT INTO users (:profilePicture) VALUES (':target')";
        $uploadPicture = $this->db->prepare($request);
        $uploadPicture->bindValue(':target', $this->target_file, PDO::PARAM_STR);
        $uploadPicture->bindValue(':profilPicture', $this->profilPicture, PDO::PARAM_STR);
        if ($uploadPicture->execute()) {
            return;
            echo 'execute';
        } else {
            // Si la requête ne c'est pas éxécuté on stock un message d'érreur dans le tableau d'érreur pour informer l'utilisateur
            $formErrorSignIn['execute'] = 'une erreur dans le processus d\'inscription';
        }
    }
}
?>