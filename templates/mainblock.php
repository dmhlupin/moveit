<div class="mainform">
            <div class="pageHeader">
                <ul class="pageHeaderMenu">
                    <li>menu1</li>
                    <li>menu2</li>
                    <li>menu3</li>
                    <li>menu4</li>
                </ul>
            </div>
            <div class="tableContainer">
                <ul class="tableList">
                    <?php foreach ($files as $file): ?>
                        <li class="tableItem"><a href="/docs/<?=$file?>"><?=$file?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="picture">
                <img src="images/diagram0001.jpg" alt="diagram0001">
            </div>
            <div class="description">
                <ul class="descList" id="descList1">
                    <li class="descItem">Desc1</li>
                    <li class="descItem">Desc1</li>
                    <li class="descItem">Desc1</li>
                    <li class="descItem">Desc1</li>
                    <li class="descItem">Desc1</li>
                    <li class="descItem">Desc1</li>
                </ul>
            </div>
        </div>