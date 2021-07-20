<?php
    function authUser($db){
        if(isset($_POST['auth'])){
            if (isset($_POST['login']) && isset($_POST['pass'])){   
                $login = htmlspecialchars(trim($_POST['login']));
                $pass = htmlspecialchars(trim($_POST['pass']));
                $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'";
                $query = mysqli_query($db, $sql);
                $row = mysqli_num_rows($query);
                if ($row == 1){
                    $result = mysqli_fetch_array($query);
                    $_SESSION['login'] = $login;
                    $_SESSION['role'] = $result['role'];
                    header('Location: /');     
                }
            
            }
        }
    }

    function regUser($db){
        if(isset($_POST['regUser'])){
            if(isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['name']) && isset($_POST['address'])){
                $login = htmlspecialchars(trim($_POST['login']));
                $pass = htmlspecialchars(trim($_POST['pass']));
                $name = htmlspecialchars(trim($_POST['name']));
                $address = htmlspecialchars(trim($_POST['address']));
                $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
                $query = mysqli_query($db, $sql);
                $row = mysqli_num_rows($query);
                if($row > 0){
                    echo "<p>Данный логин уже используется</p>";
                }else{
                    $sql2 = "INSERT INTO `users` (`login`,`pass`,`name`,`address`,`role`,`money`) VALUES ('$login','$pass','$name','$address','user','0')";
                    $query2 = mysqli_query($db, $sql2);
                    $_SESSION['login'] = $login;
                    $_SESSION['role'] = 'user';  
                    header('Location: ?dir=user');
                }
            }
        }
    }

    function regAdmin($db){
        if(isset($_POST['regAdmin'])){
            if(isset($_POST['login']) && isset($_POST['pass'])){
                $login = htmlspecialchars(trim($_POST['login']));
                $pass = htmlspecialchars(trim($_POST['pass']));
                $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
                $query = mysqli_query($db, $sql);
                $row = mysqli_num_rows($query);
                if($row > 0){
                    echo "<p>Данный логин уже используется</p>";
                }else{
                    $sql2 = "INSERT INTO `users` (`login`,`pass`,`name`,`address`,`role`,`money`) VALUES ('$login','$pass','admin','Vales Corp','admin','0')";
                    $query2 = mysqli_query($db, $sql2);
                    $_SESSION['login'] = $login;
                    $_SESSION['role'] = 'admin';  
                    header('Location: ?dir=admin');
                }
            }
        }
    }

    function ses_destroy(){
        if(isset($_POST['exit'])){
            $_SESSION = [];
            $_POST = null;
            $_FILES = [];
            session_destroy();
            header('Location: ?dir=auth');
        }
    }


    function addMoney($db){
        if(isset($_POST['addMoney']) && $_POST['money']>=0){
            $money =  htmlspecialchars(trim($_POST['money']));
            $login = $_SESSION['login'];
            $sql =  "SELECT * FROM `users` WHERE `login` = '$login'";
            $query = mysqli_query($db, $sql);
            $result = mysqli_fetch_array($query);
            $money = $money + $result['money'];
            $sql =  "UPDATE `users` SET `money`= $money WHERE `login`='$login'";
            $query = mysqli_query($db, $sql);
        }
    }

    function selectUser($db){
        $login = $_SESSION['login'];
        $sql = "SELECT * FROM `users` WHERE `login`='$login'";
        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_array($query);
        return $result;
    }
?>