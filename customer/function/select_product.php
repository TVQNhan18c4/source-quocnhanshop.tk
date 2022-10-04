<?php
//tìm kiếm sản phẩm theo tên hoặc thương hiệu  
$id_thuonghieu=$search=$num="";
if(isset($_GET['brand'])){
    $id_thuonghieu=$_GET['brand'];
}
if(isset($_GET['search'])){
    $search=$_GET['search'];
}

//trang
if(isset($_GET['num'])){
    $num=(int)$_GET['num'];
    if($num<1){
        $num = 1;
    }
}else{
    $num=1;
}
////////////////////////////////////////////
$amount = 12;
$product = product_onepage($id_thuonghieu,$search,$num,$amount); // đưa ra 12 sp 1 trang

$slsp = numberRow_product($id_thuonghieu,$search); // tổng số sản phẩm

$sotrang = ceil($slsp/12); //số trang (12 sp 1 trang)

?>