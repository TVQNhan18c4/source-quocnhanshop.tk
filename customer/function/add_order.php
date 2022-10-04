<?php
session_start();
include("../../config/config.php");
include("../../model/model.php");
    
    if(isset($_POST['sbm'])){
        $nguoinhan = $_POST['nguoinhan'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $tongtien = $_POST['tongtien'];
        $trangthai = "chờ xác nhận";
        $ngaydat = date("Y-m-d");
        $id_nguoidung = $_SESSION['id_user'];

        //giỏ hàng chưa có sp -> chưa có tiền
        if($tongtien == 0 || $nguoinhan=="" || $sdt=="" || $diachi==""){
            $_SESSION['toast'] = "không thể đặt hàng";
            header('location: ../?page=cart');
        }else {
            //tạo đơn
            insert_donhang($nguoinhan, $sdt, $diachi, $tongtien, $trangthai, $ngaydat, $id_nguoidung);

            //lấy id mới tạo
            $query_id = row_order($id_nguoidung);
            $row_id = mysqli_fetch_assoc($query_id);
            $id_donhang = $row_id['id'];
    
            //thông tin giỏ hàng vào chi tiết đơn
            $giohang = cart_user($id_nguoidung);
    
            while ($row_giohang = mysqli_fetch_assoc($giohang)){
                $ten_sp = $row_giohang['ten_sp'];
                $anh = $row_giohang['anh'];
                $dongia = $row_giohang['gia'];
                $soluong = $row_giohang['soluong'];
                $thanhtien = $row_giohang['thanhtien']; 
                insert_chitietdon($ten_sp,$anh,$dongia,$soluong,$thanhtien,$id_donhang,$id_nguoidung);
            }
    
            //xóa giỏ hàng
            delete_giohang($id_nguoidung);

            $_SESSION['toast'] = "đặt hàng thành công";
    
            header('location: ../?page=order');
        }
        
    }else {
        header('location: ../?page=cart');
    }
?>