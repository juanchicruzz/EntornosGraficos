<?php

function comprobar_nombre_usuario($nombre_usuario){
 //compruebo que el tamaño del string sea válido.
 if (strlen($nombre_usuario)<3 || strlen($nombre_usuario)>20){
 echo $nombre_usuario . " no es válido<br>";
 return false;
 }
 //compruebo que los caracteres sean los permitidos
 $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-
_";
 for ($i=0; $i<strlen($nombre_usuario); $i++){
 if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){ //strpos devuelve FALSE si no se encuentra.
 echo $nombre_usuario . " no es válido<br>";
 return false;
 }
 }
 echo $nombre_usuario . " es válido<br>";
 return true;
} 

?>
<html>
<head><title>Documento 2</title></head>
<body>
<?php
if (!isset($_POST['submit'])) {
?>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 Nombre usuario: <input name="user" size="6">
 <input type="submit" name="submit" value="Validar">
 </form>
<?php
 }else{
 $user = $_POST['user'];
 comprobar_nombre_usuario($user);
}
?>
</body></html>

