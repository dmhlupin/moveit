<?php
// Константы
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');


// DB
define('HOST', 'localhost:3307');
define('USER', 'root');
define('PASS', '123456');
define('DB', 'moveit');

include "../engine/functions.php";
include "../engine/interface.php";
include "../engine/mainblockconstructor.php";
include "../engine/db.php";
include "../engine/items.php";

