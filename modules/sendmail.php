<?php
    if(!empty($_POST['correos']) && !empty($_POST['mensaje']) && !empty($_POST['nombres']) && !empty($_POST['asunto']) && is_array($_POST['correos']) && is_array($_POST['nombres'])){
        $correos_remitentes = $_POST['correos'];
        $mensaje_correo = $_POST['mensaje'];
        $asunto_correo = $_POST['asunto'];
        $nombres_correo = $_POST['nombres'];
        foreach($correos_remitentes as $index => $correo_rm){
            if(filter_var($correo_rm, FILTER_VALIDATE_EMAIL)){
                $mailer = new Mail($host, $correo, $pwd, $puerto);
                $nombre_persona = $nombres_correo[$index];
                $mensaje = str_replace('Hello ___,', "Hello $nombre_persona,", $mensaje_correo);
                $sender_email = $mailer->EnviarCorreos($correo_rm, $nombre_persona, $asunto_correo, $mensaje);
                $db->GuardarEnviados($correo_rm, $nombre_persona, $asunto_correo, $mensaje);
            }
        }
        echo json_encode(array(
            "status" => true,
            "response" => "Todo los correo enviado con exito..."
        ));
    }else{
        echo json_encode( array(
            "status" => false,
            "response" => "Datos enviado incorrectamente"
        ) );
        die();
    }
