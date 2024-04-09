<?php

// Punto 1: Consecutivos del 1 al 100
for ($i = 1; $i <= 100; $i++) {
    echo $i . "<br>";
}

// Punto 2. Solo pares
for ($i = 2; $i <= 100; $i+=2) {
    echo $i . "<br>";
}

// Punto 3. Interrumpir cuando el número llegue a 60
for ($i = 2; $i <= 100; $i+=2) {
    echo $i . "<br>";
    if ($i == 60) {
        break;
    }
}
