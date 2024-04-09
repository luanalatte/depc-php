<?php

function contar($aArray) {
    $contador = 0;
    foreach ($aArray as $elemento) {
        $contador++;
    }
    return $contador;
}

$aNotas = [9, 8, 9.5, 4, 7, 8];

$aProductos = [];

$aProductos[] = [
    "nombre" => "Smart TV 55\" 4K UHD",
    "marca" => "Hitachi",
    "modelo" => "554KS20",
    "stock" => 60,
    "precio" => 58000
];

$aProductos[] = [
    "nombre" => "Samsung Galaxy A30 Blanco",
    "marca" => "Samsung",
    "modelo" => "Galaxy A30",
    "stock" => 0,
    "precio" => 22000
];

$aProductos[] = [
    "nombre" => "Aire Acondicionado Split F/C Surrey 2900F",
    "marca" => "Surrey",
    "modelo" => "553AIQ1201E",
    "stock" => 5,
    "precio" => 45000
];

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

echo "Cantidad de notas: " . contar($aNotas) . "<br>";
echo "Cantidad de productos: " . contar($aProductos) . "<br>";
echo "Cantidad de pacientes: " . contar($aPacientes) . "<br>";
