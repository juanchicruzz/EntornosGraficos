<?php

require ("config.php");

class MySQLConnector {

private static $DB_HOST;
private static $DB_NAME;
private static $DB_USERNAME;
private static $DB_PASSWORD;
private static $DB_CHARSET;
// ESTO ES UN SINGLETON
private static $INSTANCE;
// luego a implementar Pool de conexiones
// private static $conn = array();
private static $conn;
private static $MAX_CONNECTIONS = 3;
public $CURR_CONNECTIONS;  

private function __construct()
{   
    self::$DB_HOST = DB_HOST;
    self::$DB_NAME = DB_NAME;
    self::$DB_USERNAME = DB_USERNAME;
    self::$DB_PASSWORD = DB_PASSWORD;
    self::$DB_CHARSET = DB_CHARSET;
    $this->CURR_CONNECTIONS = 0;
}

private function createConnection(){
    $connection = mysqli_connect(
        self::$DB_HOST, self::$DB_USERNAME, self::$DB_PASSWORD, self::$DB_NAME);
    mysqli_set_charset($connection, self::$DB_CHARSET);
    if(!$connection){
        echo "La conexion no tuvo exito";
    } else {
        $this->CURR_CONNECTIONS++;
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
    if(!isset(self::$INSTANCE)){
        self::$INSTANCE = new MySQLConnector();
    }
    return self::$INSTANCE;
}

public function getConnection(){
    /*if(isset(self::$conn)){
        echo "Existe una conexion, devolviendola <hr>";
        return self::$conn;
    }
    else{
        
    if($this->CURR_CONNECTIONS < self::$MAX_CONNECTIONS ){
        $this->CURR_CONNECTIONS++;
        $connection = self::$INSTANCE->createConnection();
        return $connection;
    }*/

    if(!isset(self::$conn)){
        self::$conn = self::createConnection();
        // no hace falta seleccionar la db ahora porque la paso como cuarto parametro en la creacion
        // self::selectDatabase(self::$conn, "");
    }
    return self::$conn;
}

public function closeConnection($CONN){
    if(isset($CONN)){
        //echo "Current opened connections: ".$this->CURR_CONNECTIONS;
        mysqli_close($CONN);
        $this->CURR_CONNECTIONS--;
        //echo "Now opened: ".$this->CURR_CONNECTIONS." <hr>";
        self::$conn = null;
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