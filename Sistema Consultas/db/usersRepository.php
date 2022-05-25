<?php
include "mySQLConnector.php";

class UserRepository{

    private const ENTITY = "usuarios";
    private const IDENTIFIER = "id";
    // private static $DBConnector;

    private static function DBInstance(){
        return MySQLConnector::getInstance();
    }

    function getAllUsers(){
        $query = "SELECT * FROM ".self::ENTITY.";";
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        //echo "Current opened connections: ".$this->DBInstance()->CURR_CONNECTIONS. "<hr>";
        return $result;
    }

    function getUserById($id){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE ".self::IDENTIFIER.
            " = ".$id. ";" ;
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        //echo "Current opened connections: ".$this->DBInstance()->CURR_CONNECTIONS. "<hr>";
        return $result;
    }

    function getUserByEmail($email){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE email = '".$email 
            ."' ;" ;
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        //echo "Current opened connections: ".$this->DBInstance()->CURR_CONNECTIONS. "<hr>";
        return $result;
    }
}

?>