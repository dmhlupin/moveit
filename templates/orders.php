<div class="tableContainer">
<ul class="tableList">
    <li class="tableItem">
            <p>Заказ: </p>
            <p>Оформлен: </p>
            <p>Наименование: </p>
            <p>Статус: </p>
    <?php foreach ($orders as $order): ?>
        <li class="tableItem">
        <a class="tableItem" href="/main/orders/?itemId=<?=$order['itemId']?>">
            <p><?=$order['id']?></p>
            <p><?=$order['order_time']?></p>
            <p><?=$order['title']?></p>
            <p><?=$order['status']?></p>
        </a>
        </li>
    <?php endforeach; ?>
</ul>
</div>