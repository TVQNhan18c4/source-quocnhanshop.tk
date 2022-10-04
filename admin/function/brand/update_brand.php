<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");


    if(isset($_POST['sbm']) && (isset($_SESSION['type'])=="admin") ){
        $search = $_GET['seacrh'];
        $num= $_GET['num'];

        $id = $_POST['id'];
        $name = $_POST['name'];

        $sql_check = "SELECT `ten` FROM `thuonghieu` WHERE `ten` = '$name'";
        $result_check = mysqli_query($conn, $sql_check);
        $rows = mysqli_num_rows($result_check);

        if($name!="" and $rows==0 ){
            update_thuonghieu($id, $name);
            $_SESSION['toast'] = "cập nhật thành công";
        }else {
            $_SESSION['toast'] = "cập nhật không thành công";
        }
        header('location: ../../?page=brand&search='.$search.'&num='.$num.'');
    }else{
        echo "loi";
        header('location: ../../?page=brand');
    }
?> 