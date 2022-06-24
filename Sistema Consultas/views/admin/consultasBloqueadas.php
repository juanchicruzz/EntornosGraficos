<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_SECURITY);

// Solo pueden ingresar los admin a esta vista, si es alumno se redirige a login o index
Security::verifyUserIsAdmin();
// 
include(DIR_HEADER)
?>

<script type="text/javascript" charset="utf8" src="../tablas/crearTablaConsultasBloqueadas.js"></script>
<script> crearTabla() </script>

<?php
    include(DIR_REPOSITORIES . "/consultasRepository.php");
?>
    <div class="container p-4">
        <div class="row bg-light border">
            <h1>Consultas Bloqueada</h1>   
        </div>
        
       <table id= "tablaConsultasBloqueadas" class="table table-bordered">
           <thead class="thead-dark">
               <th scope="col">Profesor</th>
               <th scope="col">Fecha</th>
               <th scope="col">Materia</th>
               <th scope="col">Carrera</th>
               <th scope="col">Modalidad</th>
               <th scope="col">Motivo Cancelacion</th>
           </thead>
           <tbody>
            <?php
                $ConsultaRepo = new ConsultaRepository();
                $result = $ConsultaRepo->getConsultasBloqueadas();
                while($row = $result->fetch_array()){
            ?>

                <tr>
                    <td><?=$row['profesor']?></td>
                    <td><?=$row['fecha']?></td>
                    <td><?=$row['descripcionMateria']?></td>
                    <td><?=$row['nombreCarrera']?></td>
                    <td><?=$row['modalidad']?></td>
                    <td><?=$row['motivoCancelacion']?></td>
                </tr>
            <?php
                }
            ?>
           </tbody>
       </table>
    </div>

<?php include(DIR_FOOTER);?>