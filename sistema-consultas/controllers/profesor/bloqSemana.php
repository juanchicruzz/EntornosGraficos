<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");

    if(isset($_POST['bloqSemana_consulta'])){
        $ConsultaRepository = new ConsultaRepository();
        $fechaInicio = $_POST['StartDate'];
        $fechaFin = $_POST['EndDate'];
        $motivo = $_POST['motivo'];
        $idProfesor = $_POST['idProfesor'];

        $consultas = $ConsultaRepository->getConsultasByDates('Activa',$idProfesor,$fechaInicio,$fechaFin);

        if($consultas -> num_rows == 0){
            $_SESSION['message'] = "No se encontraron consultas para bloquear entre las fechas seleccionadas";
            $_SESSION['message_type'] = "warning";
            header("Location: " . REDIR_VIEWS . "/profesor/ConsultaBloquearSemana.php");
            exit;
        }

      
        $result_query = $ConsultaRepository->bloqConsultasByDates($motivo,$idProfesor,$fechaInicio, $fechaFin); 
        if(!$result_query){
            die("Update query failed");
        }
        $_SESSION['message'] = "Consultas bloqueadas exitosamente";
        $_SESSION['message_type'] = "warning";
        header("Location: " . REDIR_VIEWS . "/profesor/ConsultaBloquearSemana.php");
        exit;
    }
