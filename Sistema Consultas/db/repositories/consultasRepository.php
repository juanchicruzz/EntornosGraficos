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
        m.descripcionMateria, car.nombreCarrera , pm.idProfesor, pm.idMateria, pm.idCarrera 
		FROM profesor_materia pm 
        INNER JOIN usuarios u 
            ON pm.idProfesor = u.idUsuario
        INNER JOIN materias m 
            ON pm.idMateria = m.idMateria
        INNER JOIN carreras car 
            ON pm.idCarrera = car.idCarrera
        ORDER BY car.nombreCarrera DESC";
        return $this->getResults($query);
    }

    function getConsultasByCarrera($idCarrera){
        $query = "SELECT pm.dia, pm.horarioFijo, concat(u.nombre, ' ', u.apellido) as 'profesor', 
        m.descripcionMateria, car.nombreCarrera , pm.idProfesor, pm.idMateria, pm.idCarrera 
		FROM profesor_materia pm 
        INNER JOIN usuarios u 
            ON pm.idProfesor = u.idUsuario
        INNER JOIN materias m 
            ON pm.idMateria = m.idMateria
        INNER JOIN carreras car 
            ON pm.idCarrera = car.idCarrera
        WHERE pm.idCarrera = $idCarrera";
        return $this->getResults($query);
    }

    function getConsultasByAño($añoCarrera){
        $query = "SELECT pm.dia, pm.horarioFijo, concat(u.nombre, ' ', u.apellido) as 'profesor', 
        m.descripcionMateria, car.nombreCarrera , pm.idProfesor, pm.idMateria, pm.idCarrera 
		FROM profesor_materia pm 
        INNER JOIN usuarios u 
            ON pm.idProfesor = u.idUsuario
        INNER JOIN materias m 
            ON pm.idMateria = m.idMateria
        INNER JOIN carreras car 
            ON pm.idCarrera = car.idCarrera
        WHERE m.añoCursado = $añoCarrera";
        return $this->getResults($query);
    }
}

?>