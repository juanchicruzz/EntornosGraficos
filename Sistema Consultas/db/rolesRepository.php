<?php
require_once("abstractRepository.php");

class RoleRepository extends Repository{

    private const ENTITY = "roles";
    private const IDENTIFIER = "idRol";
    // private static $DBConnector;

    function getAllRoles(){
        $query = "
            SELECT * FROM ".self::ENTITY. ";";
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    function getRoleById($id){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE ".self::IDENTIFIER.
            " = ".$id. ";" ;
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    function getRoleByDescription($description){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE descripcionRol = '".$description 
            ."' ;" ;
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }
}

?>