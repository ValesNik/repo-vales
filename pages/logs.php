<section class="auth">
    <div class="container">
        <div class="selectLogs">
            <h2>Список покупок</h2> 
            
            <?if($_SESSION['role']==='user'):?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итоговая стоимость</th>
                        <th>Дата покупки</th>
                    </tr>
                </thead>
            <?$query = myLogs($db)?>
            <?while($result = mysqli_fetch_array($query)):?>
                <tbody>
                    <tr>
                        <td><?=$result['name_goods']?></td>
                        <td><?=$result['price']?> р.</td>
                        <td><?=$result['quan']?></td>
                        <td><?=$result['total']?> р.</td>
                        <td><?=$result['date']?></td>
                    </tr>
                </tbody>
            <?endwhile;?>
            </table>
            <?elseif($_SESSION['role']==='admin'):?>
            <h2>Прибыль компании <?=sumTotal($db)?>р.</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Название товара</th>
                        <th>Логин покупателя</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Итоговая стоимость</th>
                        <th>Дата покупки</th>
                    </tr>
                </thead>
            <?$query = allLogs($db)?>
            <?while($result = mysqli_fetch_array($query)):?>
                <tbody>
                    <tr>
                        <td><?=$result['name_goods']?></td>
                        <td><?=$result['name_user']?></td>
                        <td><?=$result['price']?> р.</td>
                        <td><?=$result['quan']?></td>
                        <td><?=$result['total']?> р.</td>
                        <td><?=$result['date']?></td>
                    </tr>
                </tbody>
            <?endwhile;?>
            </table>   
            <?endif;?>
        </div>
    </div>
</section>