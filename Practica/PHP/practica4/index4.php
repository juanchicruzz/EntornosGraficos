<?php
echo "El $flor $color \n";
include 'datos.php';
echo " El $flor $color";
?>

<p>el codigo produce la siguente salida porque se esta intentando referenciar las variables del archivo datos.php antes de incluir el mismo archivo. osea que son variables no seteadas.
</p>


Warning: Undefined variable $flor in E:\Archivos de Programa\Xampp\htdocs\Practica4PHP\index.php on line 2

Warning: Undefined variable $color in E:\Archivos de Programa\Xampp\htdocs\Practica4PHP\index.php on line 2
El El clavel blanco