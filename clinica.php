<?php

$aPacientes = [];

$aPacientes[] = [
    "dni" => "33.765.012",
    "nombre" => "Ana",
    "apellido" => "Acuña",
    "edad" => 45,
    "peso" => 81.5
];

$aPacientes[] = [
    "dni" => "21.684.385",
    "nombre" => "Gonzalo",
    "apellido" => "Bustamante",
    "edad" => 66,
    "peso" => 79
];

$aPacientes[] = [
    "dni" => "31.418.734",
    "nombre" => "Juan",
    "apellido" => "Irraola",
    "edad" => 28,
    "peso" => 65.4
];

$aPacientes[] = [
    "dni" => "25.205.123",
    "nombre" => "Beatriz",
    "apellido" => "Ocampo",
    "edad" => 50,
    "peso" => 84.2
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h1 class="fw-semibold">Listado de Pacientes</h1>
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <th>DNI</th>
                        <th>Nombre y Apellido</th>
                        <th>Edad</th>
                        <th>Peso</th>
                    </thead>
                    <tbody>
                        <?php foreach ($aPacientes as $paciente) { ?>
                        <tr>
                            <td><?php echo $paciente["dni"]; ?></td>
                            <td><?php echo $paciente["nombre"] . " " . $paciente["apellido"]; ?></td>
                            <td><?php echo $paciente["edad"]; ?></td>
                            <td><?php echo $paciente["peso"]; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>