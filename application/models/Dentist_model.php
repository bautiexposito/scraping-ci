<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dentist_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function guardar_dentista($full_name, $address, $phone) {
        $data = array(
            'full_name' => $full_name,
            'address'   => $address,
            'phone'     => $phone
        );

        $this->db->insert('dentists', $data);
        return $this->db->insert_id();
    }

    public function obtener_dentistas() {
        return $this->db->get('dentists')->result();
    }
}
