<head>
<title>Modificacion</title>
</head>
<body>
<?php
include ("conexion.php");
//Captura datos desde el Form anterior
$ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $metro = $_POST['tieneMetro'];
    
//Arma la instrucción SQL y luego la ejecuta
$vSql = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes='$habitantes', superficie='$superficie', tieneMetro='$metro' WHERE ciudad='$ciudad'";
mysqli_query($link,$vSql) or die (mysqli_error($link));
echo("La ciudad fue Modificada<br>");
echo("<A href= 'Menu.html'>Volver al Menu del ABM</A>");
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>