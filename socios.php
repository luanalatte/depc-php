<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Tarjeta {
    const VISA = "VISA";
    const AMEX = "American Express";
    const MASTERCARD = "Mastercard";

    private $nombreTitular;
    private $numero;
    private $fechaEmision;
    private $fechaVto;
    private $tipo;
    private $cvv;

    public function __construct($tipo, $numero, $fechaEmision, $fechaVto, $cvv) {
        $this->tipo = $tipo;
        $this->numero = $numero;
        $this->fechaEmision = $fechaEmision;
        $this->fechaVto = $fechaVto;
        $this->cvv = $cvv;
    }
}

class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    // public function __construct() {}

    public function __get(string $propiedad) { return $this->$propiedad; }
    public function __set(string $propiedad, $valor) { $this->$propiedad = $valor; }
}

class Socio extends Persona {
    private $aTarjetas;
    private $bActivo;
    private $fechaAlta;
    private $fechaBaja;

    public function __construct() {
        $this->aTarjetas = [];
        $this->bActivo = true;
        $this->fechaAlta = date("d/m/Y");
    }

    public function agregarTarjeta(Tarjeta $tarjeta) {
        $this->aTarjetas[] = $tarjeta;
    }

    public function darDeBaja(string $fecha) {
        $this->bActivo = false;
        $this->fechaBaja = $fecha;
    }

    public function imprimir() {}

    public function __get(string $propiedad) { return $this->$propiedad; }
    public function __set(string $propiedad, $valor) { $this->$propiedad = $valor; }
}

//Desarrollo del programa
$socio1 = new Socio();
$socio1->dni = "35123789";
$socio1->nombre = "Ana Valle";
$socio1->correo = "ana@correo.com";
$socio1->celular = "1156781234";
$tarjeta1 = new Tarjeta(Tarjeta::VISA, "4223750778806383", "03/2022", "01/2023", "275");
$tarjeta2 = new Tarjeta(Tarjeta::AMEX, "347572886751981", "05/2020", "07/2027", "136");
$tarjeta3 = new Tarjeta(Tarjeta::MASTERCARD, "5415620495970009", "06/2021", "12/2024", "742");
$socio1->agregarTarjeta($tarjeta1);
$socio1->agregarTarjeta($tarjeta2);
$socio1->agregarTarjeta($tarjeta3);

$socio2 = new Socio();
$socio2->dni = "48456876";
$socio2->nombre = "Bernabe Paz";
$socio2->correo = "bernabe@correo.com";
$socio2->celular = "1145326787";
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::VISA, "4969508071710316", "03/2021", "08/2025", "865"));
$socio2->agregarTarjeta(new Tarjeta(Tarjeta::MASTERCARD, "5149107669552238", "07/2020", "04/2025", "554"));
$socio2->darDeBaja("18/05/2023");

print_r($socio1);
print_r($socio2);
