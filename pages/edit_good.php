<section class="auth">
    <div class="container">
        <div class="editGood">
            <?editGood($db,$_GET['id'])?>
            <? $query = selectGood($db,$_GET['id'])?>
            <? $result = mysqli_fetch_array($query)?>
            <div class="object">
                <div class="img">
                <img src="img/<?= $result['photo']?>" alt="">
                </div>
                <div class="form">
                    <form action="" method="POST" enctype="multipart/form-data">        
                        <div class="item">
                            <input required placeholder="Название товара" type="text" name="name" value="<?=$result['name']?>" class="form-control">
                        </div>
                        <div class="item">
                            <input required type="number" name="price" placeholder="Цена" value="<?=$result['price']?>" class="form-control">
                        </div>
                        <div class="item">
                            <input required type="number" name="quan" placeholder="Количество" value="<?=$result['quan']?>" class="form-control">
                        </div>
                        <div class="item">
                            <h5>Добавьте изображение товара</h5>
                            <input class="form-control" type="file" name="file">
                        </div>
                        <button type="submit" name="editGood" class="btn btn-primary">Изменить</button>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</section>