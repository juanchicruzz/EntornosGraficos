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

    function getConsultasByPrimaryKey($profesor, $materia, $carrera){
        $query = "SELECT c.fecha, c.estado, c.modalidad, 
        ifNull(c.ubicacion, 'No definido') as ubicacion, 
        ifNull(c.horarioAlternativo, pm.horarioFijo) as horario, c.idConsulta
        FROM consultas c
        INNER JOIN profesor_materia pm 
			ON c.idCarrera = pm.idCarrera AND c.idProfesor = pm.idProfesor AND c.idMateria = pm.idMateria
        WHERE c.idCarrera = $carrera AND c.idProfesor = $profesor AND c.idMateria = $materia;";
        return $this->getResults($query);
    }

    function getConsultasByProfesor($idProfesor){
        $query = "SELECT pm.dia, pm.horarioFijo ,m.descripcionMateria, car.nombreCarrera , pm.idMateria, m.añoCursado, pm.idCarrera, pm.idProfesor
        FROM profesor_materia pm
        INNER JOIN materias m
            ON pm.idMateria = m.idMateria
        INNER JOIN carreras car
            ON pm.idCarrera = car.idCarrera
        WHERE pm.idProfesor = $idProfesor";
        return $this->getResults($query);
    }

    function getDetallesParaInscripcion($idProfesor, $idMateria, $idCarrera){
        $query = "SELECT concat(u.nombre, ' ', u.apellido) as profesor, 
        m.descripcionMateria as materia, c.nombreCarrera as carrera
        FROM profesor_materia pm
        INNER JOIN usuarios u 
            ON u.idUsuario = pm.idProfesor
        INNER JOIN materias m 
            ON m.idMateria = pm.idMateria
        INNER JOIN carreras c
            ON c.idCarrera = pm.idCarrera
        WHERE pm.idProfesor = $idProfesor 
        AND pm.idMateria = $idMateria 
        AND pm.idCarrera = $idCarrera";
        return $this->getResults($query);
    }

    function updateConsulta($modalidad, $horarioAlt,  $ubicacion, $idConsulta){
        $query = 'UPDATE '.self::ENTITY.' SET '
            .' modalidad=?, horarioAlternativo=?, ubicacion=?'
            .' WHERE '.self::IDENTIFIER. '=?'; 
        return $this->executeQuery(
            $query, 
            [$modalidad, $horarioAlt,  $ubicacion, $idConsulta]);
    }
}

?>