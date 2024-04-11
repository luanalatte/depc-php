<?php 

session_start();

// if (isset($_SESSION["aClientes"])) {
//     $aClientes = $_SESSION["aClientes"];
// } else {
//     $aClientes = [];
// }

// Null coalescing operator
$aClientes = $_SESSION["aClientes"] ?? [];

if ($_POST) {
    if(isset($_POST["btnDelete"])) {
        session_destroy();
        $aClientes = [];
    } else {
        $nombre = $_POST["txtNombre"];
        $dni = $_POST["txtDNI"];
        $telefono = $_POST["txtTelefono"];
        $edad = $_POST["txtEdad"];

        $aClientes[] = [
            "nombre" => $nombre,
            "dni" => $dni,
            "telefono" => $telefono,
            "edad" => $edad
        ];

        $_SESSION["aClientes"] = $aClientes;
    }
}

if (isset($_GET["pos"]) && $_GET["pos"] >= 0) {
    unset($aClientes[$_GET["pos"]]);

    if (isset($_SESSION["aClientes"])) {
        $_SESSION["aClientes"] = $aClientes;
    }

    header("Location: clientes_session.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row gx-5">
            <div class="col-12 my-4 text-center">
                <h1>Tabla de clientes</h1>
            </div>
            <div class="col-md-4">
                <form action="" method="post" class="form d-inline">
                    <div class="mb-3">
                        <label class="form-label" for="txtNombre">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ingrese el nombre y apellido" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="txtDNI">DNI:</label>
                        <input type="number" name="txtDNI" id="txtDNI" class="form-control" placeholder="11111111">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="txtTelefono">Telefono:</label>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" placeholder="1111111111">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="txtEdad">Edad:</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control" placeholder="99">
                    </div>
                    <input type="submit" name="btnSend" value="Enviar" class="btn btn-primary">
                </form>
                <form action="" method="post" class="d-inline">
                    <input type="submit" name="btnDelete" value="Eliminar todo" class="btn btn-danger">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th scope="col" class="border">Nombre</th>
                            <th scope="col" class="border">DNI</th>
                            <th scope="col" class="border">Teléfono</th>
                            <th scope="col" class="border">Edad</th>
                            <th scope="col" class="border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aClientes as $id => $cliente): ?>
                        <tr>
                            <td class="border"><?php echo $cliente["nombre"]; ?></td>
                            <td class="border"><?php echo $cliente["dni"]; ?></td>
                            <td class="border"><?php echo $cliente["telefono"]; ?></td>
                            <td class="border"><?php echo $cliente["edad"]; ?></td>
                            <td class="border">
                                <a href="?pos=<?php echo $id; ?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>