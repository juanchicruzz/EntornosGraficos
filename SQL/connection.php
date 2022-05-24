<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probando SQL PHP</title>
</head>
<body>
<h1>Conectando a DB</h1>
<hr>

<?php

include "mysql_utils.php";

$result = getAll("usuarios");
$result->data_seek(0);
$rows = $result->fetch_array();
foreach($rows as $key => $value) {
    echo "key: $key | value: $value <hr> ";
}

echo "<hr> <hr>";

$array = mysqli_fetch_assoc( $result );
foreach($array as $key => $value) {
    echo "key: $key | value: $value <hr> ";
}

echo "<hr> <hr>";

$num_rows = mysqli_num_rows($result);
for($i=0; $i<$num_rows; $i++){
    echo "FILA $i <br>";
    $result->data_seek($i);
    $row = mysqli_fetch_assoc( $result );
    foreach($row as $col => $value) {
        echo "Columna: $col | value: $value <hr> ";
    }
}


?>

</body>
</html>