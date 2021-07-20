<section class="auth">
    <div class="container">
        <div class="selectUser">
            <?addMoney($db)?>
            <?$result = selectUser($db)?>
            <div class="info">
                <h5 class="card-title">Имя: <?= $result['name'] ?></h5>
                <h6 class="card-title">Адрес: <?= $result['address']?></h6>
                <h6 class="card-title">Денег на счету: <?= $result['money'] ?> руб.</h6>
            </div>
            <div class="menu users">
                <a class="btn" href="?dir=logs">Мои покупки</a>
            </div>
            <div class="form">
                <h2>Пополнить счет</h2>
                <form action="" method="POST" >        
                    <div class="item">
                        <input required placeholder="Введите количество денег" type="number" name="money" class="form-control">
                    </div>
                    <button type="submit" name="addMoney" class="btn btn-primary">Изменить</button>
                </form>                
            </div>      
        </div>
    </div>
</section>