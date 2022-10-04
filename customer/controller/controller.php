<?php
    session_start();
    include("./include/header.php");
    include("../model/model.php");


    if($_SESSION['type'] != "khach"){
        header('location: ../?page=404');
    }
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'home':
                include("./view/home.php");
                break;

            case 'product':
                include("./view/product.php");
                break;

            case 'cart':
                include("./view/cart.php");
                break;

            case 'order':
                include("./view/order.php");
                break;

            case 'order_detail':
                include("./view/order_detail.php");
                break;

            default:
                include("./view/home.php");
                break;
        }
    }else{
        include("./view/home.php");
    }


    include("./include/footer.php");
?>