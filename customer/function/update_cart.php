<?php
session_start();
include("../../config/config.php");
include("../../model/model.php");

    $id_user = $_SESSION['id_user'];
    $id_prod = $_GET['id'];
    $soluong = $_POST['soluong'];

    if($soluong<= 0){
        $soluong = 1;
    }

    $result = cart($id_user, $id_prod);
    $row = mysqli_fetch_assoc($result);
    $gia_sp = $row['gia'];
    $thanhtien = $gia_sp * $soluong;
    update_giohang($soluong, $thanhtien, $id_user, $id_prod);
    $_SESSION['toast'] = "cập nhất thành công";
    header('location: ../?page=cart');

?>