<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class buku_model extends CI_Model{
    public function get_all_buku(){
        return $this->db->get('buku')->result_array();
    }
    public function insert_buku($data){
        return $this->db->insert('buku',$data);
    }
    public function delete_buku($idbuku){
        return $this->db->delete('buku',['idbuku'=>$idbuku]);
    }
    public function get_buku_by_id($idbuku){
        return $this->db->get_where('buku',['idbuku'=>$idbuku])->row_array();
    }
    public function update_buku($id,$data){
        $this->db->where('idbuku',$id);
        return $this->db->update('buku', $data);
    }
}