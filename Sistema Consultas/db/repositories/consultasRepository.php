<?php
require_once("abstractRepository.php");

class ConsultaRepository extends Repository{

    private const ENTITY = "consultas";
    private const IDENTIFIER = "idConsulta";
    // private static $DBConnector;

    function getConsultaById($id){
        return $this->getOneById(
            self::ENTITY,
            self::IDENTIFIER,
            $id
        );
    }

    function getConsultasGeneral(){
        $query = "SELECT pm.dia, pm.horarioFijo, concat(u.nombre, ' ', u.apellido) as 'profesor', 
        m.descripcionMateria, car.nombreCarrera, c.idConsulta, c.fecha
        FROM consultas c
        INNER JOIN profesor_materia pm 
            ON c.idProfesor = pm.idProfesor AND c.idCarrera = pm.idCarrera AND c.idMateria = pm.idMateria
        INNER JOIN usuarios u 
            ON pm.idProfesor = u.idUsuario
        INNER JOIN materias m 
            ON pm.idMateria = m.idMateria
        INNER JOIN carreras car 
            ON pm.idCarrera = car.idCarrera";
        return $this->getResults($query);
    }
}

?>