<?php
    class DB
    {
        private $conexion;
        
       function __construct()
       {
            mb_internal_encoding( 'UTF-8' );
            mb_regex_encoding( 'UTF-8' );
            try{
                $this->conexion = new mysqli('localhost', 'root', '', 'mailerphp');
                $this->conexion->set_charset('utf-8');
            }catch(Exception $e){
                die('Problemas al conectarse a la base de datos.');
            }
       }

       public function SaveCorreos(array $correos, string $mensaje)
       {
           $query = 'UPDATE `data_correos` SET ';
           $query .= "($correos, $mensaje);";
           $this->conexion->query($query);
           if($this->conexion->error){
               die('Problemas al guardar en base de datos');
           }else{
               return true;
           }
       }

       public function SaveConfig($host, $correo, $password, $puerto)
       {
           $query = "UPDATE config_correo SET `host`='$host', `username`='$correo', `password`='$password', `puerto`='$puerto'";
           $this->conexion->query($query);
           if($this->conexion->error){
               die($this->conexion->error);
           }else{
               return true;
           }
       }

       public function GetConfig($object = false)
       {
           $query = "SELECT * FROM config_correo";
           $results = $this->conexion->query($query);
           if($this->conexion->error){
                die('Problemas al obtener los datos');
           }else{
                $row = array();
                while( $r = ( !$object ) ? $results->fetch_assoc() : $results->fetch_object() )
                {
                    $row[] = $r;
                }
                return $row; 
           }
       }

       public function GuardarEnviados($correo, $nombre, $asunto, $mensaje)
       {    
           $filtrado_mensaje = mysqli_real_escape_string($this->conexion, $mensaje);
           $query = "INSERT INTO correos_enviados (correo, nombre, asunto, mensaje) VALUES('$correo', '$nombre', '$asunto', '$filtrado_mensaje');";
           $this->conexion->query($query);
           if($this->conexion->error){
                die($this->conexion->error);
           }else{
                return true;
           }
       }

        public function __destruct()
        {
            if( $this->conexion)
            {
                $this->disconnect();
            }
        }

        public function disconnect()
        {
            $this->conexion->close();
        }
    }
?>