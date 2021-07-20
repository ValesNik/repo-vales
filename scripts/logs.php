<?php
    function allLogs($db){
        $sql = "SELECT * from logs";
        $query = mysqli_query($db,$sql);
        return $query;
    }

    function myLogs($db){
        $login = $_SESSION['login'];
        $sql = "SELECT * from `logs` WHERE `name_user` = '$login'";
        $query = mysqli_query($db,$sql);
        return $query;
    }

    function sumTotal($db){
        $sql = "SELECT sumtotal() AS sumt";
        $query = mysqli_query($db,$sql);
        $result = mysqli_fetch_array($query);
        return $result['sumt'];
    }
?>