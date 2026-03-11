<?php
// index.php
// Punto de entrada único. Lee ?action=... y llama al controlador.

require_once __DIR__ . '/controller/ClienteController.php';

$controller = new ClienteController();

// Acción por URL, por defecto: index (listar)
$action = $_GET['action'] ?? 'index';

// id cuando haga falta (edit/update/destroy)
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

switch ($action) {
    case 'index':
        $controller->index();
        break;

    case 'create':
        $controller->create();
        break;

    case 'store':
        if ($method !== 'POST') { echo "Método no permitido"; break; }
        $controller->store($_POST);
        break;

    case 'edit':
        if ($id === null) { echo "Falta id"; break; }
        $controller->edit($id);
        break;

    case 'update':
        if ($method !== 'POST') { echo "Método no permitido"; break; }
        if ($id === null) { echo "Falta id"; break; }
        $controller->update($id, $_POST);
        break;

    case 'destroy':
        if ($method !== 'POST') { echo "Método no permitido"; break; }
        if ($id === null) { echo "Falta id"; break; }
        $controller->destroy($id);
        break;

    default:
        echo "Acción no encontrada";
        break;
}

