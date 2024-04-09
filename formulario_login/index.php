<?php

$error = "";

if (isset($_POST["txtUsuario"]) && isset($_POST["txtClave"])) {
    if ($_POST["txtUsuario"] && $_POST["txtClave"]) {
        header("Location: ./acceso-confirmado.php");
    } else {
        $error = "Solo válido para usuarios registrados";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1>Formulario</h1>
                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        Solo válido para usuarios registrados
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-3">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="txtUsuario" class="form-label">Usuario:</label>
                        <input type="text" name="txtUsuario" id="txtUsuario" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtClave" class="form-label">Clave:</label>
                        <input type="password" name="txtClave" id="txtClave" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">ENVIAR</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>