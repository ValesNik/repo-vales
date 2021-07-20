<section class="catalog mt-3">
    <div class="container">
        <div class="goods">
            <h2>Каталог товаров</h2>
            <?php $query = allGoods($db); ?>
            <?php while($result = mysqli_fetch_array($query)): ?>
                
                    <div class="card" style="">
                        <div class="img-box">
                        <a href="?dir=good&id=<?=$result['id']?>"><img src="img/<?=$result['photo']?>"></a>
                        </div>
                        <div class="card-body">
                        <h5 class="card-title">"<?= $result['name'] ?>"</h5>
                            <h6 class="card-title"><?= $result['price'] ?> руб.</h6>
                            <h6 class="card-title"><?= $result['quan'] ?> шт.</h6>
                        </div>
                    </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>