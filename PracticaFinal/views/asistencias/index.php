<?php 
$title = "Lista de Asistencias";
include 'views/layout/header.php'; 
?>

<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">
        ✓ Asistencia registrada correctamente
    </div>
<?php endif; ?>

<?php if(isset($_GET['updated'])): ?>
    <div class="alert alert-success">
        ✓ Asistencia actualizada correctamente
    </div>
<?php endif; ?>

<?php if(isset($_GET['deleted'])): ?>
    <div class="alert alert-success">
        ✓ Asistencia eliminada correctamente
    </div>
<?php endif; ?>

<?php if(isset($_GET['error'])): ?>
    <div class="alert alert-error">
        ✗ Error: <?php echo htmlspecialchars($_GET['error']); ?>
    </div>
<?php endif; ?>

<div class="stats">
    <div class="stat-card">
        <div class="stat-number"><?php echo $total; ?></div>
        <div class="stat-label">Total Registros</div>
    </div>
    <div class="stat-card">
        <div class="stat-number"><?php echo date('d/m/Y'); ?></div>
        <div class="stat-label">Fecha Actual</div>
    </div>
</div>

<div class="control-panel">
    <div class="control-header">
        <h2 class="control-title">📋 Registros de Asistencia</h2>
        <a href="index.php?action=create" class="btn btn-primary">+ Registrar Asistencia</a>
    </div>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Estudiante</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($asistencias)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 2rem; color: #666;">
                            No hay registros de asistencia
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach($asistencias as $index => $asistencia): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($asistencia['estudiante']); ?></td>
                            <td><?php echo date('H:i', strtotime($asistencia['hora'])); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($asistencia['fecha'])); ?></td>
                            <td>
                                <span class="status-badge status-<?php echo strtolower($asistencia['estado']); ?>">
                                    <?php echo $asistencia['estado']; ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars(substr($asistencia['observaciones'], 0, 50)) . (strlen($asistencia['observaciones']) > 50 ? '...' : ''); ?></td>
                            <td>
                                <div class="actions">
                                    <a href="index.php?action=edit&id=<?php echo $asistencia['id']; ?>" 
                                       class="btn btn-warning btn-sm">✏️</a>
                                    <a href="index.php?action=delete&id=<?php echo $asistencia['id']; ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('¿Estás seguro de eliminar este registro?')">🗑️</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
