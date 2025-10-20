<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Tenant_model extends Model
{
    public function get_all()
    {
        return $this->db->table('tenants')->get_all();
    }

    public function get($id)
    {
        return $this->db->table('tenants')->where('id', $id)->get();
    }

    public function insert($data)
    {
        return $this->db->table('tenants')->insert($data);
    }

    public function update_tenant($id, $data)
    {
        return $this->db->table('tenants')->where('id', $id)->update($data);
    }

    public function delete_tenant($id)
    {
        return $this->db->table('tenants')->where('id', $id)->delete();
    }
}
?>
