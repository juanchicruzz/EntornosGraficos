<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");
require_once(DIR_HEADER);
require_once(DIR_SECURITY);
Security::verifyUser("1");

$consultaRepository = new ConsultaRepository();
$profesor = $_GET['p'];
$materia = $_GET['m'];
$carrera = $_GET['c'];

$consultas = $consultaRepository->getConsultasByPrimaryKey($profesor, $materia, $carrera);
$detalles = $consultaRepository->getDetallesParaInscripcion($profesor, $materia, $carrera)->fetch_array();

?>




<script type="text/javascript" charset="utf8" src="tablas/crearTablaInscripcion.js"></script>
<script>
    crearTabla()
</script>

<SCRIPT>
    var exampleModal = document.getElementById('inscribirModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var idconsulta = button.getAttribute('data-bs-whatever')
    console.log(idconsulta)
    exampleModal.querySelector('#idConsulta').value = idconsulta;
})
</SCRIPT>

<div class="container">
    <div class="row">
        <h1>Inscripcion a Consulta</h1>
        <div class="col-md-6 bg-light border">
            <br>
            <h3><?= $detalles['materia'] . " - " . $detalles['carrera'] ?> </h3>
            <h4><i>Profesor/a: <?= $detalles['profesor'] ?></i></h4>
        </div>
    </div>
    <br><br>

    <div class="row">
        <div class="col-md-12">
            <table id="tablaInscripcion" class="display table table-striped table-hover" id="table_id">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Modalidad</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Inscribirse</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($consultas->num_rows == 0) {
                        echo "<tr><td width:100%>No hay consultas disponibles</td></tr>";
                    } else {
                        while ($row = $consultas->fetch_array()) { ?>
                            <tr>
                                <td><?=Utils::convertirFechaFromSQL($row['fecha']) ?></td>
                                <td><?=$row['estado'] ?></td>
                                <td><?=$row['modalidad'] ?></td>
                                <td><?=$row['ubicacion'] ?></td>
                                <td><?=$row['horario'] ?></td>
                                <?php if ($row['estado'] == "Bloqueada") {
                                    echo '<td align="center"><a role="link" aria-disabled="true"><i class="fas fa-user-check" style="color:grey;"></i></a></td>';
                                } else { ?>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inscribirModal" data-bs-whatever="<?=$row['idConsulta']?>">
                                            <i class="fas fa-user-check"></i>
                                        </button>

                                        <div class="modal fade" id="inscribirModal" tabindex="-1" aria-labelledby="inscribirModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Inscribirse a consulta</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="<?= REDIR_CONTROLLERS ?>/inscripciones/generarInscripcion.php">
                                                            <div class="mb-3">
                                                                <input id="idConsulta" readonly></p>
                                                                <p><strong><?=Utils::convertirFechaFromSQL($row['fecha'])?></strong></p>
                                                                <p><strong> Modalidad: </strong><?=$row['modalidad']?> - <?=$row['horario']?> hs.</p>
                                                                <?php if($row['ubicacion'] != 'No definido') echo "<p><strong>Ubicacion: </strong>".$row['ubicacion']."</p>" ?>
                                                                <label for="motivoConsulta" class="col-form-label">Motivo de consulta:</label>
                                                                <textarea class="form-control" name="motivo" id="motivoConsulta" style="resize:none" rows="3"></textarea>
                                                                <input type="hidden" name="p" value=<?=$profesor?>>
                                                                <input type="hidden" name="m" value=<?=$materia?>>
                                                                <input type="hidden" name="c" value=<?=$carrera?>>
                                                                <input type="hidden" name="f" value=<?=$row['fecha']?>>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary" name="inscribir_btn">Inscribirse</button>
                                                    </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                <?php  } ?>
                            </tr>
                    <?php
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<br><br><br><br><br><br><br><br><br>


<?php include(DIR_FOOTER); ?>