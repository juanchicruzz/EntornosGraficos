<?php
require_once("abstractRepository.php");

class UserRepository extends Repository {

    private const ENTITY = "usuarios";
    private const IDENTIFIER = "idUsuario";
    // private static $DBConnector;

    function getAllUsers(){
        $query = "
            SELECT * FROM ".self::ENTITY."
            INNER JOIN roles ON idRolUsuario = idRol;";
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    function getUserById($id){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE ".self::IDENTIFIER.
            " = ".$id. ";" ;
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    function getUserByEmail($email){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE email = '".$email."' ;" ;
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    function createSimpleUser($email, $legajo, $idRol){
        $query = "INSERT INTO ".self::ENTITY
            ."(email, legajo, idRolUsuario) " 
            ."VALUES('$email', '$legajo',  $idRol );";
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }
}

?>