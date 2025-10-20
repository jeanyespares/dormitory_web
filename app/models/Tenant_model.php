<?php
class Tenant_model {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('sqlite:' . __DIR__ . '/../../database/tenants.db');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS tenants (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT,
            phone TEXT,
            room TEXT,
            status TEXT DEFAULT 'active',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function all() {
        return $this->pdo->query("SELECT * FROM tenants ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tenants WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $stmt = $this->pdo->prepare("INSERT INTO tenants (name, email, phone, room, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['room'], $data['status']]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE tenants SET name=?, email=?, phone=?, room=?, status=? WHERE id=?");
        $stmt->execute([$data['name'], $data['email'], $data['phone'], $data['room'], $data['status'], $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tenants WHERE id=?");
        $stmt->execute([$id]);
    }
}
