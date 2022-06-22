<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_REPOSITORIES . "/consultasRepository.php");

    if(isset($_POST['edit_consulta'])){
        $ConsultaRepository = new ConsultaRepository();
        $horarioAlt = strval($_POST['horarioAlternativo']);
        $modalidad = $_POST['modalidad'];
        if($_POST['URL']=="0"){
            $URL = null;
        }else{
            $URL = $_POST['URL'];
        }
        $idConsulta = $_POST['idConsulta'];
        $result_query = $ConsultaRepository->updateConsulta($modalidad, $horarioAlt, $URL, $idConsulta); 
        if(!$result_query){
            die("Update query failed");
        }
        $_SESSION['message'] = "Consulta actualizado exitosamente";
        $_SESSION['message_type'] = "warning";
        header("Location: " . REDIR_VIEWS . "/profesor/ConsultasProfesor.php");
    }
