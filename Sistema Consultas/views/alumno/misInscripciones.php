<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");
require_once(DIR_SECURITY);
Security::verifyUser("1");

require_once(DIR_HEADER);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Mis inscripciones 


</body>
</html>


<?php
require_once(DIR_FOOTER);
?>