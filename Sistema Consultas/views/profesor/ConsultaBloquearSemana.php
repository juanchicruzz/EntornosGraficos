<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_SECURITY);
Security::verifyUserIsProfessor();

include(DIR_HEADER);
?>

<script type="text/javascript" charset="utf8" src="tablas/crearTablaInscripcion.js"></script>
<script>
    crearTabla()
</script>

<div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Bloquear Consultas</h1>
        </div>
    </div>
    <form action="<?= REDIR_CONTROLLERS . "/profesor/editConsulta.php" ?>" method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6 border p-3  bg-light ">
                <div class="form-group mb-3">Fecha Inicio
                <input id="StartDate" class="form-control" type="date" />
                </div>
                <div class="form-group mb-3">Fecha Fin
                <input id="EndDate" class="form-control" type="date" onchange="validaFecha()"/>
                </div>
                <input class="btn btn-success btn-block" type="submit" id="editConsulta" name="edit_consulta" value="Guardar Cambios">


            </div>
        </div>
    </form>
</div>

<br><br><br><br><br><br><br><br><br>

<script>

function validaFecha() {
    var startDate = document.getElementById("StartDate").value;
    var endDate = document.getElementById("EndDate").value;

    if ((Date.parse(startDate) <= Date.parse(endDate))) {
        alert("End date should be greater than Start date");
        document.getElementById("EndDate").value = "";
    }
};


</script>

<?php include(DIR_FOOTER); ?>