<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'resources/assets/PHPMailer/Exception.php';
require 'resources/assets/PHPMailer/PHPMailer.php';
require 'resources/assets/PHPMailer/SMTP.php';

class RecuperarContraseñaController extends RecuperarContraseña {

    public function __construct() {
        try{        
        }catch(Exeption $e){
            die($e->getMessage());
        }
    }

    public function index() {
        if (@$_SESSION['allowedUserResetPassword']) {
            if (@$_SESSION['passwordAllowed']) {
                require_once('resources/views/recuperarcontraseña/cambiarContraseña.php');
            } else {
                require_once('resources/views/recuperarcontraseña/index.php');
            }
        } else {
            self::verify();
        }
    }
    public function verify() {
        require_once('resources/views/recuperarcontraseña/verify.php');
    }

    public function verifyDocument() {
        $documento = $_POST['documento'];
        self::verifyIfUserExist($documento);

        header('location:'.$this->serverPath.'../RecuperarContraseña');
    }

    public function verifyCodigoVerif() {
        $codigoVerif = $_POST['codigoVerif'];
        $isCorrectCode = self::verifyCodigoInDataBase($codigoVerif);

        if ($isCorrectCode) {
            $_SESSION['passwordAllowed'] = true;
        } else {
            // no es el código enviado
            $_SESSION['messages'] = 1;
        }
        header('location:'.$this->serverPath.'../RecuperarContraseña');
    }

    private function verifyIfUserExist($documento) {
        $usuario = parent::consultarUsuario($documento);

        $correo = $usuario[0]->usuarioCorreoElectronico;

        if ($usuario) {
            // está registrado
            $_SESSION['codigoVerfi'] = self::generateCodigoVerif($documento, $correo);
            $_SESSION['correoCodigoVerif'] = self::obfuscate_email($correo);
            $_SESSION['allowedUserResetPassword'] = true;
            $_SESSION['documento'] = $documento;
            return '';
        } else {
            // no está registrado
            $_SESSION['messages'] = 1;
            return '';
        }
    }

    public function generateCodigoVerif($documento, $correo) {

        $letraAleatoria = chr(rand(ord('a'), ord('z')));
        $numeroAleatorio = rand(100000, 999999);

        $codigoVerif = $letraAleatoria . $numeroAleatorio;

        $data = array(
            'codigoVerif' => $codigoVerif,
            'documento' => $documento
        );

        parent::updateCodigoVerif($data);
        self::sendMail($codigoVerif, $correo);
        return $codigoVerif;
    }

    public function sendMail($codigoVerif, $correo) {
        $msg = null;
        $asunto = 'Restablecimiento de Clave';
        $texto1 = 'Estimado Usuario: <br><br>Usted ha solicitado el restablecimiento de su contraseña, ';
        $texto2 = 'su código de verificación es: ';
        $nota = '<br>NO RESPONDER - Mensaje Generado Automáticamente<br><br><br>Nota: Este correo es únicamente informativo y es de uso exclusivo del destinatario(a), puede contener información privilegiada y/o confidencial. Si no es usted el destinatario(a) deberá borrarlo inmediatamente. Queda notificado que el mal uso, divulgación no autorizada, alteración y/o  modificación malintencionada sobre este mensaje y sus anexos quedan estrictamente prohibidos y pueden ser legalmente sancionados.';
        $textoFinal = $texto1 . $texto2 . $codigoVerif .$nota;
        $remitente = 'MueblesNGR';

        $mail = new PHPMailer(true);

        try{
            //Server settings
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'proyectocis1821630@gmail.com';                     
            $mail->Password   = '1821630G2';                               
            $mail->SMTPSecure = 'tls';         
            $mail->Port       = 587;                                    

            //Recipients
            $mail->setFrom('proyectocis1821630@gmail.com', $remitente);
            $mail->addAddress($correo);     
            
            // Content
            $mail->isHTML(true);                                  
            $mail->Subject = $asunto;
            $mail->Body    = $textoFinal;

            $mail->send();
            return '';

        }catch (Exception $e) {
            echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
        }
    }

    public function cancel() {
        unset($_SESSION['allowedUserResetPassword']);
        unset($_SESSION['documento']);
        unset($_SESSION['codigoVerfi']);
        unset($_SESSION['correoCodigoVerif']);
        unset($_SESSION['passwordAllowed']);
        session_destroy();
        header('location:'.$this->serverPath.'../Login');
    }

    public function changePwd() {

        $data = array(
            "password" => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'documento' => $_SESSION['documento']
        );
        
        parent::update($data);

        $_SESSION['messages'] = 6;
        unset($_SESSION['allowedUserResetPassword']);
        unset($_SESSION['codigoVerfi']);
        unset($_SESSION['passwordAllowed']);

        
        header('location:'.$this->serverPath.'../Login');        
    }

    private function obfuscate_email($email) {
        $em   = explode("@",$email);
        $name = implode(array_slice($em, 0, count($em)-1), '@');
        $len  = floor(strlen($name)/2);

        return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
    }

}
