<?php
    session_start();
    include("./include/header.php");
    include("../model/model.php");


    if($_SESSION['type'] != "admin"){
        header('location: ../?page=404');
    }

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'wellcome':
                include("./view/wellcome.php");
                break;

            case 'brand':
                include("./view/admin_brand.php");
                break;
                
            case 'product':
                include("./view/admin_product.php");
                break;
            case 'product_detail':
                include("./view/admin_product_detail.php");
                break;

            case 'user':
                include("./view/admin_user.php");
                break;
                
            case 'order':
                include("./view/admin_order.php");
                break;
            case 'order_detail':
                include("./view/admin_order_detail.php");
                break;

            default:
                include("./view/wellcome.php");
                break;
        }
    }else{
        include("./view/wellcome.php");
    }

    include("./include/footer.php");

?>