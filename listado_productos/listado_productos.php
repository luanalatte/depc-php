<?php

$aProductos = [];

$aProductos[] = [
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
];

$aProductos[] = [
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
];

$aProductos[] = [
    "nombre" => "Aire Acondicionado Split F/C Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row py-2">
            <div class="col-12">
                <h1 class="text-center fw-semibold">Listado de Productos</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $aProductos[0]["nombre"]; ?></td>
                            <td><?php echo $aProductos[0]["marca"]; ?></td>
                            <td><?php echo $aProductos[0]["modelo"]; ?></td>
                            <td><?php echo $aProductos[0]["stock"] > 10 ? "Hay stock" : ($aProductos[0]["stock"] > 0 ? "Poco stock" : "Sin stock"); ?></td>
                            <td><?php echo "\$" . $aProductos[0]["precio"]; ?></td>
                            <td>
                                <button class="btn btn-primary"<?php if(!$aProductos[0]["stock"] > 0) { echo "disabled"; } ?>>Comprar</button>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[1]["nombre"]; ?></td>
                            <td><?php echo $aProductos[1]["marca"]; ?></td>
                            <td><?php echo $aProductos[1]["modelo"]; ?></td>
                            <td><?php echo $aProductos[1]["stock"] > 10 ? "Hay stock" : ($aProductos[1]["stock"] > 0 ? "Poco stock" : "Sin stock"); ?></td>
                            <td><?php echo "\$" . $aProductos[1]["precio"]; ?></td>
                            <td>
                                <button class="btn btn-primary"<?php if(!$aProductos[1]["stock"] > 0) { echo "disabled"; } ?>>Comprar</button>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo $aProductos[2]["nombre"]; ?></td>
                            <td><?php echo $aProductos[2]["marca"]; ?></td>
                            <td><?php echo $aProductos[2]["modelo"]; ?></td>
                            <td><?php echo $aProductos[2]["stock"] > 10 ? "Hay stock" : ($aProductos[2]["stock"] > 0 ? "Poco stock" : "Sin stock"); ?></td>
                            <td><?php echo "\$" . $aProductos[2]["precio"]; ?></td>
                            <td>
                                <button class="btn btn-primary"<?php if(!$aProductos[2]["stock"] > 0) { echo "disabled"; } ?>>Comprar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>