<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <?php if(isset($_SESSION['name'])) { ?>
        <h1>Bienvenido <?php echo $_SESSION['name']; ?></h1>
        <a href="index.php?limpiar=true">Volver</a>

    <?php } else {  ?>
        <h1>No puedes ingresar</h1>
        <a href="index.php">Volver</a>
    <?php } ?>
</body>
</html>