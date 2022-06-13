<?php
    if(isset($_POST['elijeColor'])){
        $color = $_POST['color'];
        $_COOKIE['color'] = $color;
        setcookie('color', $color, time() + (86400 * 30), "/");
        header('Location: ejercicio1.php');}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        if(isset($_COOKIE['color'])){
            echo "<link rel='stylesheet' href='css/".$_COOKIE['color'].".css'>";
        }else{
            echo "<link rel='stylesheet' href='css/azul.css'>";
        }
    ?>
    <title>Ejercicio 1</title>
</head>
<body>



    <form action="ejercicio1.php" method="post">
        <label for="color">Color:</label>
        <input type="text" name="color" id="color">
        <input type="submit" value="Enviar" name="elijeColor">
    </form>

</body>
</html>
