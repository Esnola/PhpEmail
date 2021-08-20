<?php
    require_once 'init.php';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['limit']) && isset($_POST['offset'])){
        $correos_enviados = $db->CorreosEnviados(false, $_POST['limit'], $_POST['offset']);
        echo json_encode(array("offset" => $_POST['offset'], "data" => $correos_enviados));
        die();
    }else{
        die('Metodo incorrecto...');
    }
