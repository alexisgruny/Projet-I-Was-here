<form action="" method="post" enctype="multipart/form-data">
        <label for="profilePicture">Choisir une photo de profil :</label>
        <input type="file" name="profilePicture" id="profilePicture" required>
        <input type="submit" name="submit" value="Upload">
        <?php if (isset($formError['picture'])){
            echo $formError['picture'];
        } ?>
    </form>
</body>