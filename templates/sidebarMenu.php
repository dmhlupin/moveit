<div class="sidebar">
    <ul class="sidebarMenu">
        <?php foreach ($menu as $menuItem): ?>
            <li class="sidebarMenuItem <?=$menuItem['active']?>"><a href="<?=$menuItem['link']?>"><?=$menuItem['name']?></a></li>
        <?php endforeach; ?>
    </ul>
</div>