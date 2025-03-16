<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_users() {
        return $this->db->get('users')->result_array();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    public function insert_user($data) {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->insert('users', $data);
    }

    public function update_user($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete_user($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function verificar_usuario($email, $password) {  
        $this->db->where('email', trim($email));
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $usuario = $query->row();

            if (password_verify($password, $usuario->password)) {
                return $usuario;
            } else {
                echo "❌ Contraseña incorrecta";
                exit();
            }
        } else {
            echo "❌ Usuario no encontrado";
            exit();
        }
    }
}
