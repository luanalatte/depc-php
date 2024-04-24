<?php 

class Cliente {
    public $dni;
    public $nombre;
    public $correo;
    public $telefono;
    public $descuento;

    public function __construct() {
        $this->descuento = 0;
    }

    public function imprimir() {
        echo "Nombre: " . $this->nombre . "<br>";
        echo "DNI: " . $this->dni . "<br>";
        echo "Correo: " . $this->correo . "<br>";
        echo "Teléfono: " . $this->telefono . "<br>";
        echo "Descuento: " . $this->descuento . "%<br>";
        echo "<br>";
    }
}

class Producto {
    public $cod;
    public $nombre;
    public $precio;
    public $descripcion;
    public $iva;

    public function __construct() {
        $this->precio = 0;
        $this->iva = 0;
    }

    public function calcularPrecioConIva() {
        return $this->precio * (1 + $this->iva / 100);
    }

    public function imprimir() {
        echo "COD: " . $this->cod . "<br>";
        echo "Producto: " . $this->nombre . "<br>";
        echo "Descripcion: " . $this->descripcion . "<br>";
        echo "Precio (sin IVA): $" . $this->precio . "<br>";
        echo "Precio + IVA (" . $this->iva .  "%): $" . $this->calcularPrecioConIva() . "<br>";
        echo "<br>";
    }
}

class Carrito {
    public $cliente;
    public $aProductos;
    public $subtotal;
    public $total;

    public function __construct() {
        $this->aProductos = [];
        $this->subtotal = 0;
        $this->total = 0;
    }

    public function cargarProducto() {}
    public function imprimirTicket() {}
}

//Programa
$cliente1 = new Cliente();
$cliente1->dni = "34765456";
$cliente1->nombre = "Bernabé";
$cliente1->correo = "bernabe@gmail.com";
$cliente1->telefono = "+541188598686";
$cliente1->descuento = 0.1;

$producto1 = new Producto();
$producto1->cod = "AB8767";
$producto1->nombre = "Notebook 15\" HP";
$producto1->descripcion = "Esta es una computadora HP";
$producto1->precio = 30800;
$producto1->iva = 10.5;

$producto2 = new Producto();
$producto2->cod = "QWR579";
$producto2->nombre = "Heladera Whirlpool";
$producto2->descripcion = "Esta es una heladera no frost";
$producto2->precio = 76000;
$producto2->iva = 21;

$carrito = new Carrito();
$carrito->cliente = $cliente1;
$carrito->cargarProducto($producto1);
$carrito->cargarProducto($producto2);

$cliente1->imprimir();
$producto1->imprimir();
$producto2->imprimir();

$carrito->imprimirTicket();