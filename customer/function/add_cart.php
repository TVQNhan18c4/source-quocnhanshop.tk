<?php
session_start();
include("../../config/config.php");
include("../../model/model.php");
    $id_user = $_SESSION['id_user'];
    $id_prod = $_GET['id'];

    //kiem tra san pham co trong gio cua nguoi dung chua
    $check_cart = cart($id_user, $id_prod);
    var_dump($check_cart);
    $count_check_cart = mysqli_num_rows($check_cart);
    echo $count_check_cart;

    if($count_check_cart == 0){   //chưa có sp trong giỏ
        $table_name = "sanpham";
        $result = row_table($table_name, $id_prod);
        $row = mysqli_fetch_assoc($result);
        $ten_sp = $row['ten'];
        $anh_sp = $row['anh'];
        $gia_sp = $row['gia'];
        $soluong = 1;
        $thanhtien = $gia_sp * $soluong;
        insert_giohang($ten_sp, $anh_sp, $gia_sp, $soluong, $thanhtien, $id_user,$id_prod);
        echo "them vao gio";
        $_SESSION['amount'] += 1;
        $_SESSION['toast'] = "thêm thành công";
        header('location: ../?page=product&id='.$id_prod.'');
    }else{
        $row_check = mysqli_fetch_assoc($check_cart);
        $gia_sp = $row_check['gia'];
        $soluong = $row_check['soluong'] + 1;
        $thanhtien = $gia_sp * $soluong;
        update_giohang($soluong, $thanhtien, $id_user, $id_prod);
        echo "cap nhat gio";
        $_SESSION['amount'] += 1;
        $_SESSION['toast'] = "thêm thành công";
        header('location: ../?page=product&id='.$id_prod.'');
    }

?>