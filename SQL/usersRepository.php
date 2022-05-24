<?php
include "mysql_utils.php";

class UserRepository{

    private const ENTITY = "usuarios";
    private const IDENTIFIER = "idUsuario";
    private static $DBConnector;

    function __constructor(){
        // no esta funcionando
        self::$DBConnector = MySQLConnector::getInstance();
    }

    function instance(){
        return MySQLConnector::getInstance();
    }

    function getAllUsers(){
        $query = "SELECT * FROM ".self::ENTITY.";";
        $conn = self::instance()->getConnection();
        $result = mysqli_query($conn, $query);
        self::instance()->closeConnection($conn);
        return $result;
    }

    function getUserById($id){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE ".self::IDENTIFIER.
            " = ".$id. ";" ;
        $conn = self::instance()->getConnection();
        $result = mysqli_query($conn, $query);
        self::instance()->closeConnection($conn);
        return $result;
    }

    function getUserByEmail($email){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE email = '".$email 
            ."' ;" ;
        $conn = self::instance()->getConnection();
        $result = mysqli_query($conn, $query);
        self::instance()->closeConnection($conn);
        return $result;
    }
}

?>