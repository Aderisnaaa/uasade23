<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function get_all_matkul() {
        return $this->db->get('matkul')->result_array();
    }
    public function get_matkul_by_id($idmatkul) {
        return $this->db->get_where('matkul', ['idmatkul' => $idmatkul])->row_array();
    }
    public function insert_matkul($data) {
        return $this->db->insert('matkul', $data);
    }
    public function update_matkul($id, $data) {
        $this->db->where('idmatkul', $id);
        return $this->db->update('matkul', $data);
    }
    public function delete_matkul($idmatkul) {
        $this->db->where('idmatkul', $idmatkul);
        return $this->db->delete('matkul');
    }
    public function is_kodematkul_unique($kodematkul, $id = null) {
        $this->db->where('kodematkul', $kodematkul);
        if ($id) {
            $this->db->where('idmatkul !=', $id); 
        }
        return $this->db->get('matkul')->num_rows() == 0;
    }
}