<?php 

$aPriorities = ["Alta", "Media", "Baja"];
$aUsers = ["Ana", "Bernabé", "Daniela"];
$aStatus = ["Sin Asignar", "Asignado", "En proceso", "Terminado"];

if (file_exists("tasks.json")) {
    $aTasks = json_decode(file_get_contents("tasks.json"), true);
} else {
    $aTasks = [];
}

if ($_POST) {
    if (isset($_POST["btnDelete"])) {
        //Delete row
        if (($pos = $_POST["pos"] ?? -1) >= 0) {
            unset($aTasks[$pos]);
            file_put_contents("tasks.json", json_encode($aTasks));

            unset($pos); // Force reset form (alternatively, don't set $pos when deleting)
        }
    } elseif (isset($_POST["btnEdit"])) {
        //Select
        if (($pos = $_POST["pos"] ?? -1) >= 0) {
            $priority = $aTasks[$pos]["priority"] ?? -1;
            $user = $aTasks[$pos]["user"] ?? -1;
            $status = $aTasks[$pos]["status"] ?? -1;
            $title = $aTasks[$pos]["title"] ?? "";
            $desc = $aTasks[$pos]["desc"] ?? "";
        }
    } elseif (isset($_POST["btnSend"])) {
        if (!isset($_POST["lstPriority"], $_POST["lstUsers"], $_POST["lstStatus"], $_POST["txtTitle"])) {
            $error = "Algo salió mal. Verifica que los datos ingresados son correctos.";
        } else {
            $priority = $_POST["lstPriority"];
            $user = $_POST["lstUsers"];
            $status = $_POST["lstStatus"];
            $title = $_POST["txtTitle"];
            $desc = $_POST["txtDescription"];

            if (($pos = $_POST["pos"] ?? -1) >= 0) {
                //Update
                $aTasks[$pos] = [
                    "priority" => $priority,
                    "user" => $user,
                    "status" => $status,
                    "title" => $title,
                    "desc" => $desc,
                    "date" => $aTasks[$pos]["date"] ?? ""
                ];

                // Force reset form
                unset($pos, $priority, $user, $status, $title, $desc);
            } else {
                //Insert
                $aTasks[] = [
                    "priority" => $priority,
                    "user" => $user,
                    "status" => $status,
                    "title" => $title,
                    "desc" => $desc,
                    "date" => date("d/m/Y")
                ];
            }

            file_put_contents("tasks.json", json_encode($aTasks));
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <script src="https://kit.fontawesome.com/6d7e9baaed.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-3">
                <h1>Gestor de tareas</h1>
            </div>
            <div class="col-12">
                <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 mb-5">
                <form action="" method="post" class="form row gy-2">
                    <input type="hidden" name="pos" id="pos" value="<?php echo $pos ?? ""; ?>">
                    <div class="col-sm-4">
                        <label for="" class="form-label">Prioridad</label>
                        <select name="lstPriority" id="lstPriority" class="form-control" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <?php foreach($aPriorities as $id => $p): ?>
                            <option value="<?php echo $id; ?>" <?php echo ($priority ?? -1) == $id ? "selected" : ""; ?>><?php echo $p; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="form-label">Usuario</label>
                        <select name="lstUsers" id="lstUsers" class="form-control" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <?php foreach($aUsers as $id => $u): ?>
                            <option value="<?php echo $id; ?>" <?php echo ($user ?? -1) == $id ? "selected" : ""; ?>><?php echo $u; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="" class="form-label">Estado</label>
                        <select name="lstStatus" id="lstStatus" class="form-control" required>
                            <option value="" disabled selected>Seleccionar</option>
                            <?php foreach($aStatus as $id => $s): ?>
                            <option value="<?php echo $id; ?>" <?php echo ($status ?? -1) == $id ? "selected" : ""; ?>><?php echo $s; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Título</label>
                        <input type="text" name="txtTitle" id="txtTitle" class="form-control" required value="<?php echo $title ?? ""; ?>">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Descripción</label>
                        <textarea name="txtDescription" id="txtDescription" rows="3" class="form-control"><?php echo $desc ?? ""; ?></textarea>
                    </div>
                    <div class="col-12 text-center">
                        <input type="submit" value="ENVIAR" name="btnSend" class="btn btn-primary">
                        <a href="." class="btn btn-secondary">CANCELAR</a>
                    </div>
                </form>
            </div>
            <div class="col-12">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aTasks as $id => $task): ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $task["date"] ?? ""; ?></td>
                            <td><?php echo $task["title"] ?? ""; ?></td>
                            <td><?php echo $aPriorities[$task["priority"] ?? -1] ?? "<em>Desconocida<em>"; ?></td>
                            <td><?php echo $aUsers[$task["user"] ?? -1] ?? "<em>Desconocido</em>"; ?></td>
                            <td><?php echo $aStatus[$task["status"] ?? -1] ?? "<em>Desconocido<em>"; ?></td>
                            <td>
                                <form action="" method="post" class="form">
                                    <input type="hidden" name="pos" value="<?php echo $id; ?>">
                                    <button type="submit" name="btnEdit" class="btn btn-secondary">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    <button type="submit" name="btnDelete" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
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