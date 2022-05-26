<?php
require_once("mySQLConnector.php");

 class Repository {

    protected static function DBInstance(){
        return MySQLConnector::getInstance();
    }

    //Common Functions
    function getAll($table){
        $query = "SELECT * FROM ".$table.";";
        $conn = $this->getConnection();
        $result = mysqli_query($conn, $query);
        $this->closeConnection();
        return $result;
    }

    function getOneById($entity, $id){
        $query = "SELECT * FROM ".$entity
        ." WHERE id = ".$id. ";" ;
        $conn = $this->getConnection();
        $result = mysqli_query($conn, $query);
        $this->closeConnection();
        return $result;
    }

    
}

?>