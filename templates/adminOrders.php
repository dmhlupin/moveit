<div class="tableContainer">
<ul class="tableList tableListWide">
    <li class="tableItem">
            <p>Заказ</p>
            <p>Пользователь</p>
            <p>Оформлен</p>
            <p>Наименование</p>
            <p>Статус</p>
            <p>Оформить/отменить</p>
    <?php foreach ($orders as $order): ?>
        <li class="tableItem">
        <a class="tableItem" href="/main/orders/?itemId=<?=$order['itemId']?>">
            <p><?=$order['id']?></p>
            <p><?=$order['userName']?></p>
            <p><?=$order['order_time']?></p>
            <p><?=$order['title']?></p>
            <p><?=$order['status']?></p>
            <p>
                <form action="" method="POST">
                    <input type="submit" value="Выполнить">
                    <input type="submit" value="Отменить">
                </form>
            </p>
        </a>
        </li>
    <?php endforeach; ?>
</ul>
</div>