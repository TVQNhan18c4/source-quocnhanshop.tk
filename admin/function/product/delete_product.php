<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    if(isset($_GET['id']) && isset($_SESSION['id_user'])=="admin"){

        $search = $_GET['seacrh'];
        $num= $_GET['num'];

        $id = $_GET['id'];
        delete_sanpham($id);
        $_SESSION['toast'] = "xóa thành công";
        header('location: ../../?page=product&search='.$search.'&num='.$num.'');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=product');
    }

    
?>