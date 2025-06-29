<?php
require_once 'config/database.php';

class Asistencia {
    private $conn;
    private $table_name = "asistencias";

    public $id;
    public $estudiante;
    public $hora;
    public $fecha;
    public $estado;
    public $observaciones;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Crear nueva asistencia
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET estudiante=:estudiante, hora=:hora, fecha=:fecha, 
                      estado=:estado, observaciones=:observaciones";

        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->estudiante = htmlspecialchars(strip_tags($this->estudiante));
        $this->hora = htmlspecialchars(strip_tags($this->hora));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->observaciones = htmlspecialchars(strip_tags($this->observaciones));

        // Bind valores
        $stmt->bindParam(":estudiante", $this->estudiante);
        $stmt->bindParam(":hora", $this->hora);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":observaciones", $this->observaciones);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Leer todas las asistencias
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY fecha DESC, hora DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Leer una asistencia por ID
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $this->estudiante = $row['estudiante'];
            $this->hora = $row['hora'];
            $this->fecha = $row['fecha'];
            $this->estado = $row['estado'];
            $this->observaciones = $row['observaciones'];
            return true;
        }
        return false;
    }

    // Actualizar asistencia
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                  SET estudiante=:estudiante, hora=:hora, fecha=:fecha, 
                      estado=:estado, observaciones=:observaciones 
                  WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // Limpiar datos
        $this->estudiante = htmlspecialchars(strip_tags($this->estudiante));
        $this->hora = htmlspecialchars(strip_tags($this->hora));
        $this->fecha = htmlspecialchars(strip_tags($this->fecha));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        $this->observaciones = htmlspecialchars(strip_tags($this->observaciones));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind valores
        $stmt->bindParam(":estudiante", $this->estudiante);
        $stmt->bindParam(":hora", $this->hora);
        $stmt->bindParam(":fecha", $this->fecha);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":observaciones", $this->observaciones);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar asistencia
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Contar total de registros
    public function count() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
}
?>
