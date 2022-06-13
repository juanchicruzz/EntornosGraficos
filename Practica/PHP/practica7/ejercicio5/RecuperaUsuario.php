<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera Session</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            echo "Usuario: ".$_SESSION['username']."<br>";
            echo "Contraseña: ".$_SESSION['password'];
        }
    ?>
</body>
</html>