<?php 
    if(isset($_POST)){
        error_reporting(0);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message=  $_POST['message'];
        $subject = $_POST['subject'];

        $domain= $_SERVER['HTTP_HOST'];
        $to= 'ikccz@plaiaundi.net';
        $mensaje = "
            <p>
            Datos enviados desde: <b>$domain</b> 
            </p>
            <ul>
                <li>Nombre: $name</li>
                <li>Email: $email</li>
            </ul>
            <p>$message</p>
        ";
        $headers="MIME-Version: 1.0\r\n"."Content-Type:text/html; charset=utf8\r\n".
        "From: Envío Automatico <no-reply@$domain>";
        
        if(mail($to, $subject, $mensaje,$headers)){
            $res=[
                "err"=>false,
                "message"=>"El formulario ha sido enviado exitosamente."
            ];
        }else{
            $res=[
                "err"=>true,
                "message"=>"Error al enviar tus datos. Intenta nuevamente."
            ];
        }
header("Access-Control-Allow-Origin:https://mdmgn.github.io");
header("Content-type:application/json");
echo json_encode($res);
}
?>