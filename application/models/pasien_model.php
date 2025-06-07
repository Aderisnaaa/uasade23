<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_model extends CI_Model {

    public function get_all_pasien($user_id = null, $role = null, $limit = null, $offset = null) {
        if ($role !== 'admin' && $user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get('pasien')->result_array();
    }

    public function count_all_pasien($user_id = null, $role = null) {
        if ($role !== 'admin' && $user_id !== null) {
            $this->db->where('user_id', $user_id);
        }
        return $this->db->count_all_results('pasien');
    }

    public function insert_pasien($data){
        return $this->db->insert('pasien', $data);
    }

    public function delete_pasien($id) {
        $this->db->where('idpasien', $id);
        return $this->db->delete('pasien');
    }

    public function get_pasien_by_id($idpasien){
        return $this->db->get_where('pasien', ['idpasien' => $idpasien])->row_array();
    }

    public function update_pasien($id, $data) {
        $this->db->where('idpasien', $id);
        return $this->db->update('pasien', $data);
    }

    public function get_laporan_pasien($dari, $sampai) {
        $this->db->where('tgl_kunjungan >=', $dari);
        $this->db->where('tgl_kunjungan <=', $sampai);
        return $this->db->get('pasien')->result();
    }
}
