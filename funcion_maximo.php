<?php

function maximo($aNumeros) {
    $max = 0;
    foreach ($aNumeros as $num) {
        if ($num > $max) {
            $max = $num;
        }
    }
    return $max;
}

$aNotas = [8, 4, 5, 3, 9, 1];
$aSueldos = [800.30, 400.87, 500.45, 300, 900.70, 100, 900, 1800];

echo "La nota máxima es: " . maximo($aNotas) . "<br>";
echo "El sueldo máximo es: " . maximo($aSueldos) . "<br>";

?>