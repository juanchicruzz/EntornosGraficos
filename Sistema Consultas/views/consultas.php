<?php
include("../partials/header.php");
require_once("../db/repositories/consultasRepository.php");
$consultaRepository = new ConsultaRepository();
$consultas = $consultaRepository->getConsultasGeneral();
if(isset($_GET["carrera"])){
    $consultas = $consultaRepository->getConsultasByCarrera($_GET["carrera"]);
}
if(isset($_GET["a"])){
    $consultas = $consultaRepository->getConsultasByAño($_GET["a"]);
}

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
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>">TODAS</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?carrera=1">ISI</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?carrera=3">IE</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?carrera=4">IM</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?carrera=5">IQ</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?carrera=2">IC</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Año
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?a=1">1°</a></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?a=2">2°</a></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?a=3">3°</a></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?a=4">4°</a></li>
                    <li><a class="dropdown-item" href="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?a=5">5°</a></li>
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
                    <th scope="col">Dia/Hora</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">Materia</th>
                    <th scope="col">Carrera</th>
                    <th scope="col">Inscribirse</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                if($consultas->num_rows == 0){
                    echo "<tr><td colspan='5'>No hay consultas disponibles</td></tr>";
                } else{
                while ($row = $consultas->fetch_array()) { ?>
                    <tr>
                        <td scope="row"><?= strtoupper($row['dia']) . " - " . $row['horarioFijo'] ?></td>
                        <td><?= $row['profesor'] ?></td>
                        <td><?= $row['descripcionMateria'] ?></td>
                        <td><?= $row['nombreCarrera'] ?></td>
                        <td><a href="inscripcion.php?p=<?= $row['idProfesor']?>&m=<?= $row['idMateria']?>&c=<?= $row['idCarrera']?>">
                                <i class="fas fa-user-check"></i>
                            </a></td>
                    </tr>
                <?php } 
                }?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<br><br><br><br><br><br><br><br><br>

<?php include("../partials/footer.php"); ?>