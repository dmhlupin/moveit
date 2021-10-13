<div class="tableContainer">
    <ul class="tableList">
        <?php foreach ($files as $file): ?>
            <li class="tableItem"><a href="/docs/<?=$file?>"><?=$file?></a></li>
        <?php endforeach; ?>
    </ul>
</div>