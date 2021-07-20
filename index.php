<?php
    include_once 'scripts/db.php';
    include_once 'scripts/user.php';
    include_once 'scripts/goods.php';
    include_once 'scripts/logs.php';

    session_start();
    authUser($db);
    ses_destroy();

    include_once 'templates/header.php';

    if(isset($_GET['dir'])){
        $dir = $_GET['dir'];

        switch($dir){
            case "admin":
                include_once 'pages/admin.php';
                break;
            case "auth":
                include_once 'pages/auth.php';
                break;
            case "catalog":
                include_once 'pages/catalog.php';
                break;
            case "good":
                include_once 'pages/good.php';
                break;
            case "reg":
                include_once 'pages/reg.php';
                break;
            case "user":
                include_once 'pages/user.php';
                break;
            case "editGood":
                include_once 'pages/edit_good.php';
                break;
            case "logs":
                include_once 'pages/logs.php';
                break;
            case "addGood":
                include_once 'pages/add_goods.php';
                break;
            default:
                include_once 'pages/main.php';
                break;
        }
    }else{
        include_once 'pages/main.php';
    }

    
    include_once 'templates/footer.php';
?>