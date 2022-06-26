<?php
require_once("abstractRepository.php");

class InscripcionRepository extends Repository{

    private const ENTITY = "inscripciones";

    function getAllMaterias(){
        return $this->getAll(self::ENTITY);
    }

    function getInscripcionByConsultaAndAlumno($idConsulta, $idAlumno){
        $query = "
            SELECT * FROM ".self::ENTITY
            ." WHERE idAlumno = '".$idAlumno."' 
            AND idConsulta = '".$idConsulta."';" ;
        return $this->getResults($query);
    }

    function getInscripcionesByAlumno($idAlumno){
        $query = "
            SELECT * FROM ".self::ENTITY
            ." WHERE idAlumno = '".$idAlumno."' ;" ;
        return $this->getResults($query);
    }

    function inscribirAlumnoEnConsulta($idAlumno, $idConsulta, $motivo){
        $query = "INSERT INTO ".self::ENTITY
            ." (idAlumno, idConsulta, motivoConsulta) VALUES (?, ?, ?);" ;
        return $this->executeQuery(
            $query, [$idAlumno, $idConsulta, $motivo]);
    }
}

?>