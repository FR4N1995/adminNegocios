<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    protected $email;
    protected $nombre;
    protected $token;

    public function  __construct($email, $nombre, $token){

        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;



    }

    public function enviarconfirmacion(){
         //creando el objeto de la libreria phpmiler 
        //que se instalo con (composer)
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        // $mail->Host = 'in-v3.mailjet.com';
        // $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // $mail->Port = 587;
        $mail->Port = 2525;
        
        $mail->Username = 'db967d856c3a71';
        // $mail->Username = '6b2805f5d2aff34212c0e8166973c114';
        
         $mail->Password = '0b22321b04704b';
        //  $mail->Password = '755364bb389be5867d7a3c0f70d75b60';
        
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('fran7paco10@gmail.com', 'AdminNegocios');
        $mail->addAddress($this->email, 'usuario');
        $mail->Subject = 'confirma tu cuenta';

        //set html
        $mail->isHTML(true);
        $mail->Charset = 'UFT-8';

        $contenido = "<html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }
    
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
    
        p {
            line-height: 18px;
        }
    
        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }
    
        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #000000;
            color: #ffffff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
    </style>
    <body>
        <h1>Administra tu Negocio</h1>
        <h2>Gracias por registrarte " . $this->nombre . " </h2>
        <p>Por favor confirma tu correo electronico para que puedas dar de alta tu Cuenta</p>
        <a href='http://localhost:3000/confirmar?token=" . $this->token . "'><button>Verificar</button></a>
        <p>Si tu no pediste dar de alta la cuenta, por favor ignora este correo electrónico.</p>
        <div><p></p></div>
        <p><span>Este correo electronico fue enviado desde una direccion solamente de notificaciones que no puede aceptar correo electronico entrante. Por favor no respondas a este mensaje.</span></p>
    </body>
    </html>";
        // $contenido.= `<div class ="email">`;
        // $contenido .= `<img src="http://localhost:3000/build/img/avalos murillo.png" alt="">`;
        // $contenido .= "<h2>¡Gracias por registrarte!</h2>";
        // $contenido .= "<p>Por favor confirma tu correo electronico para dar de alta tu cuenta</p>";
        // $contenido .= "<a href='http://localhost:3000/confirmar?token=". $this->token . "'> Confirmar Cuenta </a>";
        // $contenido .= "<p> si tu no solicitaste esta cuenta ignora el mensaje </p> ";
        // $contenido .= "</div>";
        // $contenido .= "</html>";

        $mail->Body = $contenido;

        //enviar email
        $mail ->send();
    }


    public function restablecerPassword(){
        //creando el objeto de la libreria phpmiler 
       //que se instalo con (composer)
       $mail = new PHPMailer();
       $mail->isSMTP();
       $mail->Host = 'smtp.mailtrap.io';
       // $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Port = 2525;
       // $mail->Port = 587;
       $mail->Username = 'db967d856c3a71';
       // $mail->Username = 'pruebaskha@gmail.com';
        $mail->Password = '0b22321b04704b';
       // $mail->Password = 'vraqarmjrnmflwgj';
       $mail->SMTPSecure = 'tls';

       $mail->setFrom('cuentas@uptask.com');
       $mail->addAddress($this->email, 'uptask.com');
       $mail->Subject = 'Restablecer tu Contraseña';

       //set html
       $mail->isHTML(true);
       $mail->Charset = 'UFT-8';

       $contenido = "<html>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
        h2 {
            font-size: 25px;
            font-weight: 500;
            line-height: 25px;
        }
    
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }
    
        p {
            line-height: 18px;
        }
    
        a {
            position: relative;
            z-index: 0;
            display: inline-block;
            margin: 20px 0;
        }
    
        a button {
            padding: 0.7em 2em;
            font-size: 16px !important;
            font-weight: 500;
            background: #000000;
            color: #ffffff;
            border: none;
            text-transform: uppercase;
            cursor: pointer;
        }
        p span {
            font-size: 12px;
        }
        div p{
            border-bottom: 1px solid #000000;
            border-top: none;
            margin-top: 40px;
        }
    </style>
    <body>
        <h1>Administra tu Negocio</h1>
        <h2>Hola " . $this->nombre . " </h2>
        <p>Has solicitado Restablecer tu Password, solo debes precionar el siguiente boton</p>
        <a href='http://localhost:3000/restablecer?token=" . $this->token . "'><button>Restablecer Password</button></a>
        <p>Si tu no solicitaste restablecer tu password ignora el mensaje</p>
        <div><p></p></div>
        <p><span>Este correo electronico fue enviado desde una direccion solamente de notificaciones que no puede aceptar correo electronico entrante. Por favor no respondas a este mensaje.</span></p>
    </body>
    </html>";

       $mail->Body = $contenido;

       //enviar email
       $mail ->send();
   }

}