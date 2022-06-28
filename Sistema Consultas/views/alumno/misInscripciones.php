<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/inscripcionRepository.php");
require_once(DIR_SECURITY);
Security::verifyUser("1");

require_once(DIR_HEADER);

$InscripcionRepository = new InscripcionRepository();
$inscripciones = $InscripcionRepository -> getInscripcionesByAlumno($_SESSION['id']);

?>

<script type="text/javascript" charset="utf8" src="../tablas/crearTablaMisInscripciones.js"></script>
<script> crearTabla() </script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<div class="container">
    <div class="row">
        <h1>Mis Inscripciones </h1>
    </div>
    <?php
            if(isset($_SESSION['message'])){
        ?>
            <div class="alert alert-<?=$_SESSION['message_type']?>
                alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>    
        <?php
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
        ?>

    <br><br>
    <div class="row">
        <div class="col-md-12">
            <table id="tablaConsultas" class="display table table-striped table-hover" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">ID consulta</th>
                        <th scope="col">Motivo Consulta</th>
                        <th scope="col">Fecha Inscripcion</th>
                        <th scope="col">DAR DE BAJA</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($inscripciones->num_rows == 0) {
                        echo "<tr><td colspan='5'>Aún no te inscribiste a ninguna consulta</td></tr>";
                    } else {
                        while ($row = $inscripciones->fetch_array()) { ?>
                            <tr>
                                
                                <td><?= $row['idConsulta'] ?></td>
                                <td><?= $row['motivoConsulta'] ?></td>
                                <td><?= $row['fechaInscripcion'] ?></td>
                                <td><a href="#" class="">
                                        <i class="fas fa-circle-minus" style="color:red;"></i>
                                    </a></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<br><br><br><br>


<?php include(DIR_FOOTER); ?>

