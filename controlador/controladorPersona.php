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

    function buscar($per_id){
        try{
            
            $sql = "select * from persona where per_id = ?";
            $ps = $this->conexion->getConexion()->prepare($sql);
            $ps->execute(array(
                $per_id
            ));
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
            echo "Falló la conexión " .$e->getMessage();
        }
        return $resultado;
    }

    function actualizar($persona){
        $resultado = [];
        $sql = "update persona set per_nombre=?, per_apellido=?, per_fecha_nacimiento=?, per_salario=? where per_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $persona->getPerNombre(),
            $persona->getPerApellido(),
            $persona->getPerFechaNacimiento(),
            $persona->getPerSalario(),
            $persona->getPerId()
        ));
        if($ps->rowCount() > 0){
            $mensaje = "Se actualizó la persona correctamente";
            $type = "success";
        }else{
            $mensaje = "No se pudo actualizar la persona";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->conexion = null;
        return $resultado;
    }

    function eliminar($persona) {
        $resultado = [];
        $sql = "delete from persona where per_id=?";
        $ps = $this->conexion->getConexion()->prepare($sql);
        $ps->execute(array(
            $persona->getPerId()
        ));
        if($ps->rowCount() > 0){
            $mensaje = "Se eliminó la persona correctamente";
            $type = "success";
        }else{
            $mensaje = "No se pudo eliminar la persona";
            $type = "error";
        }
        $resultado = [
            "mensaje" => $mensaje,
            "type"    => $type
        ];
        $this->conexion = null;
        return $resultado;
    }
}