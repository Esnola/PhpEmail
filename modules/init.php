<?php

    define('APP_DOMAIN', 'http://mailer.local.devel');
    define('DB_HOST', 'localhost');
    define('DB_DATABASE', 'mailerphp');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    require_once 'class.db.php';
    require_once 'vendor/autoload.php';
    require_once 'class.phpmailer.php';

    ob_start();
    session_start();
    
    $db = new DB;


?>

