<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    if(isset($_GET['id']) && (isset($_SESSION['type'])=="admin") ){
        
        $search = $_GET['seacrh'];
        $num= $_GET['num'];

        $id = $_GET['id'];
        delete_thuonghieu($id);
        $_SESSION['toast'] = "xóa thành công";
        header('location: ../../?page=brand&search='.$search.'&num='.$num.'');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=brand');
    }


?>