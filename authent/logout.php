<?php 
    include("../config/config.php");
    include("../model/model.php");
    session_start();

    delete_giohang($_SESSION['id_user']);

    session_destroy();
    header('location: ../');
?>