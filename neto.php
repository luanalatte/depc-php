<?php

function calcularNeto($bruto) {
    return $bruto - ($bruto * 0.17);
}

echo "El sueldo neto es $" . calcularNeto(180000) . "<br>";
echo "El sueldo neto es $" . calcularNeto(200000) . "<br>";