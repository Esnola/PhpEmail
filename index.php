<?php
    require_once 'modules/init.php';
    
    switch($_GET['act'])
    {
        case 'index':
            include_once 'modules/includes/headers.php';

            $correos_enviados = $db->CorreosEnviados();

            include_once 'modules/includes/part.enviados.php';
            include_once 'modules/includes/part.footer.php';
            break;
        case 'cargarmas':
            include_once 'modules/paginateenviados.php';
            break;
        case 'correos_inp':
            include_once 'modules/includes/headers.php';
            include_once 'modules/includes/part.enviarcorreos.php';
            include_once 'modules/includes/part.footer.php';
            break;
        case 'config':
            include_once 'modules/includes/headers.php';

            $config = $db->GetConfig();
            if(isset($config[0]['host']) && isset($config[0]['username']) && isset($config[0]['password']) && isset($config[0]['puerto'])){
                $host = $config[0]['host'];
                $correo = $config[0]['username'];
                $pwd = $config[0]['password'];
                $puerto = $config[0]['puerto'];
            }

            include_once 'modules/includes/part.guardarconfig.php';
            include_once 'modules/includes/part.footer.php';
            break;
        case 'guardar_config':
            include_once 'modules/save_config.php';
            break;
        case 'enviar_correos':
            include_once 'modules/sendmail.php';
            break;
        default:
            header('location: inicio');
            exit;
    }
?>