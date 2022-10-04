<?php
//tìm kiếm sản phẩm theo tên hoặc thương hiệu  
$search=$num="";

$amount = 5; // số lượng 1 trang
$slsp = numberRow_order($search); // tổng số sản phẩm
$sotrang = ceil($slsp/$amount); //số trang

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

$order = order_onepage($search,$num,$amount);




?>