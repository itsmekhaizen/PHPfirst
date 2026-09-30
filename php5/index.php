<?php

require_once "config/Database.php";
require_once "models/Faculty.php";
require_once "controllers/FacultyController.php";

$database = new Database();
$conn = $database->connect();

$facultyModel = new Faculty($conn);
$controller = new FacultyController($facultyModel);

$action = $_GET['action'] ?? 'index';

switch ($action) {

    case 'create':
        $controller->create();
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store();
        }
        break;

    case 'edit':
        if (isset($_GET['id'])) {
            $controller->edit((int) $_GET['id']);
        }
        break;

    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $controller->update((int) $_GET['id']);
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete((int) $_GET['id']);
        }
        break;

    default:
        $controller->index();
        break;
}