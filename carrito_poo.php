<?php 

date_default_timezone_set('America/Argentina/Buenos_Aires');

class Cliente {
    private $dni;
    private $nombre;
    private $correo;
    private $telefono;
    private $descuento;

    public function getDNI() { return $this->dni; }
    public function setDNI($valor) { $this->dni = $valor; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($valor) { $this->nombre = $valor; }

    public function getCorreo() { return $this->correo; }
    public function setCorreo($valor) { $this->correo = $valor; }

    public function getTelefono() { return $this->telefono; }
    public function setTelefono($valor) { $this->telefono = $valor; }

    public function getDescuento() { return $this->descuento; }
    public function setDescuento($valor) { $this->descuento = $valor; }

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
    private $cod;
    private $nombre;
    private $precio;
    private $descripcion;
    private $iva;

    public function getCod() { return $this->cod; }
    public function setCod($valor) { $this->cod = $valor; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($valor) { $this->nombre = $valor; }

    public function getPrecio() { return $this->precio; }
    public function setPrecio($valor) { $this->precio = $valor; }

    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($valor) { $this->descripcion = $valor; }

    public function getIVA() { return $this->iva; }
    public function setIVA($valor) { $this->iva = $valor; }

    public function __construct($cod) {
        $this->cod = $cod;
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
    private $cliente;
    private $aProductos;
    private $subtotal;
    private $total;

    public function __construct($cliente) {
        $this->cliente = $cliente;
        $this->aProductos = [];
        $this->subtotal = 0;
        $this->total = 0;
    }

    public function cargarProducto($producto) {
        $this->aProductos[] = $producto;
        $this->subtotal += $producto->getPrecio();
        $this->total += $producto->calcularPrecioConIva();
    }

    public function calcularTotalConDescuento() {
        return $this->total * (1 - $this->cliente->getDescuento());
    }

    public function imprimirTicket() {
        echo "<tr><th scope=\"row\">Fecha</th><td>" . date("d/m/Y H:i:s") . "</td></tr>";
        echo "<tr><th scope=\"row\">DNI</th><td>" . $this->cliente->getDNI() . "</td></tr>";
        echo "<tr><th scope=\"row\">Nombre</th><td>" . $this->cliente->getNombre() . "</td></tr>";
        echo "<tr><th scope=\"col\" colspan=\"2\">Productos:</th></tr>";
        foreach ($this->aProductos as $prod) {
            echo "<tr><td>" . $prod->getNombre() . "</td><td>$" . number_format($prod->getPrecio(), 2, ",", ".") . "</td></tr>";
        }
        echo "<tr><th scope=\"row\">Subtotal s/IVA:</th><td>$" . number_format($this->subtotal, 2, ",", ".") . "</td></tr>";
        echo "<tr><th scope=\"row\">TOTAL:</th><td>$" . number_format($this->calcularTotalConDescuento(), 2, ",", ".") . "</td></tr>";
    }
}

//Programa
$cliente1 = new Cliente();
$cliente1->setDni("34765456");
$cliente1->setNombre("Bernabé");
$cliente1->setCorreo("bernabe@gmail.com");
$cliente1->setTelefono("+541188598686");
$cliente1->setDescuento(0.1);

$producto1 = new Producto("AB8767");
$producto1->setNombre("Notebook 15\" HP");
$producto1->setDescripcion("Esta es una computadora HP");
$producto1->setPrecio(30800);
$producto1->setIva(10.5);

$producto2 = new Producto("QWR579");
$producto2->setNombre("Heladera Whirlpool");
$producto2->setDescripcion("Esta es una heladera no frost");
$producto2->setPrecio(76000);
$producto2->setIva(21);

$carrito = new Carrito($cliente1);
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