<?php echo "<h1>practica 4</h1> </br>"?>
<?php
function doble($i) { //funcion con parametro i que multiplica por dos el valor
 return $i*2;
}
$a = TRUE; 
$b = "xyz";
$c = 'xyz';
$d = 12;   

echo gettype($a), "</br>";

echo gettype($b), "</br>";

echo gettype($c), "</br>";

echo gettype($d), "</br>";

if (is_int($d)) { //Estructura de control IF
 $d += 4;
}

if (is_string($a)) { //Estructura de control IF
 echo "Cadena: $a", "</br>";
}
$d = $a ? ++$d : $d*3; //Estructura de control IF funcion ternaria
$f  = doble($d++);
$g = $f += 10;
echo $a, $b, $c, $d, $f , $g, "</br>";


//variables
// $a $b $c $d $e $f $g
//tipos
// a - boolean; b y c - string; d - integer
//SALIDAS
//boolean
//string
//string
//integer
//1xyzxyz184444
?>
