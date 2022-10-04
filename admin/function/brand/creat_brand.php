<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");
    if(isset($_POST['sbm']) && (isset($_SESSION['type'])=="admin") ){
        $name = $_POST['name'];
        $sql_check = "SELECT `ten` FROM `thuonghieu` WHERE `ten` = '$name'";
        $result_check = mysqli_query($conn, $sql_check);
        $rows = mysqli_num_rows($result_check);

        if($name!="" and $rows==0 ){
            insert_thuonghieu($name);
            $_SESSION['toast'] = "thêm thành công";
        }else {
            $_SESSION['toast'] = "thêm không thành công";
        }
        header('location: ../../?page=brand');
    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=brand');
    }
?> 