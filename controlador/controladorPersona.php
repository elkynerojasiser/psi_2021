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
                $persona = new persona(
                    $row->per_id,
                    $row->per_nombre,
                    $row->per_apellido,
                    $row->per_fecha_nacimiento,
                    $row->per_salario
                );
                // $persona->setPerId($row->per_id);
                // $persona->setPerNombre($row->per_nombre);
                // $persona->setPerApellido($row->per_apellido);
                // $persona->setPerFechaNacimiento($row->per_fecha_nacimiento);
                // $persona->setPerSalario($row->per_salario);
                array_push($resultado,$persona);
            }
            $this->conexion = null;
        }catch(PDOException $e){
            echo "Falló la conexión " . $e->getMessage();
        }

        return $resultado;
    }

    function crear($persona){
        try{
            $resultado = [];
            $sql = "insert into persona values (?,?,?,?,?)";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $persona->getPerId(),
                $persona->getPerNombre(),
                $persona->getPerApellido(),
                $persona->getPerFechaNacimiento(),
                $persona->getPerSalario()
            ));
            if($ps->rowCount() > 0){
                $mensaje = "Se creó la persona correctamente";
                $type = "success";
            }else{
                $mensaje = "No se pudo crear la persona";
                $type = "error";
            }
            $this->conexion = null;
        }catch(PDOException $e){
            $mensaje = "Error al crear la persona " .$e->getMessage(); 
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        return $resultado;
    }
}