<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Tenants extends Controller
{
    private $tenant;

    public function __construct()
    {
        $this->tenant = new Tenant_model(); // Works now
    }

    public function index()
    {
        $data['tenants'] = $this->tenant->get_all();
        $this->call->view('tenants/index', $data);
    }

    public function add()
    {
        $this->call->view('tenants/add');
    }

    public function store()
    {
        $data = [
            'name' => $_POST['name'],
            'contact' => $_POST['contact'],
            'room_no' => $_POST['room_no'],
            'rent' => $_POST['rent'],
            'move_in_date' => $_POST['move_in_date']
        ];
        $this->tenant->insert($data);
        redirect('/tenants');
    }

    public function edit($id)
    {
        $data['tenant'] = $this->tenant->get($id);
        $this->call->view('tenants/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'contact' => $_POST['contact'],
            'room_no' => $_POST['room_no'],
            'rent' => $_POST['rent'],
            'move_in_date' => $_POST['move_in_date']
        ];
        $this->tenant->update_tenant($id, $data);
        redirect('/tenants');
    }

    public function delete($id)
    {
        $this->tenant->delete_tenant($id);
        redirect('/tenants');
    }
}
?>
