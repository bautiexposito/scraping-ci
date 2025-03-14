<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login');
    }

    public function autenticar() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $usuario = $this->User_model->verificar_usuario($email, $password);

        if ($usuario) {
            $this->session->set_userdata([
                'id' => $usuario->id,
                'email' => $usuario->email,
                'first_name' => $usuario->nombre,
                'logged_in' => TRUE
            ]);

            redirect('dentist');
        } else {
            $this->session->set_flashdata('error', 'Email o contraseña incorrectos.');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
