<?php
    if(!empty($_POST['host']) && !empty($_POST['correo']) && !empty($_POST['password']) && !empty($_POST['puerto']) && filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
        $host = $_POST['host'];
        $correo = $_POST['correo'];
        $pwd = $_POST['password'];
        $puerto = $_POST['puerto'];

        $guardado = $db->SaveConfig($host, $correo, $pwd, $puerto);
        if($guardado){
            echo json_encode( array(
                "status" => true,
                "response" => "Guardado con exito!!!"
            ) );
        }else{
            echo json_encode(array(
                "status" => false,
                "response" => "Error en guardar los datos"
            ));
        }
    }
    else{
        echo json_encode(array(
            "status" => false,
            "response" => "Error en los parametros enviados"
        ));
    }