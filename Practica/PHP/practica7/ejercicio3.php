<?php
    if(isset($_POST['enviarUsuario'])){
        $usuario = $_POST['username'];
        setcookie('usuario', $usuario, time() + (86400 * 30), "/");
        header('Location: ejercicio3.php');
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>


    <form action="ejercicio3.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <input type="submit" value="Enviar" name="enviarUsuario">
    </form>

    <?php
        if(isset($_COOKIE['usuario'])){
            echo "El ultimo usuario que has introducido es: ".$_COOKIE['usuario'];
        }
    ?>
</body>
</html>