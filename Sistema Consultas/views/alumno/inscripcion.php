<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");
require_once(DIR_REPOSITORIES . "/inscripcionRepository.php");
require_once(DIR_HEADER);
require_once(DIR_SECURITY);
Security::verifyUser("1");

$inscripcionRepository = new InscripcionRepository();
$consultaRepository = new ConsultaRepository();
$profesor = $_GET['p'];
$materia = $_GET['m'];
$carrera = $_GET['c'];

$consultas = $consultaRepository->getConsultasByPrimaryKey($profesor, $materia, $carrera);
$detalles = $consultaRepository->getDetallesParaInscripcion($profesor, $materia, $carrera)->fetch_array();

$inscripcionesArray = array();
$inscripciones = $inscripcionRepository->getIdsInscripcionesByAlumno($_SESSION['id']);
if ($inscripciones->num_rows > 0) {
    while ($row = $inscripciones->fetch_array()) {
        array_push($inscripcionesArray, $row['idConsulta']);
    }
}

function yaEstaInscripto($inscripcionesArray, $idConsulta)
{
    if (count($inscripcionesArray) == 0) {
        return false;
    }
    if (in_array($idConsulta, $inscripcionesArray)) {
        return true;
    }
    return false;
}

?>




<script type="text/javascript" charset="utf8" src="../tablas/crearTablaInscripcion.js"></script>
<script>
    crearTabla()
</script>

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
                                <td><?= $row['dia'] . " " . Utils::convertirFechaFromSQL($row['fecha']) ?></td>
                                <td><?= $row['estado'] ?></td>
                                <td><?= $row['modalidad'] ?></td>
                                <td><?= $row['ubicacion'] ?></td>
                                <td><?= $row['horario'] ?></td>
                                <?php if ($row['estado'] == "Bloqueada") {
                                    echo '<td style="color:grey;><a role="link" aria-disabled="true"><i class="fas fa-user-check"></i> (Bloqueada)</a></td>';
                                    continue;
                                }
                                if (yaEstaInscripto($inscripcionesArray, $row['idConsulta'])) {
                                    echo '<td style="color:green">Ya estas inscripto. <a href="misInscripciones.php">Ver Aqui.</a></td>';
                                    continue;
                                }

                                ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inscribirModal" data-bs-fecha="<?= Utils::convertirFechaFromSQL($row['fecha']) ?>" data-bs-modalidad="<?= $row['modalidad'] ?>" data-bs-horario="<?= $row['horario'] ?>" data-bs-idconsulta="<?= $row['idConsulta'] ?>">
                                        <i class="fas fa-user-check"></i>
                                    </button>
                                </td>
                        <?php
                        }
                    }
                        ?>
                            </tr>
                </tbody>
            </table>

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
                                    <input hidden id="idConsultaModal" name="idConsulta">

                                    <p id="fechaModal" style="font-weight:bold;"></p>
                                    <p id="modalidadModal" style="font-weight:bold;"></p>
                                    <label for="motivoConsulta" class="col-form-label">Motivo de consulta:</label>
                                    <textarea class="form-control" name="motivo" id="motivoConsulta" style="resize:none" rows="3"></textarea>


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
        </div>
    </div>
</div>
</div>

<br><br><br><br><br><br><br><br><br>

<SCRIPT>
    var inscribirModal = document.getElementById('inscribirModal');
    inscribirModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var fecha = button.getAttribute('data-bs-fecha');
        var modalidad = button.getAttribute('data-bs-modalidad');
        var horario = button.getAttribute('data-bs-horario');
        var idConsulta = button.getAttribute('data-bs-idconsulta');
        inscribirModal.querySelector('#fechaModal').textContent = fecha;
        inscribirModal.querySelector('#modalidadModal').textContent = modalidad + " - " + horario;
        document.getElementById('idConsultaModal').value = idConsulta;
    });
</SCRIPT>

<?php include(DIR_FOOTER); ?>