<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    private function check_session() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $this->check_session();
        $data['users'] = $this->User_model->get_users();
        $this->load->view('user/index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $this->User_model->insert_user($this->input->post());
            redirect('user');
        }
        $this->load->view('user/create_user');
    }

    public function edit($id) {
        $this->check_session();
        $data['user'] = $this->User_model->get_user_by_id($id);
        if ($this->input->post()) {
            $this->User_model->update_user($id, $this->input->post());
            redirect('user');
        }
        $this->load->view('user/edit_user', $data);
    }

    public function delete($id) {
        $this->check_session();
        $this->User_model->delete_user($id);
        redirect('user');
    }
}
