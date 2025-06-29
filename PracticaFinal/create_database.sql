-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS asistencias_db;
USE asistencias_db;

-- Crear la tabla asistencias
CREATE TABLE IF NOT EXISTS asistencias (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    estudiante VARCHAR(255) NOT NULL,
    hora TIME NOT NULL,
    fecha DATE NOT NULL,
    estado ENUM('PRESENTE', 'AUSENTE', 'TARDE', 'JUSTIFICADO') DEFAULT 'PRESENTE',
    observaciones TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insertar datos de ejemplo
INSERT INTO asistencias (estudiante, hora, fecha, estado, observaciones) VALUES
('Ana María González', '08:15', '2024-01-15', 'PRESENTE', 'Llegó puntual'),
('Carlos Eduardo Pérez', '08:25', '2024-01-15', 'TARDE', 'Llegó 10 minutos tarde'),
('María José Rodríguez', '00:00', '2024-01-15', 'AUSENTE', 'No se presentó a clase'),
('Luis Fernando Martínez', '09:00', '2024-01-15', 'JUSTIFICADO', 'Cita médica - Presentó justificante'),
('Isabella Sofía López', '08:10', '2024-01-15', 'PRESENTE', 'Participación activa en clase'),
('Diego Alejandro Vargas', '08:30', '2024-01-15', 'TARDE', 'Problemas de transporte');
