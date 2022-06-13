<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>


    <?php
        if(isset($_COOKIE['counter'])){
            $counter = $_COOKIE['counter'];
            $counter++;
            setcookie('counter', $counter, time() + (86400 * 30), "/");
            echo "Bienvenido a la pagina. Nos has visitado ".$counter." veces.";
        }else{
            setcookie('counter', 1, time() + (86400 * 30), "/");
            echo "Bienvenido a la pagina. Esta es la primera vez que nos visitas.";
        }
    ?>

</body>
</html>