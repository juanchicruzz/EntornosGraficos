<?php
require_once("mySQLConnector.php");
include_once("utils.php");

 class Repository {

    protected static function DBInstance(){
        return MySQLConnector::getInstance();
    }

    // SELECT STATEMENTS
    protected function getResults($selectQuery){
        $conn = $this->DBInstance()->getConnection();
        $result = mysqli_query($conn, $selectQuery);
        $this->DBInstance()->closeConnection($conn);
        return $result;
    }

    // INSERT, UPDATE, DELETE STATEMENTS
    public function executeQuery($query, array $params){
        $conn = $this->DBInstance()->getConnection();
        $stmt = $conn->stmt_init();
        if($stmt->prepare($query)){
            Utils::customBindParams($params, $stmt);
            $stmt->execute();
        };
        $this->DBInstance()->closeConnection($conn);
    }

    //Common Functions
    function getAll($table){
        $query = "SELECT * FROM ".$table.";";
        return $this->getResults($query);
    }

    function getOneById($entity, $identifier, $id){
        $query = "SELECT * FROM ".$entity
        ." WHERE ".$identifier." = ".$id. ";";
        return $this->getResults($query);
    }

    
}

?>