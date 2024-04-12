<?php

function promediar($aNumeros) {
    $total = 0;
    foreach ($aNumeros as $num) {
        $total += $num;
    }
    return $total / count($aNumeros);
}

$notasPorAlumno = 3;

session_start();

$aAlumnos = $_SESSION["aAlumnos"] ?? [];

if ($_POST) {
    $nombre = $_POST["txtNombre"];
    $aNotas = [];
    for ($i=1; $i <= $notasPorAlumno; $i++) {
        $aNotas[] = (int)$_POST["txtNota".$i];
    }

    $aAlumnos[] = [
        "nombre" => $nombre,
        "aNotas" => $aNotas
    ];

    $_SESSION["aAlumnos"] = $aAlumnos;
}

if (isset($_GET["pos"]) && $_GET["pos"] >= 0) {
    unset($aAlumnos[$_GET["pos"]]);

    if (isset($_SESSION["aAlumnos"])) {
        $_SESSION["aAlumnos"] = $aAlumnos;
    }

    header("Location: actas_session.php");
}

$sumClase = 0;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas Session</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <h1 class="text-center mb-4">Actas</h1>
        <table class="table table-hover border">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Alumno</th>
                    <?php for ($i=1; $i <= $notasPorAlumno; $i++): ?>
                    <th scope="col">Nota <?php echo $i; ?></th>
                    <?php endfor; ?>
                    <th scope="col">Promedio</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aAlumnos as $id => $alumno):
                    $promedio = promediar($alumno["aNotas"]);
                    $sumClase += $promedio;
                    $ultimaNota = array_pop($alumno["aNotas"]);
                ?>
                <tr>
                    <th scope="row"><?php echo $id + 1; ?></th>
                    <td><?php echo $alumno["nombre"]; ?></td>
                    <?php foreach ($alumno["aNotas"] as $nota): ?>
                    <td><?php echo $nota; ?></td>
                    <?php endforeach; ?>
                    <td colspan="<?php echo $notasPorAlumno - count($alumno["aNotas"]); ?>"><?php echo $ultimaNota; ?></td>
                    <td><?php echo number_format($promedio, 2, ","); ?></td>
                    <td><a href="?pos=<?php echo $id; ?>">Eliminar</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="" method="post" class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="txtNombre" class="form-label">Nombre:</label>
                    <input type="text" name="txtNombre" id="txtNombre" class="form-control" required>
                </div>
                <?php for ($i=1; $i <= $notasPorAlumno; $i++):
                    $fieldName = "txtNota".$i;
                ?>
                <div class="col">
                    <label for="<?php echo $fieldName; ?>" class="form-label">Nota <?php echo $i; ?>:</label>
                    <input type="number" name="<?php echo $fieldName; ?>" id="<?php echo $fieldName; ?>" class="form-control" placeholder="0">
                </div>
                <?php endfor; ?>
                <div class="col d-flex align-items-end">
                    <input type="submit" value="Añadir" class="btn btn-primary">
                </div>
            </div>
        </form>
        <?php if (count($aAlumnos) > 0): ?>
        <h5>Promedio de la cursada: <?php echo number_format($sumClase / count($aAlumnos), 2, ","); ?></h5>
        <?php endif; ?>
    </main>
</body>
</html>