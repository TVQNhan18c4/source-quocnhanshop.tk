<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    $name=$pass=$type="";

    if(isset($_POST['sbm']) && (isset($_SESSION['type'])=="admin")){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $type = $_POST['type'];

        if($name!="" and $pass!="" and $type!=""){

            $search = $_GET['seacrh'];
            $num= $_GET['num'];

            $sql_check = "SELECT `ten` FROM `nguoidung` WHERE `ten` = '$name'";
            $result_check = mysqli_query($conn, $sql_check);
            $rows = mysqli_num_rows($result_check);
            
            if($rows == 0 or  $rows == 1){
                update_nguoidung($id,$name,$pass,$type);
                $_SESSION['toast'] = "cập nhật thành công";
            }

        }else{
            $_SESSION['toast'] = "cập nhật không thành công";
        }

        header('location: ../../?page=user&search='.$search.'&num='.$num.'');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=user');
    }
?>