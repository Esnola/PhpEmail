<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    class Mail
    {
        private $host;
        private $username;
        private $password;
        private $puerto;
        private $mailer;
        private $remitente = REMITTER_NAME;

        function __construct($host, $username, $password, $puerto)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->puerto = $puerto;

            $this->mailer = new PHPMailer(true);

            #$this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mailer->isSMTP();
            $this->mailer->CharSet    = 'UTF-8';                                            //Send using SMTP
            $this->mailer->Host       = $this->host;                     //Set the SMTP server to send through
            $this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mailer->Username   = $this->username;                     //SMTP username
            $this->mailer->Password   = $this->password;                               //SMTP password
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mailer->Port       = $this->puerto;
        }

        public function EnviarCorreos($correo, $nombre, $asunto, $mensaje)
        {
            $this->mailer->setFrom($this->username, $this->remitente);
            $this->mailer->addAddress($correo, $nombre);                            
            $this->mailer->Subject = $asunto;
            $this->mailer->Body    = $mensaje;
            $this->mailer->send();
        }
    }