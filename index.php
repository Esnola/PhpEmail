<?php
    require_once 'modules/init.php';
    
    switch($_GET['act'])
    {
        case 'index':
            include_once 'modules/includes/headers.php';
            include_once 'modules/includes/part.enviarcorreos.php';
            include_once 'modules/includes/part.footer.php';
            break;
        case 'config':
            include_once 'modules/includes/headers.php';
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