<?php

$lstIVA = [10.5, 19, 21, 27];

$iva = 21;
$precioBase = 0;
$precioIVA = 0;
$ivaCantidad = 0;

$bIngresoIVA = false;

$error = "";

if ($_POST) {
    $iva = $_POST["lstIVA"];
    if ($_POST["txtPrecioBase"] != "" && $_POST["txtPrecioIVA"] == "") {
        $precioBase = $_POST["txtPrecioBase"];
        $precioIVA = $precioBase * ($iva / 100 + 1);
    } elseif ($_POST["txtPrecioBase"] == "" && $_POST["txtPrecioIVA"] != "") {
        $precioIVA = $_POST["txtPrecioIVA"];
        $precioBase = $precioIVA / ($iva / 100 + 1);
        $bIngresoIVA = true;
    } else {
        $error = $_POST["txtPrecioBase"] == "" ? "Ingrese un importe." : "Ingrese sólo uno de los importes.";
    }
    $ivaCantidad = $precioIVA - $precioBase;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IVA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container my-3">
        <h1 class="text-center mb-4">Calculadora de IVA</h1>
        <div class="row">
            <div class="col-md-6">
                <?php if ($error != ""): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
                <form action="" method="post" class="form">
                    <div class="mb-3">
                        <label for="lstIVA">IVA:</label>
                        <select name="lstIVA" id="lstIVA" class="form-select" style="max-width: fit-content;">
                            <?php foreach ($lstIVA as $v): ?>
                                <option value="<?php echo $v; ?>" <?php if ($v == $iva) { echo "selected";} ?>>
                                    <?php echo $v; ?>%
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txtPrecioBase">Importe sin IVA:</label>
                        <input class="form-control" type="text" name="txtPrecioBase" id="txtPrecioBase" value="<?php echo !$bIngresoIVA && $precioBase != 0 ? $precioBase : "" ?>">
                    </div>
                    <div class="mb-3">
                        <label for="txtPrecioIVA">Importe con IVA:</label>
                        <input class="form-control" type="text" name="txtPrecioIVA" id="txtPrecioIVA" value="<?php echo $bIngresoIVA && $precioIVA != 0 ? $precioIVA : "" ?>">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">CALCULAR</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table border">
                    <tbody>
                        <tr>
                            <th scope="row">IVA:</th>
                            <td><?php echo $iva; ?>%</td>
                        </tr>
                        <tr>
                            <th scope="row">Precio sin IVA:</th>
                            <td>$<?php echo $precioBase; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Precio con IVA:</th>
                            <td>$<?php echo $precioIVA; ?></td>
                        </tr>
                        <tr>
                            <th scope="row">IVA cantidad:</th>
                            <td>$<?php echo $ivaCantidad; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>