<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    if(isset($_POST['sbm']) && (isset($_SESSION['type'])=="admin") ){
        $search = $_GET['seacrh'];
        $num= $_GET['num'];

        $id = $_GET['id']; //id đơn
        $status = $_POST['status'];

        update_donhang($id, $status);

        $_SESSION['toast'] = "cập nhật thành công";

        header('location: ../../?page=order&search='.$search.'&num='.$num.'');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=order');
    }
?>