<?php
//tìm kiếm sản phẩm theo tên hoặc thương hiệu  
$search=$num="";

$amount = 5; //so luong 1 trang
$slsp = numberRow_user($search); // tổng số sản phẩm
$sotrang = ceil($slsp/$amount); //số trang (chia lấy ngưỡng trên)

if(isset($_GET['search'])){
    $search=$_GET['search'];
}

//trang
if(isset($_GET['num'])){
    $num=(int)$_GET['num'];
    if($num > $sotrang){
        $num = $sotrang;
    }
}else{
    $num=1;
}
////////////////////////////////////////////

$user = user_onepage($search,$num,$amount);

?>