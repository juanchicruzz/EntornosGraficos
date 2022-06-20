<?php
include("../partials/header.php");
require_once("../db/repositories/consultasRepository.php");
$consultaRepository = new ConsultaRepository();
$consultas = $consultaRepository->getConsultasGeneral();
?>

<div class="container">
    <div class="row">
        <h1>Horarios de Consulta</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Carrera
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item active" aria-current="true" href="#">ISI</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">IE</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">IM</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">IQ</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">IC</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Año
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">1°</a></li>
                    <li><a class="dropdown-item" href="#">2°</a></li>
                    <li><a class="dropdown-item" href="#">3°</a></li>
                    <li><a class="dropdown-item" href="#">4°</a></li>
                    <li><a class="dropdown-item" href="#">5°</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Materia
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                    <!--- MANEJAR LOGICA DE QUE NO SELECCIONE MATERIAS HASTA QUE NO
                    ESTE SELECCIONADO UN AÑO, SINO CARGARIAMOS DEMASIADAS MATERIAS!-->
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Profesor
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                    <!--- cuando se selecciona un profesor, se deberian eliminar los filtros
                    de año calculo y de carrera tambien. No es obligatorio elegir previamente
                    una materia para poder elegir un profesor cualquiera. !-->
                </ul>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Dia/Hora</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Inscribirse</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $consultas->fetch_array()) { ?>
                    <tr>
                        <td><?= $row['fecha'] ?></td>
                        <td scope="row"><?= strtoupper($row['dia']) . " - " . $row['horarioFijo'] ?></td>
                        <td><?= $row['profesor'] ?></td>
                        <td><?= $row['descripcionMateria'] ?></td>
                        <td><?= $row['nombreCarrera'] ?></td>
                        <td><a href="inscripcion.php?id=<?= $row['idConsulta'] ?>">
                                <i class="fas fa-user-check"></i>
                            </a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<br><br><br><br><br><br><br><br><br>

<?php include("../partials/footer.php"); ?>