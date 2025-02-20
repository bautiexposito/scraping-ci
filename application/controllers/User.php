<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('index', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $this->User_model->insert_user($this->input->post());
            redirect('user');
        }
        $this->load->view('create');
    }

    public function edit($id) {
        $data['user'] = $this->User_model->get_user_by_id($id);
        if ($this->input->post()) {
            $this->User_model->update_user($id, $this->input->post());
            redirect('user');
        }
        $this->load->view('edit', $data);
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user');
    }
}
