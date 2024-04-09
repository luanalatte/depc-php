<?php

function calcularNeto($bruto) {
    return $bruto - ($bruto * 0.17);
}

$aEmpleados = [];
$aEmpleados[] = [ "dni" => 33300123, "nombre" => "David García", "bruto" => 85000.3 ];
$aEmpleados[] = [ "dni" => 40874456, "nombre" => "Ana Del Valle", "bruto" => 90000 ];
$aEmpleados[] = [ "dni" => 67567565, "nombre" => "Andrés Pérez", "bruto" => 100000 ];
$aEmpleados[] = [ "dni" => 75744545, "nombre" => "Victoria Luz", "bruto" => 70000 ];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Listado de empleados</h1>
            </div>
            <div class="col-12 mt-2">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Sueldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $iContador = 0;
                        foreach ($aEmpleados as $empleado) {
                            $iContador++;
                        ?>
                        <tr>
                            <td><?php echo number_format($empleado["dni"], 0, ",", "."); ?></td>
                            <td><?php echo mb_strtoupper($empleado["nombre"], "utf-8"); ?></td>
                            <td><?php echo number_format(calcularNeto($empleado["bruto"]), 2, ",", "."); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <p><?php echo "Cantidad de empleados activos: $iContador"; ?></p>
            </div>
        </div>
    </main>
</body>
</html>