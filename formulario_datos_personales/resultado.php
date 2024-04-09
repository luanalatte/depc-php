<?php

if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $dni = $_POST["txtDNI"];
    $telefono = $_POST["txtTelefono"];
    $edad = $_POST["txtEdad"];
} else {
    header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de formulario</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container mt-4">
        <h1 class="text-center mb-3">Resultado de formulario</h1>
        <table class="table table-hover border">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $dni; ?></td>
                    <td><?php echo $telefono; ?></td>
                    <td><?php echo $edad; ?></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>
</html>