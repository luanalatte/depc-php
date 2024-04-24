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

    public function imprimir() {}
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

    public function imprimir() {}
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
