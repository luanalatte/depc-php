<?php

function print_f($variable) {
    if (is_array($variable)) {
        $file = fopen("datos.txt", "w+");
        foreach ($variable as $i) {
            fwrite($file, $i . "\n");
        }
        fclose($file);
    } else {
        file_put_contents("datos.txt", $variable);
    }
}

$aNotas = [8,5,7,0,10];
$msg = "Este es un mensaje";

// print_f($aNotas);
print_f($msg);

?>