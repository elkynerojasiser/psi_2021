<?php

class persona {
    private $per_id;
    private $per_nombre;
    private $per_apellido;
    private $per_fecha_nacimiento;
    private $per_salario;
    
    function __construct($per_id,$per_nombre,$per_apellido,$per_fecha_nacimiento,$per_salario) {
        $this->per_id = $per_id;
        $this->per_nombre = $per_nombre;
        $this->per_apellido = $per_apellido;
        $this->per_fecha_nacimiento = $per_fecha_nacimiento;
        $this->per_salario = $per_salario;
    }

    function setPerId($per_id) {
        $this->per_id = $per_id;
    }

    function setPerNombre($per_nombre) {
        $this->per_nombre = $per_nombre;
    }

    function setPerApellido($per_apellido) {
        $this->per_apellido = $per_apellido;
    }

    function setPerFechaNacimiento($per_fecha_nacimiento) {
        $this->per_fecha_nacimiento = $per_fecha_nacimiento;
    }

    function setPerSalario($per_salario) {
        $this->per_salario = $per_salario;
    }

    function getPerId() {
        return $this->per_id;
    }

    function getPerNombre() {
        return $this->per_nombre;
    }

    function getPerApellido() {
        return $this->per_apellido;
    }

    function getPerFechaNacimiento() {
        return $this->per_fecha_nacimiento;
    }

    function getPerSalario() {
        return $this->per_salario;
    }
}