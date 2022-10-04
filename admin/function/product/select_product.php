<?php

$id_thuonghieu=$search=$num="";

//tìm kiếm sản phẩm theo tên

if(isset($_GET['search'])){
    $search=$_GET['search'];
}

$amount = 5; //số lượng 1 trang
$slsp = numberRow_product($id_thuonghieu,$search); // tổng số sản phẩm
$sotrang = ceil($slsp/$amount); //số trang
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


$product = product_onepage($id_thuonghieu,$search,$num,$amount,"id");



?>