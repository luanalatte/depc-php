<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de datos personales</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha256-3gQJhtmj7YnV1fmtbVcnAV6eI4ws0Tr48bVZCThtCGQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container mt-4">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h1>Formulario de datos personales</h1>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="resultado.php" method="post">
                    <div class="mb-3">
                        <label for="txtNombre" class="form-label">Nombre:</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtDNI" class="form-label">DNI:</label>
                        <input type="text" name="txtDNI" id="txtDNI" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtTelefono" class="form-label">Teléfono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="txtEdad" class="form-label">Edad:</label>
                        <input type="text" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </main>
</body>
</html>