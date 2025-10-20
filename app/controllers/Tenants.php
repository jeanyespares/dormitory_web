<?php
require_once __DIR__ . '/../models/Tenant_model.php';

class Tenants {
    private $model;

    public function __construct() {
        $this->model = new Tenant_model();
    }

    public function index() {
        $tenants = $this->model->all();
        include __DIR__ . '/../views/tenants/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->insert($_POST);
            header('Location: ?controller=Tenants&action=index');
            exit;
        }
        include __DIR__ . '/../views/tenants/add.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if (!$id) die('Missing ID');
        $tenant = $this->model->find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST);
            header('Location: ?controller=Tenants&action=index');
            exit;
        }

        include __DIR__ . '/../views/tenants/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header('Location: ?controller=Tenants&action=index');
    }
}
