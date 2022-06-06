<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../auth/login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Bienvenido al sitio, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b></h1>
    <?php
        echo $_SESSION["email"];
        echo $_SESSION["id"];
    ?>
    <p>
        <a href="../auth/logout.php" class="btn btn-danger ml-3">Log out</a>
    </p>
</body>
</html>