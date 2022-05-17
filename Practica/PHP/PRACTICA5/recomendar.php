
<?php

$destinatario= $_POST['email'];
$asunto="Consulta al Webmaster";
$cuerpo= "
\n
Hola! Tu amigo $_POST[nombre] le gustaría que visitases nuestro sitio.
<br>
Entra aquí: 
<a href=\"www.facebook.com\" target=\"_blank\">Facebook</a>
\n ";
if(mail($destinatario,$asunto,$cuerpo)){
    echo "El mail fue enviado. <hr>";
    echo "Enviado a: ".$destinatario;
} else {
    echo "El mail no pudo ser enviado.";
}

?>
