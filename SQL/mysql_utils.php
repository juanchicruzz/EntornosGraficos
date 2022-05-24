<?php

const HOST = "localhost";
const DB_NAME = "";
const USERNAME = "";
const PASSWORD = "";

function connectToDB(){
    $connection = mysqli_connect(HOST, USERNAME, PASSWORD);
    if(!$connection){
        echo "La conexion no tuvo exito";
    } else {
        return $connection;
    };
}

function selectDatabase($connection, $db_name){
    if(!empty($db_name)){
        return mysqli_select_db($connection, $db_name);
    }
    else return mysqli_select_db($connection, DB_NAME);
}

function getAll($table){
    $query = "SELECT * FROM ".$table.";";
    $connection = connectToDB();
    selectDatabase($connection, DB_NAME);
    $result = mysqli_query($connection, $query);
    return $result;
}


?>