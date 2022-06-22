<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("Location: ". REDIR_AUTH . "/login.php");
    exit;
}
?>
 
<?php include(DIR_HEADER);?>

    <h1 class="my-5">Bienvenido al sitio, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b></h1>
    <?php echo DIR_AUTH . "/logout.php"; ?>
    <br>
    
    <?php echo $_SERVER['PHP_SELF'] ?>
    <br>
    <?php echo $_SERVER['SERVER_NAME'] ?>
    <br>
    <?php echo $_SERVER['SCRIPT_FILENAME'] ?>
    <br>
    <?php echo $_SERVER['DOCUMENT_ROOT'] ?>
    <br>
    <?php echo $_SERVER["REQUEST_URI"] ?>
<h3>real paths </h3>

<?php 
    echo basename($_SERVER['PHP_SELF'])?>
    <br>
    <?php echo basename($_SERVER['SERVER_NAME'])?>
    <br>
    <?php echo basename($_SERVER['SCRIPT_FILENAME'])?>
    <br>
    <?php echo basename($_SERVER['DOCUMENT_ROOT'])?>
    <br>
    <?php echo basename($_SERVER['REQUEST_URI'])?>



    <p>
        <a href="<?=REDIR_AUTH?>/logout.php" class="btn btn-danger ml-3">Log out</a>
    </p>

<?php include(DIR_FOOTER);?>