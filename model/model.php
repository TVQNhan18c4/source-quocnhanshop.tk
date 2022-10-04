<?php
// truy vấn select bang du lieu
function table($table_name) {
    global $conn;
    $sql = "SELECT * FROM $table_name ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function row_table($table_name, $id) { //1 du lieu theo id(pk)
    global $conn;
    $sql = "SELECT * FROM $table_name WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function brand_onepage($search,$num,$amount) {
    global $conn;
    if($num==""){
        $num = 1;
    }
    $num=($num-1)*$amount; 
    $sql = "SELECT * FROM `thuonghieu` WHERE 1";
    if($search != ""){
        $sql.=" and ten like '%".$search."%'";
    }
    $sql.=" ORDER BY id DESC";
    $sql.=" LIMIT $num,$amount";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function user_onepage($search,$num,$amount) {
    global $conn;
    if($num==""){
        $num = 1;
    }
    $num=($num-1)*$amount; 
    $sql = "SELECT * FROM `nguoidung` WHERE 1";
    if($search != ""){
        $sql.=" and ten like '%".$search."%'";
    }
    $sql.=" ORDER BY id DESC";
    $sql.=" LIMIT $num,$amount";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function order_onepage($search,$num,$amount) {
    global $conn;
    if($num==""){
        $num = 1;
    }
    $num=($num-1)*$amount; 
    $sql = "SELECT * FROM `donhang` WHERE 1";
    if($search != ""){
        $sql.=" and nguoinhan like '%".$search."%'";
    }
    $sql.=" ORDER BY id DESC";
    $sql.=" LIMIT $num,$amount";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function product_onepage($id_thuonghieu,$search,$num,$amount, $orderby="") {
    global $conn;
    if($num==""){
        $num = 1;
    }
    $num=($num-1)*$amount; 
    $sql = "SELECT * FROM `sanpham` WHERE 1";
    if($search != ""){
        $sql.=" and ten like '%".$search."%'";
    }
    if($id_thuonghieu !=""){
        $sql.=" and id_thuonghieu like '".$id_thuonghieu."'";
    }
    if($orderby == "id"){
        $sql.=" ORDER BY id DESC";
    }else{
        $sql.=" ORDER BY gia DESC"; //sắp theo giá giảm dần
    }
    $sql.=" LIMIT $num,$amount";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function brand($search) {
    global $conn;
    $sql = "SELECT * FROM `thuonghieu` WHERE 1";
    if($search != ""){
        $sql.=" and ten like '%".$search."%'";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function user($search) {
    global $conn;
    $sql = "SELECT * FROM `nguoidung` WHERE 1";
    if($search != ""){
        $sql.=" and ten like '%".$search."%'";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function admin_order($search) {
    global $conn;
    $sql = "SELECT * FROM `donhang` WHERE 1";
    if($search != ""){
        $sql.=" and nguoinhan like '%".$search."%'";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function product($id_thuonghieu,$search) { //lấy thông tin sp theo thương hiệu, thông tin tìm
    global $conn;
    $sql = "SELECT * FROM `sanpham` WHERE 1";
    if($search != ""){
        $sql.=" and ten like '%".$search."%'";
    }
    if($id_thuonghieu !=""){
        $sql.=" and id_thuonghieu like '".$id_thuonghieu."'";
    }
    $result = mysqli_query($conn, $sql);
    return $result;
}

function product_tt($id_sp, $id_thuonghieu) { //sản phẩm tương tự (cùng thương hiệu)
    global $conn;
    $sql = "SELECT * FROM `sanpham` WHERE id NOT LIKE '$id_sp' AND id_thuonghieu = $id_thuonghieu ORDER BY RAND() limit 4";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function cart($id_nguoidung, $id_sp) { //lấy thông tin giỏ hàng theo id_sp và id_nguoidung
    global $conn;
    $sql = "SELECT * FROM giohang WHERE id_nguoidung = $id_nguoidung AND id_sp = $id_sp";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function cart_user($id_nguoidung) { //lấy thông tin giỏ hàng theo id_nguoidung
    global $conn;
    $sql = "SELECT * FROM giohang WHERE id_nguoidung = $id_nguoidung";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

function order($id_nguoidung) { //lấy thông tin đơn hàng theo id_nguoidung
    global $conn;
    $sql = "SELECT * FROM `donhang` WHERE id_nguoidung = '$id_nguoidung' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function row_order($id_nguoidung) { //lấy 1 thông tin mới nhất của dơn hàng theo id_nguoidung
    global $conn;
    $sql = "SELECT * FROM `donhang` WHERE id_nguoidung = '$id_nguoidung' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    return $result;
}

function orderDetail($id_donhang) { //lấy thông tin chi tiêt don dơn hàng theo id_donhang
    global $conn;
    $sql = "SELECT * FROM `chitiet_donhang` WHERE id_donhang = '$id_donhang'";
    $result = mysqli_query($conn, $sql);
    return $result;
}

//đếm số lượng hàng của bảng
function numberRow_table($table_name){
    $result = table($table_name);
    $rows = mysqli_num_rows($result);
    return $rows;
}

function numberRow_brand($search){
    $result = brand($search);
    $rows = mysqli_num_rows($result);
    return $rows;
}

function numberRow_user($search){
    $result = user($search);
    $rows = mysqli_num_rows($result);
    return $rows;
}

function numberRow_order($search){
    $result = admin_order($search);
    $rows = mysqli_num_rows($result);
    return $rows;
}

function numberRow_product($id_thuonghieu,$search){
    $result = product($id_thuonghieu,$search);
    $rows = mysqli_num_rows($result);
    return $rows;
}



//truy vấn insert vào bảng:
function insert_thuonghieu($ten_thuonghieu){
    global $conn;
    $sql = "INSERT INTO thuonghieu (`ten`) VALUES ('$ten_thuonghieu')";
    $result = mysqli_query($conn, $sql);
}

function insert_nguoidung($ten,$matkhau,$loai){
    global $conn;
    $sql = "INSERT INTO `nguoidung`(`ten`, `matkhau`, `loai`) VALUES ('$ten','$matkhau','$loai')";
    $result = mysqli_query($conn, $sql);
}

function insert_sanpham($anh, $ten, $gia, $manghinh, $hedieuhanh, $camera_truoc, $camera_sau, $chip, $ram, $rom, $sim, $pin_sac, $id_thuonghieu){
    global $conn;

    $sql = "INSERT INTO `sanpham`(`anh`, `ten`, `gia`, `manghinh`, `hedieuhanh`, `camera_truoc`, `camera_sau`, `chip`, `ram`, `rom`, `sim`, `pin_sac`, `id_thuonghieu`) VALUES ('$anh', '$ten', '$gia', '$manghinh', '$hedieuhanh', '$camera_truoc', '$camera_sau', '$chip', '$ram', '$rom', '$sim', '$pin_sac', '$id_thuonghieu')";
    $result = mysqli_query($conn, $sql);
}

function insert_giohang($ten_sp, $anh, $gia, $soluong, $thanhtien, $id_nguoidung, $id_sp){
    global $conn;
    $sql = "INSERT INTO `giohang`(`ten_sp`, `anh`, `gia`, `soluong`, `thanhtien`, `id_nguoidung`, `id_sp`) VALUES ('$ten_sp', '$anh', '$gia', '$soluong', '$thanhtien', '$id_nguoidung', '$id_sp')";
    $result = mysqli_query($conn, $sql);
}

function insert_donhang($nguoinhan, $sdt, $diachi, $tongtien, $trangthai, $ngaydat, $id_nguoidung){
    global $conn;
    $sql = "INSERT INTO `donhang`(`nguoinhan`, `sdt`, `diachi`, `tongtien`, `trangthai`, `ngaydat`, `id_nguoidung`) VALUES ('$nguoinhan', '$sdt', '$diachi', '$tongtien', '$trangthai', '$ngaydat', '$id_nguoidung')";
    $result = mysqli_query($conn, $sql);
}

function insert_chitietdon($ten_sp,$anh,$dongia,$soluong,$thanhtien,$id_donhang,$id_nguoidung){
    global $conn;
    $sql = "INSERT INTO `chitiet_donhang`(`ten_sp`, `anh`, `dongia`, `soluong`, `thanhtien`, `id_donhang`, `id_nguoidung`) VALUES ('$ten_sp', '$anh','$dongia','$soluong','$thanhtien','$id_donhang','$id_nguoidung')";
    $result = mysqli_query($conn, $sql);
}

//truy vấn delete hàng trong bảnng
function delete_thuonghieu($id_thuonghieu){
    global $conn;
    //xóa các sản phẩm của thương hiệu
    $sql_sp = "DELETE FROM sanpham WHERE id_thuonghieu = $id_thuonghieu";
    $result_sp = mysqli_query($conn, $sql_sp);
    //xóa thương hiệu
    $sql = "DELETE FROM thuonghieu WHERE id = $id_thuonghieu";
    $result = mysqli_query($conn, $sql);
}

function delete_nguoidung($id_nguoidung){
    global $conn;
    //xóa giỏ hàng
    $sql = "DELETE FROM giohang WHERE id_nguoidung = $id_nguoidung";
    $result = mysqli_query($conn, $sql);
    //xóa chi tiết đơn hàng
    $sql = "DELETE FROM chitiet_donhang WHERE id_nguoidung = $id_nguoidung";
    $result = mysqli_query($conn, $sql);
    //xóa đơn hàng
    $sql = "DELETE FROM donhang WHERE id_nguoidung = $id_nguoidung";
    $result = mysqli_query($conn, $sql);
    //xóa người dùng
    $sql = "DELETE FROM nguoidung WHERE id = $id_nguoidung";
    $result = mysqli_query($conn, $sql);
}

function delete_sanpham($id_sanpham){
    global $conn;
    //xóa sp trong giỏ hàng
    $sql = "DELETE FROM giohang WHERE id_sp = $id_sanpham";
    $result = mysqli_query($conn, $sql);
    //xóa sản phẩm
    $sql = "DELETE FROM sanpham WHERE id = $id_sanpham";
    $result = mysqli_query($conn, $sql);
}

function delete_spgiohang($id_nguoidung, $id_sanpham){
    global $conn;
    $sql = "DELETE FROM giohang WHERE id_nguoidung = $id_nguoidung AND id_sp = $id_sanpham";
    $result = mysqli_query($conn, $sql);
}

function delete_giohang($id_nguoidung){
    global $conn;
    $sql = "DELETE FROM giohang WHERE id_nguoidung = $id_nguoidung";
    $result = mysqli_query($conn, $sql);
    echo $result;
    
}

function delete_donhang($id_donhang){
    global $conn;
    $sql = "DELETE FROM donhang WHERE id = $id_donhang";
    $result = mysqli_query($conn, $sql);
}

function delete_chitietdon($id_donhang){
    global $conn;
    $sql = "DELETE FROM chitiet_donhang WHERE id_donhang = $id_donhang";
    $result = mysqli_query($conn, $sql);
}


//truy vấn update
function update_giohang($soluong, $thanhtien, $id_nguoidung, $id_sp){//update so luong, thanh tien cua sp trong gio 
    global $conn;
    $sql = "UPDATE `giohang` SET `soluong`='$soluong',`thanhtien`='$thanhtien' WHERE `id_nguoidung`='$id_nguoidung' AND `id_sp`='$id_sp'";
    $result = mysqli_query($conn, $sql);
}

function update_thuonghieu($id, $name_brand){
    global $conn;
    $sql = "UPDATE `thuonghieu` SET `ten`='$name_brand' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
}

function update_nguoidung($id, $name, $pass, $type){//update so luong, thanh tien cua sp trong gio 
    global $conn;
    $sql = "UPDATE `nguoidung` SET `ten`='$name',`matkhau`='$pass',`loai`='$type' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
}

function update_sanpham($id,$anh, $ten, $gia, $manghinh, $hedieuhanh, $camera_truoc, $camera_sau, $chip, $ram, $rom, $sim, $pin_sac, $id_thuonghieu){
    global $conn;
    $sql = "UPDATE `sanpham` SET `anh`='$anh',`ten`='$ten',`gia`='$gia',`manghinh`='$manghinh',`hedieuhanh`='$hedieuhanh',`camera_truoc`='$camera_truoc',`camera_sau`='$camera_sau',`chip`=' $chip',`ram`='$ram',`rom`='$rom',`sim`='$sim',`pin_sac`='$pin_sac',`id_thuonghieu`='$id_thuonghieu' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
}

function update_donhang($id, $status){
    global $conn;
    $sql = "UPDATE `donhang` SET `trangthai`='$status' WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
}

?>