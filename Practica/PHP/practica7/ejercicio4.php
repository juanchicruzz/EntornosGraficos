<?php
    if(isset($_POST['enviarHeadline'])){
        $headline = $_POST['headline'];
        setcookie('headline', $headline, time() + (86400 * 30), "/");
        header('Location: ejercicio4.php');
        
    }
    if(isset($_GET['delete'])){
        setcookie('headline', '', time() - (86400 * 30), "/");
        header('Location: ejercicio4.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio 4</title>
</head>
<body>
    


    <form action="ejercicio4.php" method="post">
        <label for="headline">Headline:</label>
        <input type="radio" name="headline" value="political">Political
        <input type="radio" name="headline" value="economic">Economic
        <input type="radio" name="headline" value="sports">Sports
        <input type="submit" value="Enviar" name="enviarHeadline">
    </form>

    <?php
        if(isset($_COOKIE['headline'])){
            echo "<h2>".$_COOKIE['headline']."</h2>";
            echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet nibh quam. Aenean aliquet fermentum sem, ut mollis magna suscipit eu. Nam ut fringilla enim. Vestibulum nec tellus sem. Quisque porttitor diam et odio lobortis pulvinar. Donec ligula lacus, porttitor sed erat at, elementum dictum nisl. Vivamus sed placerat augue. Nullam tristique consectetur mauris, et facilisis odio sodales at. Aliquam fermentum luctus enim, id pulvinar metus commodo finibus. Suspendisse porttitor interdum faucibus. Nulla laoreet vestibulum est vulputate sollicitudin. Maecenas sollicitudin orci sit amet lectus molestie, in dictum urna efficitur.</p>";

        }
        else{
            echo "<h2>Political</h2>";
            echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet nibh quam. Aenean aliquet fermentum sem, ut mollis magna suscipit eu. Nam ut fringilla enim. Vestibulum nec tellus sem. Quisque porttitor diam et odio lobortis pulvinar. Donec ligula lacus, porttitor sed erat at, elementum dictum nisl. Vivamus sed placerat augue. Nullam tristique consectetur mauris, et facilisis odio sodales at. Aliquam fermentum luctus enim, id pulvinar metus commodo finibus. Suspendisse porttitor interdum faucibus. Nulla laoreet vestibulum est vulputate sollicitudin. Maecenas sollicitudin orci sit amet lectus molestie, in dictum urna efficitur.</p>";
            echo "<h2>Economic</h2>";
            echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet nibh quam. Aenean aliquet fermentum sem, ut mollis magna suscipit eu. Nam ut fringilla enim. Vestibulum nec tellus sem. Quisque porttitor diam et odio lobortis pulvinar. Donec ligula lacus, porttitor sed erat at, elementum dictum nisl. Vivamus sed placerat augue. Nullam tristique consectetur mauris, et facilisis odio sodales at. Aliquam fermentum luctus enim, id pulvinar metus commodo finibus. Suspendisse porttitor interdum faucibus. Nulla laoreet vestibulum est vulputate sollicitudin. Maecenas sollicitudin orci sit amet lectus molestie, in dictum urna efficitur.</p>";
            echo "<h2>Sports</h2>";
            echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet nibh quam. Aenean aliquet fermentum sem, ut mollis magna suscipit eu. Nam ut fringilla enim. Vestibulum nec tellus sem. Quisque porttitor diam et odio lobortis pulvinar. Donec ligula lacus, porttitor sed erat at, elementum dictum nisl. Vivamus sed placerat augue. Nullam tristique consectetur mauris, et facilisis odio sodales at. Aliquam fermentum luctus enim, id pulvinar metus commodo finibus. Suspendisse porttitor interdum faucibus. Nulla laoreet vestibulum est vulputate sollicitudin. Maecenas sollicitudin orci sit amet lectus molestie, in dictum urna efficitur.</p>";
        }
    ?>
    <a href="ejercicio4.php?delete=true">Delete cookie</a>

</body>
</html>