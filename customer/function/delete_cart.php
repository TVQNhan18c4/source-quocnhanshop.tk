<?php
    session_start();
    include("../../config/config.php");
    include("../../model/model.php");
    $id_user = $_SESSION['id_user'];
    $id_prod = $_GET['id'];
    delete_spgiohang($id_user, $id_prod);
    $_SESSION['toast'] = "xóa thành công";
    header('location: ../?page=cart');
?>