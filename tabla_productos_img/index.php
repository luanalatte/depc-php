<?php

$aProductos = [];
$aProductos[] = [
    "img" => "impresora.webp",
    "nombre" => "Impresora HP1102w",
    "cantidad" => 20
];

$aProductos[] = [
    "img" => "pizarra.png",
    "nombre" => "Pizarra digital",
    "cantidad" => 25
];

$aProductos[] = [
    "img" => "notebook.avif",
    "nombre" => "Notebook 15\"",
    "cantidad" => 15
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Stock</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
    <style>
        table .product {
            width: 120px;
            height: 80px;
            text-align: center;
        }

        table .product img {
            height: 100%;
        }
    </style>
</head>
<body>
    <main class="container py-3">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-semibold">Listado de stock</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-3">
                <table class="table border table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($aProductos as $id => $producto) {
                            $nombre = htmlspecialchars($producto["nombre"]);
                            $img = htmlspecialchars($producto["img"]);
                            $cantidad = $producto["cantidad"];

                            $total += $cantidad;
                        ?>
                        <tr>
                            <td><?php echo $id + 1; ?></td>
                            <td>
                                <div class="product border p-1">
                                    <img src="img/<?php echo $img; ?>" alt="<?php echo $nombre; ?>">
                                </div>
                            </td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $cantidad; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end">Total</td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
</body>
</html>