<?php 

date_default_timezone_set('America/Argentina/Buenos_Aires');

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

    public function cargarProducto($producto) {
        $this->aProductos[] = $producto;
        $this->subtotal += $producto->precio;
        $this->total += $producto->calcularPrecioConIva();
    }

    public function calcularTotalConDescuento() {
        return $this->total * (1 - $this->cliente->descuento);
    }

    public function imprimirTicket() {
        echo "<tr><th scope=\"row\">Fecha</th><td>" . date("d/m/Y H:i:s") . "</td></tr>";
        echo "<tr><th scope=\"row\">DNI</th><td>" . $this->cliente->dni . "</td></tr>";
        echo "<tr><th scope=\"row\">Nombre</th><td>" . $this->cliente->nombre . "</td></tr>";
        echo "<tr><th scope=\"col\" colspan=\"2\">Productos:</th></tr>";
        foreach ($this->aProductos as $prod) {
            echo "<tr><td>" . $prod->nombre . "</td><td>$" . number_format($prod->precio, 2, ",", ".") . "</td></tr>";
        }
        echo "<tr><th scope=\"row\">Subtotal s/IVA:</th><td>$" . number_format($this->subtotal, 2, ",", ".") . "</td></tr>";
        echo "<tr><th scope=\"row\">TOTAL:</th><td>$" . number_format($this->calcularTotalConDescuento(), 2, ",", ".") . "</td></tr>";
    }
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

// $cliente1->imprimir();
// $producto1->imprimir();
// $producto2->imprimir();

// print_r($carrito);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container mt-3">
        <div class="row">
            <div class="col-md-5">
                <table class="table border">
                    <thead>
                        <th scope="col" colspan="2" class="text-center">ECO MARKET</th>
                    </thead>
                    <tbody>
                        <?php $carrito->imprimirTicket(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>