<section class="add_goods">
    <div class="container">
        <h2>Добавить товар</h2>
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="item">
                    <input required placeholder="Название товара" type="text" name="name" class="form-control">
                </div>
                <div class="item">
                    <input required type="number" name="price" placeholder="Цена" class="form-control">
                </div>
                <div class="item">
                    <input required type="number" name="quan" placeholder="Количество" class="form-control">
                </div>
                <div class="item">
                    <h5>Добавьте изображение товара</h5>
                    <input required class="form-control" type="file" name="file">
                </div>
                <button type="submit" name="addGood" class="button">Добавить</button>
            </form>
            <?php addGood($db); ?>
        </div>
    </div>
</section>