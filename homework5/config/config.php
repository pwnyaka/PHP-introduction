<?php
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');

/* DB config */
define('HOST', 'localhost:3306');
define('USER', 'user');
define('PASS', '12345');
define('DB', 'gallery');

include $_SERVER['DOCUMENT_ROOT'] . "/../engine/functions.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/log.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/gallery.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/db.php";