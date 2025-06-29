<?php 
$title = "Editar Asistencia";
include 'views/layout/header.php'; 
?>

<a href="index.php" class="back-link">← Volver a la lista</a>

<div class="form-container">
    <h2 style="text-align: center; margin-bottom: 2rem; color: #333;">✏️ Editar Asistencia</h2>
    
    <?php if(isset($error)): ?>
        <div class="alert alert-error">
            ✗ <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=update&id=<?php echo $this->asistencia->id; ?>">
        <div class="form-group">
            <label for="estudiante">Nombre del Estudiante *</label>
            <input type="text" id="estudiante" name="estudiante" class="form-control" 
                   value="<?php echo htmlspecialchars($this->asistencia->estudiante); ?>" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora *</label>
            <input type="time" id="hora" name="hora" class="form-control" 
                   value="<?php echo $this->asistencia->hora; ?>" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha *</label>
            <input type="date" id="fecha" name="fecha" class="form-control" 
                   value="<?php echo $this->asistencia->fecha; ?>" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado *</label>
            <select id="estado" name="estado" class="form-control" required>
                <option value="PRESENTE" <?php echo ($this->asistencia->estado == 'PRESENTE') ? 'selected' : ''; ?>>PRESENTE</option>
                <option value="AUSENTE" <?php echo ($this->asistencia->estado == 'AUSENTE') ? 'selected' : ''; ?>>AUSENTE</option>
                <option value="TARDE" <?php echo ($this->asistencia->estado == 'TARDE') ? 'selected' : ''; ?>>TARDE</option>
                <option value="JUSTIFICADO" <?php echo ($this->asistencia->estado == 'JUSTIFICADO') ? 'selected' : ''; ?>>JUSTIFICADO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" class="form-control" 
                      rows="4"><?php echo htmlspecialchars($this->asistencia->observaciones); ?></textarea>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <button type="submit" class="btn btn-success" style="margin-right: 1rem;">
                ✓ Actualizar Asistencia
            </button>
            <a href="index.php" class="btn btn-secondary">
                ✗ Cancelar
            </a>
        </div>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
