<?php
require_once("const.php");
$link = mysqli_connect("localhost", "root", PASSWORD) or die ("Problemas de conexión a la base de
datos");
mysqli_select_db($link, "capitales");
mysqli_set_charset($link, "utf8");
?>