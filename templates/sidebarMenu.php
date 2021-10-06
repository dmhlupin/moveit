<div class="sidebar">
    <ul class="sidebarMenu">
        <?php foreach ($menu as $menuItem): ?>
            <li class="sidebarMenuItem"><a href="<?=$menuItem['link']?>"><?=$menuItem['name']?></a></li>
        <?php endforeach; ?>
        <!-- <li class="sidebarMenuItem active"><a href="{$menuItem['link']}">Home</a></li>
        <li class="sidebarMenuItem"><a href="#">Store</a></li>
        <li class="sidebarMenuItem"><a href="#">In operation</a></li>
        <li class="sidebarMenuItem"><a href="#">Search</a></li>
        <li class="sidebarMenuItem"><a href="#">Profile</a></li> -->
    </ul>
</div>