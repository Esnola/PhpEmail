<?php
    #dominio https://tudominio.com
    define('APP_DOMAIN', 'http://mailer.local.devel');
    #host base de datos
    define('DB_HOST', 'localhost');
    #nombre base de datos
    define('DB_DATABASE', 'mailerphp');
    #user base de datos
    define('DB_USER', 'root');
    #password base de datos
    define('DB_PASSWORD', '');
    #remitente
    define('REMITTER_NAME', 'BlackSwan Finances');

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

