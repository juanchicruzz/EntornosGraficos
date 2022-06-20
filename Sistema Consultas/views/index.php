<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../auth/login.php");
    exit;
}
?>
 
<?php include("../partials/header.php");?>

    <h1 class="my-5">Bienvenido al sitio, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b></h1>
    <?php
        echo $_SESSION["email"];
        echo $_SESSION["id"];
    ?>
    <p>
        <a href="../auth/logout.php" class="btn btn-danger ml-3">Log out</a>
    </p>

<?php include("../partials/footer.php");?>