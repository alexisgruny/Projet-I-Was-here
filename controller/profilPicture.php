<?php
require('../model/database.php');
require('../model/picture.php');
require('../view/header.php');
require('../view/navbar.php');

if (isset($_POST['submit']) && isset($_FILES['profilePicture'])) {

    $upload = new picture();
    $target_file = "uploads/" . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifiez si le fichier est une image réelle ou une fausse image
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $formError['picture'] = 'erreur1';
        $uploadOk = 0;
    }

    // Autoriser certains formats de fichier
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $formError['picture'] = "Désolé, seuls les fichiers JPG, JPEG, PNG sont autorisés.";
        $uploadOk = 0;
    }

    // Limitez la taille du fichier (par exemple, à 500 Ko)
    if ($_FILES["profilePicture"]["size"] > 500000) {
        $formError['picture'] = 'erreur2';
        $uploadOk = 0;
    }

    // Vérifiez si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
        $formError['picture'] = 'erreur3';
        // Si tout est OK, essayez de télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
            $upload->target_file = $target_file;
            $upload->picture = $_FILES["profilePicture"];
            $upload->uploadPicture();
            echo "Le fichier " . htmlspecialchars(basename($_FILES["profilePicture"]["name"])) . " a été téléchargé.";
        } else {
            $formError['picture'] = 'erreur4';
        }
    }
}


require('../view/profilPictureForm.php');
require('../view/footer.php');
