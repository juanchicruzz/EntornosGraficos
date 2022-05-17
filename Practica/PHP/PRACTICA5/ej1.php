

<?php
$destinatario = "acciarrijoshua@gmail.com";
$asunto = "Prueba desde PHP";
$cuerpo = '
<html>
<head>
 <title>Envio de mail</title>
</head>
<body>
<h1>Hola!</h1>
<p>
<b>Esto es una prueba</b>.
xxxxxxxxxxxxxxxxxxxxxxxxxxx
</p>
</body>
</html>
';
$headers = "Content-type:
text/html; charset=iso-8859- 1\r\n";
$headers .= "From: NN
<nn@nn.com>\r\n";

if (mail($destinatario, $asunto, $cuerpo, $headers)){
    echo "Mail enviado satisfactoriamente";
} else {
    echo "Mail no enviado.";
}

?> 

