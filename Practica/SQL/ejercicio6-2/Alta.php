<html>

<head>
    <title>Alta Usuario</title>
</head>

<body>
    <?php
    include("conexion.php");
    //Captura datos desde el Form anterior
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $habitantes = $_POST['habitantes'];
    $superficie = $_POST['superficie'];
    $metro = $_POST['metro'];

    //Arma la instrucción SQL y luego la ejecuta
    $vSql = "SELECT Count(*) as cant FROM ciudades
             WHERE ciudad='$ciudad' AND pais='$pais'";
    $vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));;
    $vCantRows = mysqli_fetch_assoc($vResultado);
    //$vCantUsuarios = mysqli_result($vResultado, 0);
    if ($vCantRows['cant'] != 0) {
        echo ("La combinacion Ciudad/Pais ya Existe<br>");
        echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
    } else {
        $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)
                 VALUES ('$ciudad', '$pais', '$habitantes', '$superficie', '$metro')";
        mysqli_query($link, $vSql) or die(mysqli_error($link));
        echo ("La ciudad fue Registrada<br>");
        echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
        // Liberar conjunto de resultados
        mysqli_free_result($vResultado);
    }
    // Cerrar la conexion
    mysqli_close($link);
    ?></body>

</html>