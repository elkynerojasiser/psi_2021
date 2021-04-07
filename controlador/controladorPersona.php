<?php
// include_once '../modelo/conexion.php';
// include_once '../modelo/persona.php';

class controladorPersona{
    private $conexion;

    function __construct(){
        $this->conexion = new conexion();
        $this->conexion->getConexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /* Listar los datos de personas (Read) */
    function listar(){
        try {
            $sql = "select * from persona";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(NULL);
            $resultado = [];
            while($row = $ps->fetch(PDO::FETCH_OBJ)){
                $persona = new persona();
                $persona->setPerId($row->per_id);
                $persona->setPerNombre($row->per_nombre);
                $persona->setPerApellido($row->per_apellido);
                $persona->setPerFechaNacimiento($row->per_fecha_nacimiento);
                $persona->setPerSalario($row->per_salario);
                array_push($resultado,$persona);
            }
            $this->conexion = null;
        }catch(PDOException $e){
            echo "Falló la conexión " . $e->getMessage();
        }

        return $resultado;
    }
}