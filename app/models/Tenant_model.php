<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Tenant_model
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli('localhost', 'jeany', 'jeany', 'dormitory_db');
        if ($this->db->connect_error) {
            die('Database Connection Failed: ' . $this->db->connect_error);
        }
    }

    public function get_all()
    {
        $result = $this->db->query("SELECT * FROM tenants ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tenants WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($data)
    {
        $stmt = $this->db->prepare("INSERT INTO tenants (name, contact, room_no, rent, move_in_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssis', $data['name'], $data['contact'], $data['room_no'], $data['rent'], $data['move_in_date']);
        return $stmt->execute();
    }

    public function update_tenant($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE tenants SET name=?, contact=?, room_no=?, rent=?, move_in_date=? WHERE id=?");
        $stmt->bind_param('sssisi', $data['name'], $data['contact'], $data['room_no'], $data['rent'], $data['move_in_date'], $id);
        return $stmt->execute();
    }

    public function delete_tenant($id)
    {
        $stmt = $this->db->prepare("DELETE FROM tenants WHERE id=?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
?>
