<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
session_start();
$_SESSION = array();
session_destroy();
header("Location: " . REDIR_AUTH . "/login.php");
exit;
?>