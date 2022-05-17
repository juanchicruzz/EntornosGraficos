<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar consulta</title>
</head>
<body>
    
<?php
$fecha=date("d-m-Y");
$hora= date("H :i:s");
$destino="acciarrijoshua@gmail.com";
$asunto="Consulta al Webmaster";
$headers='From:' .$_POST['email'];
$cuerpo= "
\n
Nombre: $_POST[nombre]\n
Email: $_POST[email]\n
Consulta: $_POST[mensaje]\n
Enviado el: $fecha a las $hora\n
\n
";
if(mail($destino,$asunto,$cuerpo,$headers)){
    echo "Su consulta ha sido enviada, en breve recibirá nuestra
    respuesta. <hr>";
    echo "Enviado a: ".$destino."\n".$cuerpo;
} else {
    echo "El mail no pudo ser enviado.";
}

?>

</body>
</html>