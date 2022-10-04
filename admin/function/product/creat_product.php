<?php
    session_start();
    include("../../../config/config.php");
    include("../../../model/model.php");

    $img=$name=$price=$manghinh=$hedieuhanh=$camera_truoc=$camera_sau=$chip=$ram=$rom=$sim=$pin_sac="";

    if(isset($_POST['sbm']) && (isset($_SESSION['type'])=="admin") ){
        $img = $_FILES['anh']['name'];
        $img_tmp = $_FILES['anh']['tmp_name'];

        $name = $_POST['ten'];
        $price = $_POST['gia'];
        $manghinh = $_POST['manghinh'];
        $hedieuhanh = $_POST['hedieuhanh'];
        $camera_truoc = $_POST['cameratruoc'];
        $camera_sau = $_POST['camerasau'];
        $chip = $_POST['chip'];
        $ram = $_POST['ram'];
        $rom = $_POST['rom'];
        $sim = $_POST['sim'];
        $pin_sac = $_POST['pin_sac'];
        $id_thuonghieu = $_POST['id_thuonghieu'];

        if($img!="" and $name!="" and $price!="" and $manghinh!="" and $hedieuhanh!="" and $camera_truoc!="" and $camera_sau!="" and $chip!="" and $ram!="" and $rom!="" and $sim!="" and $pin_sac!=""){

            $sql_check = "SELECT `ten` FROM `sanpham` WHERE `ten` = '$name'";
            $result_check = mysqli_query($conn, $sql_check);
            $rows = mysqli_num_rows($result_check);
            var_dump($rows);
            if($rows == 0 ){
                insert_sanpham($img, $name, $price, $manghinh, $hedieuhanh, $camera_truoc, $camera_sau, $chip, $ram, $rom, $sim, $pin_sac, $id_thuonghieu);
                move_uploaded_file($img_tmp, '../../../img/product/'.$img);
                $_SESSION['toast'] = "thêm thành công";
            }else {
                $_SESSION['toast'] = "thêm không thành công";
            }

        }else {
            $_SESSION['toast'] = "thêm không thành công";
        }

        header('location: ../../?page=product');

    }else{
        $_SESSION['toast'] = "lỗi";
        header('location: ../../?page=product');
    }
?>

