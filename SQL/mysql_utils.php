<?php

class MySQLConnector {

private static $HOST;
private static $DB_NAME;
private static $USERNAME;
private static $PASSWORD;
// ESTO ES UN SINGLETON
private static $instance;

private function __construct()
{   
    self::$HOST = "localhost";
    self::$DB_NAME = "";
    self::$USERNAME = "";
    self::$PASSWORD = "";
}

private function connectToDB(){
    $connection = mysqli_connect(self::$HOST, self::$USERNAME, self::$PASSWORD);
    if(!$connection){
        echo "La conexion no tuvo exito";
    } else {
        return $connection;
    };
}

private function selectDatabase($connection, $db_name){
    // Si no se pasan parametros, se toma como default la constante DB_NAME
    if (empty($db_name)){
        $db_name = self::$DB_NAME;
    }
    return mysqli_select_db($connection, $db_name);
}

public static function getInstance(){
    // IMPLEMENTANDO SINGLETON
    if(!isset(self::$instance)){
        self::$instance = new MySQLConnector();
    }
    return self::$instance;
}

public function getConnection(){
    $connection = self::$instance->connectToDB();
    self::$instance->selectDatabase($connection, "");
    return $connection;
}

public function closeConnection($CONN){
    if(isset($CONN)){
        mysqli_close($CONN);
    }
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