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

    $config = $db->GetConfig();
    if(isset($config[0]['host']) && isset($config[0]['username']) && isset($config[0]['password']) && isset($config[0]['puerto'])){
        $host = $config[0]['host'];
        $correo = $config[0]['username'];
        $pwd = $config[0]['password'];
        $puerto = $config[0]['puerto'];
    }


?>

