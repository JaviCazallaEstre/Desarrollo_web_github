<?php
$rutaImagen = "dogo-aleman.jpg";
$contenidoBinario = file_get_contents($rutaImagen);
$imagenComoBase64 = base64_encode($contenidoBinario);
$foto= "<img src='data:image/jpeg;base64,".$imagenComoBase64."'/>";


use PHPMailer\PHPMailer\PHPMailer;

require "vendor/autoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();
// cambiar a 0 para no ver mensajes de error
$mail->SMTPDebug  = 2;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = "tls";
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 587;
// introducir usuario de google
$mail->Username   = "javiCazallaPruebas@gmail.com";
// introducir clave
$mail->Password   = "alcantarilla";
$mail->SetFrom('javiCazallaPruebas@gmail.com', 'Test');
// asunto
$mail->Subject    = "Foto enviada";
// cuerpo
$mail->MsgHTML($foto);
// adjuntos
//$mail->addAttachment("dogo-aleman.jpg");
// destinatario
$address = "javi.cazalla@gmail.com";
$mail->AddAddress($address, "Test");
// enviar
$resul = $mail->Send();
if (!$resul) {
    echo "Error" . $mail->ErrorInfo;
} else {
    echo "Enviado";
}
