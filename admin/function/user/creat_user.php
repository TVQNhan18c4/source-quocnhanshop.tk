<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    $name=$pass=$type="";

    if(isset($_POST['sbm']) && (isset($_SESSION['type'])=="admin") ){
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $type = $_POST['type'];

        if($name!="" and $pass!="" and $type!=""){

            $sql_check = "SELECT `ten` FROM `nguoidung` WHERE `ten` = '$name'";
            $result_check = mysqli_query($conn, $sql_check);
            $rows = mysqli_num_rows($result_check);
            
            if($rows == 0 ){
                insert_nguoidung($name,$pass,$type);
                $_SESSION['toast'] = "thêm thành công";
            }else {
                $_SESSION['toast'] = "thêm không thành công";
            }

        }

        header('location: ../../?page=user');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=user');
    }
?>