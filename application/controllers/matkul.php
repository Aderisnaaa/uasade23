<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('matkul_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['matkul'] = $this->matkul_model->get_all_matkul();
        $this->load->view('templates/header');
        $this->load->view('matkul/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah(){
        $this->load->view('templates/header');
        $this->load->view('matkul/form_matkul');
        $this->load->view('templates/footer');
    }

    public function insert(){
        $this->form_validation->set_rules('kodematkul', 'Kode Mata Kuliah', 'required|is_unique[matkul.kodematkul]');
        $this->form_validation->set_rules('namamatkul', 'Nama Mata Kuliah', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required|numeric');
        $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->tambah();
        } else {
            $data = [
                'kodematkul' => $this->input->post('kodematkul'),
                'namamatkul' => $this->input->post('namamatkul'),
                'sks' => $this->input->post('sks'),
                'semester' => $this->input->post('semester'),
                'jenis' => $this->input->post('jenis'),
                'prodi' => $this->input->post('prodi'),
            ];
            $this->matkul_model->insert_matkul($data);
            $this->session->set_flashdata('success', 'Mata Kuliah berhasil ditambahkan');
            redirect('matkul');
        }
    }

    public function hapus($idmatkul){
        $this->matkul_model->delete_matkul($idmatkul);
        $this->session->set_flashdata('success', 'Mata Kuliah berhasil dihapus');
        redirect('matkul');
    }

    public function edit($idmatkul){
        $data['matkul'] = $this->matkul_model->get_matkul_by_id($idmatkul);
        $this->load->view('templates/header');
        $this->load->view('matkul/edit_matkul', $data);
        $this->load->view('templates/footer');
    }

    public function update($id){
        $original_kodematkul = $this->matkul_model->get_matkul_by_id($id)['kodematkul'];
        $is_unique = ($this->input->post('kodematkul') == $original_kodematkul) ? '' : '|is_unique[matkul.kodematkul]';

        $this->form_validation->set_rules('kodematkul', 'Kode Mata Kuliah', 'required' . $is_unique);
        $this->form_validation->set_rules('namamatkul', 'Nama Mata Kuliah', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required|numeric');
        $this->form_validation->set_rules('semester', 'Semester', 'required|numeric');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'kodematkul' => $this->input->post('kodematkul'),
                'namamatkul' => $this->input->post('namamatkul'),
                'sks' => $this->input->post('sks'),
                'semester' => $this->input->post('semester'),
                'jenis' => $this->input->post('jenis'),
                'prodi' => $this->input->post('prodi'),
            ];
            $this->matkul_model->update_matkul($id, $data);
            $this->session->set_flashdata('success', 'Mata Kuliah berhasil diperbarui');
            redirect('matkul');
        }
    }
}