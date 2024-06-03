<?php
require('../model/database.php');
require('../model/user.php');
require('../view/header.php');
require('../view/navbar.php');

if (isset($_POST['submit']) && isset($_FILES['profilePicture'])) {

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $formError['picture'] = "Désolé, seuls les fichiers JPG, JPEG, PNG sont autorisés.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    // Si tout est OK, essayez de télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            echo "Le fichier ". htmlspecialchars(basename($_FILES["profile_picture"]["name"])) . " a été téléchargé.";
        } else {
            echo "Désolé, une erreur est survenue lors du téléchargement de votre fichier.";
        }
    }
}


require('../view/profilPictureForm.php');
require('../view/footer.php');
?>