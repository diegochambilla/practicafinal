<?php
// Archivo principal - Router
require_once 'controllers/AsistenciaController.php';

// Obtener la acción de la URL
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Crear instancia del controlador
$controller = new AsistenciaController();

// Enrutamiento
switch($action) {
    case 'index':
        $controller->index();
        break;
    
    case 'create':
        $controller->create();
        break;
    
    case 'store':
        $controller->store();
        break;
    
    case 'edit':
        if($id) {
            $controller->edit($id);
        } else {
            header("Location: index.php?error=missing_id");
            exit();
        }
        break;
    
    case 'update':
        if($id) {
            $controller->update($id);
        } else {
            header("Location: index.php?error=missing_id");
            exit();
        }
        break;
    
    case 'delete':
        if($id) {
            $controller->delete($id);
        } else {
            header("Location: index.php?error=missing_id");
            exit();
        }
        break;
    
    default:
        $controller->index();
        break;
}
?>
