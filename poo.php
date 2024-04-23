<?php

class Persona {
    public $documento;
    public $nombre;
    public $edad;
    public $nacionalidad;

    public function __construct() {}

    public function imprimir() {
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "<br>";
    }
}

class Alumno extends Persona {
    public $legajo;
    public $notaPortfolio;
    public $notaPHP;
    public $notaProyecto;

    public function __construct() {
        $this->notaPortfolio = 0.0;
        $this->notaPHP = 0.0;
        $this->notaProyecto = 0.0;
    }

    public function imprimir() {
        echo "Alumno: " . $this->nombre . "<br>";
        echo "Documento: " . $this->documento . "<br>";
        echo "Nota del Portfolio: " . $this->notaPortfolio . "<br>";
        echo "Promedio: " . $this->calcularPromedio() . "<br>";
        echo "<br>";
    }

    public function calcularPromedio() {
        return ($this->notaPortfolio + $this->notaPHP + $this->notaProyecto) / 3;
    }
}

class Docente extends Persona {
    const ESPECIALIDAD_WP = "Wordpress";
    const ESPECIALIDAD_ECO = "Economía aplicada";
    const ESPECIALIDAD_BBDD = "Base de datos";

    public $especialidad;

    public function __construct() {}

    public function imprimir() {
        echo "Docente: " . $this->nombre . "<br>";
        echo "Especialidad: " . $this->especialidad . "<br>";
        echo "<br>";
    }

    public function imprimirEspecialidadesHabilitadas() {
        echo "Las especialidades posibles para un docente son:<br>";
        echo self::ESPECIALIDAD_WP . "<br>";
        echo self::ESPECIALIDAD_ECO . "<br>";
        echo self::ESPECIALIDAD_BBDD . "<br>";
        echo "<br>";
    }
}

//Programa
$alumno1 = new Alumno();
$alumno1->nombre = "Ana Valle";
$alumno1->edad = 60;
$alumno1->documento = "87678675-7";
$alumno1->imprimir();

$alumno2 = new Alumno();
$alumno2->nombre = "Juan Gonzalez";
$alumno2->edad = 28;
$alumno2->documento = "75626742-7";
$alumno2->imprimir();

$docente1 = new Docente();
$docente1->nombre = "Gabriela Paz";
$docente1->especialidad = Docente::ESPECIALIDAD_ECO;

$docente1->imprimirEspecialidadesHabilitadas();