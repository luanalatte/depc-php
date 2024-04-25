<?php

class Persona {
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct(string $dni, string $nombre, string $correo, string $celular) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;
    }

    public function __get(string $propiedad) { return $this->$propiedad; }
    public function __set(string $propiedad, $valor) { $this->$propiedad = $valor; }
}

class Alumno extends Persona {
    private $fechaNac;
    private $peso;
    private $altura;
    private $aptoFisico;
    private $presentismo;

    public function __construct(string $dni, string $nombre, string $correo, string $celular, string $fechaNac) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;

        $this->fechaNac = $fechaNac;
        $this->peso = 0.0;
        $this->altura = 0.0;
        $this->aptoFisico = false;
        $this->presentismo = 0.0;
    }
    
    public function setFichaMedica(float $peso, float $altura, bool $aptoFisico) {
        $this->peso = $peso;
        $this->altura = $altura;
        $this->aptoFisico = $aptoFisico;
    }

    public function __get(string $propiedad) { return $this->$propiedad; }
    public function __set(string $propiedad, $valor) { $this->$propiedad = $valor; }
}

class Entrenador extends Persona {
    private $aClases;

    public function __construct(string $dni, string $nombre, string $correo, string $celular) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->celular = $celular;

        $this->aClases = [];
    }

    public function asignarClase(Clase $clase) {
        $this->aClases[] = $clase;
    }
}

class Clase {
    private $nombre;
    private $entrenador;
    private $aAlumnos;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
        $this->aAlumnos = [];
    }

    public function asignarEntrenador(Entrenador $entrenador) {
        $this->entrenador = $entrenador;
        $entrenador->asignarClase($this);
    }

    public function inscribirAlumno(Alumno $alumno) {
        $this->aAlumnos[] = $alumno;
    }

    public function imprimirListado() {
        foreach ($this->aAlumnos as $alumno): ?>
            <tr>
                <td><?= $alumno->dni ?></td>
                <td><?= $alumno->nombre ?></td>
                <td><?= $alumno->correo ?></td>
                <td><?= $alumno->celular ?></td>
            </tr>
        <?php endforeach;
    }

    public function __get(string $propiedad) { return $this->$propiedad; }
    public function __set(string $propiedad, $valor) { $this->$propiedad = $valor; }
}

//Programa
$entrenador1 = new Entrenador("34987789", "Miguel Ocampo", "miguel@mail.com", "11678634");
$entrenador2 = new Entrenador("28987589", "Andrea Zarate", "andrea@mail.com", "11768654");

$alumno1 = new Alumno("40787657", "Dante Montera", "dante@mail.com", "1145362457", "1997-08-28");
$alumno1->setFichaMedica(90, 178, true);
$alumno1->presentismo = 88;

$alumno2 = new Alumno("46766547", "Darío Turchi", "dario@mail.com", "1145632457", "1986-11-21");
$alumno2->setFichaMedica(73, 168, false);
$alumno2->presentismo = 68;

$alumno3 = new Alumno("39765454", "Facundo Fagnano", "facundo@mail.com", "1145632457", "1993-02-06");
$alumno3->setFichaMedica(90, 187, true);
$alumno3->presentismo = 88;

$alumno4 = new Alumno("41687536", "Gastón Aguilar", "gaston@mail.com", "1145632457", "1999-11-02");
$alumno4->setFichaMedica(70, 169, false);
$alumno4->presentismo = 98;

$clase1 = new Clase("Funcional");
$clase1->asignarEntrenador($entrenador1);
$clase1->inscribirAlumno($alumno1);
$clase1->inscribirAlumno($alumno3);
$clase1->inscribirAlumno($alumno4);
// $clase1->imprimirListado();

$clase2 = new Clase("Zumba");
$clase2->asignarEntrenador($entrenador2);
$clase2->inscribirAlumno($alumno1);
$clase2->inscribirAlumno($alumno2);
$clase2->inscribirAlumno($alumno3);
// $clase2->imprimirListado();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha256-PI8n5gCcz9cQqQXm3PEtDuPG8qx9oFsFctPg0S5zb8g=" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center mt-1">
                <h1>Gimnasio</h1>
            </div>
            <div class="col-12 mt-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col" colspan="4">Clase: <?= $clase1->nombre; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" colspan="2">Entrenador:</th>
                            <td colspan="2"><?= $clase1->entrenador->nombre; ?></td>
                        </tr>
                        <tr>
                            <th scope="col" colspan="4">Alumnos Inscritos:</th>
                        </tr>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Celular</th>
                        </tr>
                        <?php $clase1->imprimirListado(); ?>
                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark text-center">
                        <tr>
                            <th scope="col" colspan="4">Clase: <?= $clase2->nombre; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" colspan="2">Entrenador:</th>
                            <td colspan="2"><?= $clase2->entrenador->nombre; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" colspan="4">Alumnos Inscritos:</th>
                        </tr>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Celular</th>
                        </tr>
                        <?php $clase2->imprimirListado(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>