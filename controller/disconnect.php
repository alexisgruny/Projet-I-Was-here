<?php 
//destruction de la session utilisateur 
    session_start();
    session_destroy();
    header('location: ../controller/logIn.php');
?>