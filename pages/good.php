<section class="auth">
    <div class="container">
        <div class="selectGood">
            <?$check = buyGood($db,$_GET['id'])?>
            <? $query = selectGood($db,$_GET['id'])?>
            <? $result = mysqli_fetch_array($query)?>
            <div class="object">
                <div class="img">
                <img src="img/<?= $result['photo']?>" alt="">
                </div>
                <div class="info">
                    <h5 class="card-title"><?= $result['name'] ?></h5>
                    <h6 class="card-title">Цена: <?= $result['price'] ?> руб.</h6>
                    <h6 class="card-title">Количество: <?= $result['quan'] ?> шт.</h6>
                </div>    
            </div>
            <?if($_SESSION['role']==='user'):?>
                <div class="form">
                    <form action="" method="post">
                        <div class="item">
                            <input required type="number" name="quan" placeholder="Количество" class="form-control">
                        </div>
                        <button type="submit" name="buy" class="btn btn-primary">Купить</button>
                    </form>
                    <? if($check===true): ?>
                    <p>Товар куплен успешно</p>
                    <? elseif($check===false):?>
                    <p>Недостаточно товара на складе/Недостаточно денег на счете</p>
                    <?endif;?>
                <?elseif($_SESSION['role']==='admin'):?>  
                    <form action="" method="post">
                        <div class="item">
                            <a href="?dir=editGood&id=<?=$_GET['id']?>" class="btn">Изменить</a>
                        </div>
                        <button type="submit" name="deleteGood" class="btn btn-primary">Удалить товар</button>
                    </form>
                    <?deleteGood($db,$_GET['id'])?>
                </div>
            <?endif;?>
        </div>
    </div>
</section>