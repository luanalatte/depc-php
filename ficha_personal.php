<?php
    date_default_timezone_set("America/Argentina/Buenos_aires");

    $fecha = date("d/m/Y H:i");
    $nombre = "Luana";
    $apellido = "Passafaro";
    $edad = 24;
    $peliculas = implode("<br>", ["Interstellar", "TRON", "Hotarubi no mori e"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Personal</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row py-2">
            <div class="col-12 text-center">
                <h1 class="fw-semibold">Ficha Personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover border">
                    <tbody>
                        <tr>
                            <th scope="row">Fecha</th>
                            <td><?php echo $fecha; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nombre</th>
                            <td><?php echo $nombre . " " . $apellido; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Edad</th>
                            <td><?php echo $edad; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Películas Favoritas</th>
                            <td><?php echo $peliculas; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>