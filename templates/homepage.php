<div class="homeContainer">
    <ul class="tableList">
        <?php foreach ($items as $item): ?>
            <li class="tableItem"><a href="/main/home/?itemId=<?=$item['id']?>"><?=$item['title']?></a></li>
        <?php endforeach; ?>
    </ul>    
</div>