<?php
    function addGood($db){
        if(isset($_POST['addGood'])){
            print_r($_FILES);
            if(isset($_FILES)&& isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quan'])){
                $file_name = htmlspecialchars(trim($_FILES['file']['name']));
                $name = htmlspecialchars(trim($_POST['name']));
                $price = htmlspecialchars(trim($_POST['price']));
                $quan = htmlspecialchars(trim($_POST['quan']));
                move_uploaded_file($_FILES['file']['tmp_name'],"img/".$file_name);
                $sql = "INSERT INTO `goods` (`photo`,`name`,`price`,`quan`) VALUES ('$file_name','$name', '$price','$quan')";
                $query = mysqli_query($db,$sql);
                if($query){
                    echo "<p>Товар добавлен успешно</p>";
                }else{
                    echo "<p>Не удалось добавить товар!</p>";
                }
            }
        }
    }
    
    function allGoods($db){
        $sql = "SELECT * FROM goods";
        $query = mysqli_query($db,$sql);
        return $query;
    }

    function selectGood($db,$id){
        $sql = "SELECT * FROM `goods` WHERE `id` = $id";
        $query = mysqli_query($db,$sql);
        return $query;
    }


    function buyGood($db,$id){
        if(isset($_POST['buy'])){
            if(isset($_POST['quan']) && $_POST['quan']>0){
                $login = $_SESSION['login'];
                $quan = htmlspecialchars(trim($_POST['quan']));
                $sqlcheck = "SELECT * FROM `goods` WHERE `id`='$id'";
                $query = mysqli_query($db,$sqlcheck);
                $result = mysqli_fetch_array($query);
                $sqlcheck1 = "SELECT * FROM `users` WHERE `login`='$login'";
                $query1 = mysqli_query($db,$sqlcheck1);
                $result1 = mysqli_fetch_array($query1);
                if(($result['quan']>=$quan) && (($result['price']*$quan)<=$result1['money'])){
                    $nameUser = $result1['login'];
                    $nameGood  = $result['name'];
                    $price = $result['price'];
                    $total = $price * $quan;
                    $money = $result1['money'] - $price*$quan;

                    $sql = "INSERT INTO `logs` (`name_goods`, `name_user`, `price`, `quan`, `total`) VALUE ('$nameGood', '$nameUser', '$price', '$quan', '$total')";
                    $query = mysqli_query($db,$sql);

                    $quan = $result['quan'] - $quan;

                    $sql= "UPDATE `goods` SET `quan`='$quan' WHERE `id`='$id'";
                    $query = mysqli_query($db,$sql);
                   
                    $sql= "UPDATE `users` SET `money`='$money' WHERE `login`='$login'";
                    $query = mysqli_query($db,$sql);

                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    function deleteGood($db,$id){
        if(isset($_POST['deleteGood'])){
            $sql = "DELETE FROM `goods` WHERE `id` = $id";
            $query = mysqli_query($db,$sql);
        }
    }

    function editGood($db,$id){
        if(isset($_POST['editGood'])){
            if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quan'])){
                $name = htmlspecialchars(trim($_POST['name']));
                $price = htmlspecialchars(trim($_POST['price']));
                $quan = htmlspecialchars(trim($_POST['quan']));
                $sql = "UPDATE `goods` SET `name`='$name',`price`='$price',`quan`='$quan' WHERE `id`='$id'";
                $query = mysqli_query($db,$sql);
            }
            if(!empty($_FILES['file']['tmp_name'])){
                $file_name = htmlspecialchars(trim($_FILES['file']['name']));
                move_uploaded_file($_FILES['file']['tmp_name'],"img/".$file_name);
                $sql = "UPDATE `goods` SET `photo`='$file_name' WHERE `id`='$id'";
                $query = mysqli_query($db,$sql);
            }
        }
    }

?>