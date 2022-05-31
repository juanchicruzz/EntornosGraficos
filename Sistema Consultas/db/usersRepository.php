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
        return $this->getResults($query);
    }

    function getUserById($id){
        return $this->
        getOneById(
            self::ENTITY,
            self::IDENTIFIER,
            $id);
    }

    function getUserByEmail($email){
        $query = "SELECT * FROM ".self::ENTITY
            ." WHERE email = '".$email."' ;" ;
            return $this->getResults($query);
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

    function updateUser($email, $legajo, $idUsuario){
        $query = "UPDATE ".self::ENTITY." SET "
        ."email='$email', legajo='$legajo'"
        ." WHERE ".self::IDENTIFIER. "=$idUsuario;"; 
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    function deleteUser($idUsuario){
        $query = "DELETE FROM ".self::ENTITY
        ." WHERE ".self::IDENTIFIER. "=$idUsuario;"; 
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo("Error: ".$conn->error);
        }
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }
}

?>