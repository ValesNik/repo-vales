<section class="auth">
    <div class="container">
        <form action="" method="post">
            <h2>Регистрация</h2>
            <div class="item">
                <input required type="text" name="login" placeholder="Придумайте логин" class="form-control">
            </div>
            <div class="item">
                <input required type="password" placeholder="Придумайте пароль" name="pass" class="form-control">
            </div>
            <? if(!($_SESSION['role']=== 'admin')): ?>
            <div class="item">
                <input required type="text" placeholder="Как вас зовут?" name="name" class="form-control">
            </div>
            <div class="item">
                <input required type="text" placeholder="Адрес проживания" name="address" class="form-control">
            </div>
            <button type="submit" name="regUser" class="btn btn-primary">Зарегистрировать</button>
            <? regUser($db); ?>
            <? else: ?>
            <button type="submit" name="regAdmin" class="btn btn-primary">Зарегистрировать</button>
            <? regAdmin($db); ?>
            <? endif;?>
        </form>
    </div>
</section>