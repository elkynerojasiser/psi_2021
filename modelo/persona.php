<?php

class persona {
    private $per_id;
    private $per_nombre;
    private $per_apellido;
    private $per_fecha_nacimiento;
    private $per_salario;
    private $per_dependencia_id;
    private $dependencia;
    
    function __construct() {
        
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

    function setPerDependenciaId($per_dependencia_id) {
        $this->per_dependencia_id = $per_dependencia_id;
    }

    function setDependencia($dependencia){
        $this->dependencia = $dependencia;
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

    function getPerDependenciaId() {
        return $this->per_dependencia_id;
    }

    function getDependencia() {
        return $this->dependencia;
    }
}