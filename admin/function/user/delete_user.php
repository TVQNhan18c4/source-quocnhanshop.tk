<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    //kiểu link 
    if(isset($_GET['id']) && (isset($_SESSION['type'])=="admin") ){

        $search = $_GET['seacrh'];
        $num= $_GET['num'];

        $id = $_GET['id'];
        if($id != $_SESSION['id_user']){
            delete_nguoidung($id);
            $_SESSION['toast'] = "xóa thành công";
        }else {
            $_SESSION['toast'] = "xóa không thành công";
        }

        header('location: ../../?page=user&search='.$search.'&num='.$num.'');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=user');
    }
    
?>