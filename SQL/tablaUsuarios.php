<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
<h1>Conectando a DB</h1>
<hr>

<?php

include "usersRepository.php";

$UserRepository = new UserRepository();
$result = $UserRepository->getAllUsers();
$num_rows = mysqli_num_rows($result);
for($i=0; $i<$num_rows; $i++){
    echo "FILA $i <br>";
    $result->data_seek($i);
    $row = mysqli_fetch_assoc( $result );
    foreach($row as $col => $value) {
        echo "Columna: $col | value: $value <hr> ";
    }
}

$user1 = $UserRepository->getUserById(1);
$row = $user1->fetch_array();
echo "Usuario ID: ".$row['idUsuario']. 
     " Email: ".$row['email'].
     " Legajo: ".$row['legajo'];

echo "<hr> <hr>";

$user2 = $UserRepository->getUserByEmail("josh@gmail.com");
$row2 = $user2->fetch_array();
echo "Usuario ID: ".$row2['idUsuario']. 
     " Email: ".$row2['email'].
     " Legajo: ".$row2['legajo'];


echo "<hr> no se va a poder <hr> ";

// no se va a poder porq ya hay 3 conexiones abiertas
$user3 = $UserRepository->getUserByEmail("joshua@gmail.com");
$row3 = $user3->fetch_array();
echo "Usuario ID: ".$row3['idUsuario']. 
     " Email: ".$row3['email'].
     " Legajo: ".$row3['legajo'];

?>

</body>
</html>