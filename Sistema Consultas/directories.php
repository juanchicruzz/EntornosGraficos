<?php
const ROOT = "/sistema-consultas";
// COMUNES
define('INDEX', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/index.php");
define('HEADER', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/partials/header.php");
define('FOOTER', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/partials/footer.php");

// CARPETAS
define('AUTH', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/auth");
define('CONTROLLERS', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/controllers");
define('DB', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/db");
define('REPOSITORIES', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/db/repositories");
define('SECURITY', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/controllers/security.php");
define('VIEWS', $_SERVER['DOCUMENT_ROOT'] . ROOT . "/views");

?>