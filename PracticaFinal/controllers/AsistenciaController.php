<?php
require_once 'models/Asistencia.php';

class AsistenciaController {
    private $asistencia;

    public function __construct() {
        $this->asistencia = new Asistencia();
    }

    // Mostrar todas las asistencias
    public function index() {
        $stmt = $this->asistencia->read();
        $asistencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total = $this->asistencia->count();
        
        include 'views/asistencias/index.php';
    }

    // Mostrar formulario para crear nueva asistencia
    public function create() {
        include 'views/asistencias/create.php';
    }

    // Procesar creación de nueva asistencia
    public function store() {
        if($_POST) {
            $this->asistencia->estudiante = $_POST['estudiante'];
            $this->asistencia->hora = $_POST['hora'];
            $this->asistencia->fecha = $_POST['fecha'];
            $this->asistencia->estado = $_POST['estado'];
            $this->asistencia->observaciones = $_POST['observaciones'];

            if($this->asistencia->create()) {
                header("Location: index.php?success=1");
                exit();
            } else {
                $error = "Error al crear la asistencia";
                include 'views/asistencias/create.php';
            }
        }
    }

    // Mostrar formulario para editar asistencia
    public function edit($id) {
        $this->asistencia->id = $id;
        if($this->asistencia->readOne()) {
            include 'views/asistencias/edit.php';
        } else {
            header("Location: index.php?error=not_found");
            exit();
        }
    }

    // Procesar actualización de asistencia
    public function update($id) {
        if($_POST) {
            $this->asistencia->id = $id;
            $this->asistencia->estudiante = $_POST['estudiante'];
            $this->asistencia->hora = $_POST['hora'];
            $this->asistencia->fecha = $_POST['fecha'];
            $this->asistencia->estado = $_POST['estado'];
            $this->asistencia->observaciones = $_POST['observaciones'];

            if($this->asistencia->update()) {
                header("Location: index.php?updated=1");
                exit();
            } else {
                $error = "Error al actualizar la asistencia";
                include 'views/asistencias/edit.php';
            }
        }
    }

    // Eliminar asistencia
    public function delete($id) {
        $this->asistencia->id = $id;
        if($this->asistencia->delete()) {
            header("Location: index.php?deleted=1");
            exit();
        } else {
            header("Location: index.php?error=delete_failed");
            exit();
        }
    }
}
?>
