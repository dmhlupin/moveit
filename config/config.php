<?php
// Константы
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');


// DB
define('HOST', 'localhost:3307');
define('USER', 'test');
define('PASS', '12345');
define('DB', 'moveit');

include "../engine/render.php";
include "../models/interface.php";
include "../engine/mainBlockController.php";
include "../engine/controller.php";
include "../engine/db.php";
include "../models/items.php";
include "../models/feedback.php";

