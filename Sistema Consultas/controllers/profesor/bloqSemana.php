<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");

    if(isset($_POST['bloqSemana_consulta'])){
        $ConsultaRepository = new ConsultaRepository();
        $fechaInicio = $_POST['StartDate'];
        $fechaFin = $_POST['EndDate'];
        $motivo = $_POST['motivo'];
        $idProfesor = $_POST['idProfesor'];
        echo $fechaInicio . " " . $fechaFin;

      
        $result_query = $ConsultaRepository->bloqConsultasByDates($motivo,$idProfesor,$fechaInicio, $fechaFin); 
        if(!$result_query){
            die("Update query failed");
        }
        $_SESSION['message'] = "Consultas bloqueadas exitosamente";
        $_SESSION['message_type'] = "warning";
        header("Location: " . REDIR_VIEWS . "/profesor/ConsultaBloquearSemana.php");
        exit;
    }
