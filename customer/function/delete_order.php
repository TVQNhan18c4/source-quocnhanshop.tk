<?php
session_start();
include("../../config/config.php");
include("../../model/model.php");

$id_donhang = $_GET['id'];

$sql = "SELECT * FROM `donhang` WHERE id = $id_donhang";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
var_dump($row);

//đơn đang ở trạng thái chờ xác nhận hoặc từ chối mới đc xóa 
if($row['trangthai'] == "chờ xác nhận" or $row['trangthai'] == "từ chối"){
    //xóa chi tiết đơn hàng
    delete_chitietdon($id_donhang);
    //xóa đơn hàng
    delete_donhang($id_donhang);

    $_SESSION['toast'] = "hủy đơn hàng thành công";
}else{
    $_SESSION['toast'] = "không thể hủy đơn hàng (đơn đã được xác nhận)";
}

header('location: ../?page=order');

?>