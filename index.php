<?php
    session_start();
    include("./config/config.php");
    include("./authent/include/header.php");
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        
        switch ($page) {

            case 'login':
                include("./authent/login.php");
                break;

            case 'register':
                include("./authent/register.php");
                break;

            case '404':
                include("./authent/404.php");
                break;

            default:
                include("./authent/login.php");
                break;
        }
    }else{
        include("./authent/login.php");
    }
?>