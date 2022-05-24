<?php

class MySQLConnector {

private const HOST = "localhost";
private const DB_NAME = "";
private const USERNAME = "";
private const PASSWORD = "";
private $CONNECTION;

public function __construct()
{
    $this->HOST = "localhost";
    $this->DB_NAME = "";
    $this->USERNAME = "";
    $this->PASSWORD = "";
}

private function connectToDB(){
    $connection = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD);
    if(!$connection){
        echo "La conexion no tuvo exito";
    } else {
        $CONNECTION = $connection;
        return $connection;
    };
}

private function selectDatabase($connection, $db_name=self::DB_NAME){
    // Si no se pasan parametros, se toma como default la constante DB_NAME
    return mysqli_select_db($connection, $db_name);
}

public function getConnection(){
    if(!isset($CONNECTION)){
        $CONNECTION = $this->connectToDB();
    }
    $this->selectDatabase($CONNECTION);
    return $CONNECTION;
}

public function closeConnection(){
    if(isset($CONNECTION)){
        mysqli_close($CONNECTION);
    }
}

function getAll($table){
    $query = "SELECT * FROM ".$table.";";
    $conn = $this->getConnection();
    $result = mysqli_query($conn, $query);
    $this->closeConnection();
    return $result;
}

function getOneById($entity, $id){
    $query = "SELECT * FROM ".$entity
    ." WHERE idUsuario = ".$id. ";" ;
    $conn = $this->getConnection();
    $result = mysqli_query($conn, $query);
    $this->closeConnection();
    return $result;
}

}

?>