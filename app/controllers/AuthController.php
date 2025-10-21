<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('User_model');
    }

    public function login() {
        if($this->form_validation->submitted()) {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->User_model->get_user_by_username($username);

            if($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] == 'admin') {
                    redirect('dashboard');
                } else {
                    redirect('tenant/dashboard');
                }
            } else {
                set_flash_alert('error', 'Invalid username or password.');
                redirect('auth/login');
            }
        }
        $this->call->view('auth/login');
    }

    public function register() {
        if($this->form_validation->submitted()) {
            $data = [
                'fullname' => $this->io->post('fullname'),
                'username' => $this->io->post('username'),
                'password' => password_hash($this->io->post('password'), PASSWORD_DEFAULT),
                'role' => $this->io->post('role')
            ];

            $this->User_model->register_user($data);
            set_flash_alert('success', 'Registration successful! You can now login.');
            redirect('auth/login');
        }

        $this->call->view('auth/register');
    }

    public function logout() {
        session_destroy();
        redirect('auth/login');
    }
}
