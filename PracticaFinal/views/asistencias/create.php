<?php 
$title = "Registrar Asistencia";
include 'views/layout/header.php'; 
?>

<a href="index.php" class="back-link">← Volver a la lista</a>

<div class="form-container">
    <h2 style="text-align: center; margin-bottom: 2rem; color: #333;">📝 Registrar Nueva Asistencia</h2>
    
    <?php if(isset($error)): ?>
        <div class="alert alert-error">
            ✗ <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?action=store">
        <div class="form-group">
            <label for="estudiante">Nombre del Estudiante *</label>
            <input type="text" id="estudiante" name="estudiante" class="form-control" 
                   placeholder="Ingrese el nombre completo del estudiante" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora *</label>
            <input type="time" id="hora" name="hora" class="form-control" 
                   value="<?php echo date('H:i'); ?>" required>
        </div>

        <div class="form-group">
            <label for="fecha">Fecha *</label>
            <input type="date" id="fecha" name="fecha" class="form-control" 
                   value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado *</label>
            <select id="estado" name="estado" class="form-control" required>
                <option value="PRESENTE">PRESENTE</option>
                <option value="AUSENTE">AUSENTE</option>
                <option value="TARDE">TARDE</option>
                <option value="JUSTIFICADO">JUSTIFICADO</option>
            </select>
        </div>

        <div class="form-group">
            <label for="observaciones">Observaciones</label>
            <textarea id="observaciones" name="observaciones" class="form-control" 
                      rows="4" placeholder="Ingrese observaciones adicionales (opcional)"></textarea>
        </div>

        <div style="text-align: center; margin-top: 2rem;">
            <button type="submit" class="btn btn-success" style="margin-right: 1rem;">
                ✓ Registrar Asistencia
            </button>
            <a href="index.php" class="btn btn-secondary">
                ✗ Cancelar
            </a>
        </div>
    </form>
</div>

<?php include 'views/layout/footer.php'; ?>
