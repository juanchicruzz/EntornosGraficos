<?php
require_once 'db.php';
session_start();
?>

<?php
if (isset($_POST['checkMail'])) {
    $mail = $_POST['mail'];
    $sql = "SELECT * FROM alumnos WHERE mail = '$mail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['nombre'];

    }

}
?>
<?php if (isset($_GET['limpiar'])) {
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>
<body>
   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="mail">Mail:</label>
        <input type="text" name="mail" id="mail">
        <input type="submit" value="Ingresar" name="checkMail">

        <a href="mainPage.php">Ingresar a la pagina</a>
</body>
</html>