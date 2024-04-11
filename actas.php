<?php

function promediar($aNumeros) {
    $total = 0;
    foreach ($aNumeros as $num) {
        $total += $num;
    }
    return $total / count($aNumeros);
}

$aAlumnos = [];

$aAlumnos[] = [
    "nombre" => "Juan Perez",
    "aNotas" => [9, 8]
];

$aAlumnos[] = [
    "nombre" => "Ana Valle",
    "aNotas" => [4, 9]
];

$aAlumnos[] = [
    "nombre" => "Gonzalo Roldán",
    "aNotas" => [7, 6]
];

$sumClase = 0;

$notasPorAlumno = 2;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actas</title>
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
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h5>Promedio de la cursada: <?php echo number_format($sumClase / count($aAlumnos), 2, ","); ?></h5>
    </main>
</body>
</html>