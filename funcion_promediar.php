<?php

function promediar($aNumeros) {
    $total = 0;
    foreach ($aNumeros as $num) {
        $total += $num;
    }
    return $total / count($aNumeros);
}

$aNotas = [8, 4, 5, 3, 9, 1];
$aSueldos = [800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800];

echo "El promedio de notas es: " . promediar($aNotas) . "<br>";
echo "El promedio de sueldos es: " . promediar($aSueldos) . "<br>";

?>