<div class="tableContainer">
<ul class="tableList">
    <?php foreach ($orders as $order): ?>
        <li class="tableItem">
            Заказ: <?=$order['id']?> 
            Дата и время: <?=$order['order_time']?>
        </li>
    <?php endforeach; ?>
</ul>
</div>