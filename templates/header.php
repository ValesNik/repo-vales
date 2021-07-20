<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <title>Vales Corp</title>
</head>
<body>
<header>
    <div class="container">
        <nav>
            <div class="menu">
                <a class="item btn" href="/">Главная</a>
                <a class="item btn" href="?dir=catalog">Каталог</a>
                <? if($_SESSION['role']==='admin'): ?>
                <a class="item btn" href="?dir=admin">Администрирование</a>
                <form class="form" action="" method="POST">
                    <button class="btn" name="exit" >Выход</button>
                </form>
                <? elseif($_SESSION['role']==='user'): ?>
                <a class="item btn" href="?dir=user">Личный кабинет</a>
                <form class="form" action="" method="POST">
                    <button class="btn" name="exit" >Выход</button>
                </form>
                <? else: ?>
                <a class="item btn" href="?dir=auth">Авторизация</a>
                <a class="item btn" href="?dir=reg">Регистрация</a>
                <? endif; ?>
            </div>
        </nav>
    </div>
</header>