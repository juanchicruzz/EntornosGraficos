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
        ifNull(c.URL, 'No aplica') as url, 
        ifNull(c.horarioAlternativo, 'No aplica') as horarioAlternativo, c.idConsulta
        FROM consultas c
        WHERE idCarrera = $carrera AND idProfesor = $profesor AND idMateria = $materia;";
        return $this->getResults($query);
    }

    function getConsultasBloqueadasByProfesor($idProfesor){
        $query = "SELECT c.fecha, c.estado, c.modalidad, 
        ifNull(c.URL, 'No aplica') as url, 
        ifNull(c.horarioAlternativo, 'No aplica') as horarioAlternativo, c.idConsulta
        FROM consultas c
        WHERE idProfesor = $idProfesor AND estado = 'Bloqueada';";
        return $this->getResults($query);
    }

    function getConsultasActivasByProfesor($idProfesor){
        $query = "SELECT c.fecha, c.estado, c.modalidad, 
        ifNull(c.URL, 'No aplica') as url, 
        ifNull(c.horarioAlternativo, 'No aplica') as horarioAlternativo, c.idConsulta
        FROM consultas c
        WHERE idProfesor = $idProfesor AND estado <> 'Bloqueada';";
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

    function updateConsulta($modalidad, $horarioAlt,  $URL, $idConsulta){
        $query = 'UPDATE '.self::ENTITY.' SET '
            .' modalidad=?, horarioAlternativo=?, URL=?'
            .' WHERE '.self::IDENTIFIER. '=?'; 
        return $this->executeQuery(
            $query, 
            [$modalidad, $horarioAlt,  $URL, $idConsulta]);
    }

    function bloquearConsulta($motivo,$idConsulta){
        $query = 'UPDATE '.self::ENTITY.' SET '
            .' estado=?,'
            .' motivoCancelacion=?'
            .' WHERE '.self::IDENTIFIER. '=?'; 
        return $this->executeQuery(
            $query, 
            ['Bloqueada',$motivo,$idConsulta]);
    }

    function desbloquearConsulta($idConsulta){
        $query = 'UPDATE '.self::ENTITY.' SET '
            .' estado=?, motivoCancelacion=?'
            .' WHERE '.self::IDENTIFIER. '=?'; 
        return $this->executeQuery(
            $query, 
            ['Activa',Null,$idConsulta]);
    }

    function bloqConsultasByDates($motivo,$idProfesor,$fechaInicio, $fechaFin){
        $query = "UPDATE ".self::ENTITY." SET estado='Bloqueada' , motivoCancelacion=? ".
         "WHERE idProfesor=? AND ". 
         "fecha BETWEEN ? AND ? ";
        return $this->executeQuery(
            $query,
            [$motivo,$idProfesor,$fechaInicio,$fechaFin]
        );
    }

    function desbloqConsultasByDate($idProfesor,$fechaInicio, $fechaFin){
        $query = "UPDATE ".self::ENTITY." SET estado='Activa' , motivoCancelacion=NULL ".
         "WHERE idProfesor=? AND ". 
         "fecha BETWEEN ? AND ? ";
        return $this->executeQuery(
            $query,
            [$idProfesor,$fechaInicio,$fechaFin]
        );
    }
}

?>