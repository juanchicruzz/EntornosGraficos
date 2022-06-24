<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
    require_once(DIR_REPOSITORIES . "/inscripcionRepository.php");
    require_once(DIR_REPOSITORIES . "/consultasRepository.php");

    if(isset($_POST['inscribir_btn'])){
        $InscripcionRepository = new InscripcionRepository();
        $ConsultaRepository = new ConsultaRepository();
        extract($_POST);
        $consulta = $ConsultaRepository->getIdConsultaFromPKandFecha($p, $m, $c, $f);
        $idConsulta = $consulta->fetch_array()['idConsulta'];   
        $idAlumno = $_SESSION['id'];
        $result_query = $InscripcionRepository->inscribirAlumnoEnConsulta($idAlumno, $idConsulta, $motivo); 
        if(!$result_query){
            die("Insert query failed");
        }
        $_SESSION['message'] = "Usuario inscripto exitosamente";
        $_SESSION['message_type'] = "success";
        header("Location: " . REDIR_VIEWS .  "/alumno/misInscripciones.php");

    }

?>