<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");

Class Security {
    
    static function verifyUser($type){
        if(!isset($_SESSION['loggedin']))
        {
            header("Location: " . AUTH . "/login.php");
            exit;
        }
        if(!($_SESSION['userType'] == $type))
        {
            header("Location: " . AUTH . "/login.php");
            exit;
        }
    }
}
?>