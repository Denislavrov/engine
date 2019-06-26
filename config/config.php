<?php
define("TEMPLATES_DIR", "../views/");
define("LAYOUTS_DIR", "layouts/");

/* db config*/

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', 'kanjo078900');
define('DB', 'engine');

include "../engine/functions.php";
include "../engine/log.php";
include_once "../engine/gallery.php";
include_once "../engine/resize.php";
include_once "../engine/loadfile.php";
include_once "../engine/DB.php";
