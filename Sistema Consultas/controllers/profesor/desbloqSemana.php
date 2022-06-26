<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");

    if(isset($_POST['desbloqSemana_consulta'])){
        $ConsultaRepository = new ConsultaRepository();
        $fechaInicio = $_POST['StartDate'];
        $fechaFin = $_POST['EndDate'];
        $idProfesor = $_POST['idProfesor'];
        echo $fechaInicio . " " . $fechaFin;

      
        $result_query = $ConsultaRepository->desbloqConsultasByDate($idProfesor,$fechaInicio, $fechaFin); 
        if(!$result_query){
            die("Update query failed");
        }
        $_SESSION['message'] = "Consultas desbloqueadas exitosamente";
        $_SESSION['message_type'] = "success";
        header("Location: " . REDIR_VIEWS . "/profesor/ConsultasBloqueadas.php");
        exit;
    }
