<?php

class Persona {
    protected $documento;
    protected $nombre;
    protected $edad;
    protected $nacionalidad;

    public function getDocumento() { return $this->documento; }
    public function setDocumento($valor) { $this->documento = $valor; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($valor) { $this->nombre = $valor; }

    public function getEdad() { return $this->edad; }
    public function setEdad($valor) { $this->edad = $valor; }

    public function getNacionalidad() { return $this->nacionalidad; }
    public function setNacionalidad($valor) { $this->nacionalidad = $valor; }

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function imprimir() {
        echo "Documento: " . $this->documento . "<br>";
        echo "Nombre: " . $this->nombre . "<br>";
        echo "Edad: " . $this->edad . "<br>";
        echo "Nacionalidad: " . $this->nacionalidad . "<br>";
        echo "<br>";
    }
}

class Alumno extends Persona {
    private $legajo;
    private $notaPortfolio;
    private $notaPHP;
    private $notaProyecto;

    public function getLegajo() { return $this->legajo; }
    public function setLegajo($valor) { $this->legajo = $valor; }

    public function __construct($nombre) {
        $this->nombre = $nombre;
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

    private $especialidad;

    public function __get($propiedad) {
        return $this->$propiedad;
    }

    public function __set($propiedad, $valor) {
        $this->$propiedad = $valor;
    }

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

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
$alumno1 = new Alumno("Ana Valle");
$alumno1->setEdad(60);
$alumno1->setDocumento("87678675-7");
$alumno1->imprimir();

$alumno2 = new Alumno("Juan Gonzalez");
$alumno2->setEdad(28);
$alumno2->setDocumento("75626742-7");
$alumno2->imprimir();

$docente1 = new Docente("Gabriela Paz");
$docente1->especialidad = Docente::ESPECIALIDAD_ECO;

$docente1->imprimirEspecialidadesHabilitadas();