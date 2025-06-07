<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Load model dan helper yang diperlukan
        $this->load->model('Pasien_model', 'pasien_model');
        $this->load->model('Kategori_model');
        $this->load->model('Dokter_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        
        // Cek login, jika tidak ada user_id di session, redirect login
        if (!$this->session->userdata('user_id')) {
            redirect('login'); // sesuaikan route login kamu
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');

        // Pagination config
        $this->load->library('pagination');
        $config['base_url'] = base_url('pasien/index');
        $config['total_rows'] = $this->pasien_model->count_all_pasien($user_id, $role);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pasien'] = $this->pasien_model->get_all_pasien($user_id, $role, $config['per_page'], $page);
        $data['kategori_pasien'] = $this->Kategori_model->get_all();
        $data['pagination_links'] = $this->pagination->create_links();

        // Load flashdata pesan sukses/error dari session
        $data['success_msg'] = $this->session->flashdata('success');
        $data['error_msg'] = $this->session->flashdata('error');

        $this->load->view('templates/header');
        $this->load->view('pasien/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $data['kategori_pasien'] = $this->Kategori_model->get_all();
        $data['dokter_pasien'] = $this->Dokter_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('pasien/form_pasien', $data);
        $this->load->view('templates/footer');
    }

    public function insert() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No. Telepon', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('dokter', 'Dokter', 'required');
        $this->form_validation->set_rules('tgl_kunjungan', 'Tanggal Kunjungan', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form tambah lagi dengan pesan error
            $data['kategori_pasien'] = $this->Kategori_model->get_all();
            $data['dokter_pasien'] = $this->Dokter_model->get_all();
            $this->load->view('templates/header');
            $this->load->view('pasien/form_pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $user_id = $this->session->userdata('user_id');

            $data = array(
                'nama' => $this->input->post('nama'),
                'kategori' => 'Dalam Proses',
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat' => $this->input->post('alamat'),
                'no_tlpn' => $this->input->post('no_tlpn'),
                'keluhan' => $this->input->post('keluhan'),
                'dokter' => $this->input->post('dokter'),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                'user_id' => $user_id
            );

            $result = $this->pasien_model->insert_pasien($data);

            if ($result) {
                $this->session->set_flashdata('success', 'Pasien berhasil disimpan');
                redirect('pasien');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan pasien');
                redirect('pasien');
            }
        }
    }

    public function hapus($idpasien){
        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');

        $pasien = $this->pasien_model->get_pasien_by_id($idpasien);

        if (!$pasien) {
            show_404();
        }

        if ($role != 'admin' && $pasien['user_id'] != $user_id) {
            show_error('Anda tidak berhak menghapus data ini', 403);
        }

        $this->pasien_model->delete_pasien($idpasien);
        $this->session->set_flashdata('success', 'Data pasien berhasil dihapus.');
        redirect('pasien');
    }

    public function edit($idpasien){
        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');

        $pasien = $this->pasien_model->get_pasien_by_id($idpasien);

        if (!$pasien) {
            show_404();
        }

        if ($role != 'admin' && $pasien['user_id'] != $user_id) {
            show_error('Anda tidak berhak mengakses data ini', 403);
        }

        $data['pasien'] = $pasien;
        $data['kategori_pasien'] = $this->Kategori_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('pasien/edit_pasien', $data);
        $this->load->view('templates/footer');
    }

    public function update_kategori() {
        $id = $this->input->post('idpasien');
        $kategori = $this->input->post('kategori');

        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');

        $pasien = $this->pasien_model->get_pasien_by_id($id);

        if (!$pasien) {
            show_404();
        }

        if ($role != 'admin' && $pasien['user_id'] != $user_id) {
            show_error('Anda tidak berhak mengubah data ini', 403);
        }

        $this->pasien_model->update_pasien($id, ['kategori' => $kategori]);
        $this->session->set_flashdata('success', 'Status kategori berhasil diperbarui.');
        redirect('pasien'); 
    }

    public function update($id) {
        $user_id = $this->session->userdata('user_id');
        $role = $this->session->userdata('role');

        $pasien = $this->pasien_model->get_pasien_by_id($id);

        if (!$pasien) {
            show_404();
        }

        if ($role != 'admin' && $pasien['user_id'] != $user_id) {
            show_error('Anda tidak berhak mengubah data ini', 403);
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_kunjungan', 'Tanggal Kunjungan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['pasien'] = $pasien;
            $data['kategori_pasien'] = $this->Kategori_model->get_all();
            $this->load->view('templates/header');
            $this->load->view('pasien/edit_pasien', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'keluhan' => $this->input->post('keluhan'),
                'alamat' => $this->input->post('alamat'),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
            ];

            $this->pasien_model->update_pasien($id, $data);
            $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui.');
            redirect('pasien');
        }
    }

    public function laporan() {
        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_form');
        $this->load->view('templates/footer');
    }

    public function cetak_laporan() {
        $tanggal_dari = $this->input->post('tanggal_dari');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data['pasien'] = $this->pasien_model->get_laporan_pasien($tanggal_dari, $tanggal_sampai);
        $data['tanggal_dari'] = $tanggal_dari;
        $data['tanggal_sampai'] = $tanggal_sampai;

        $this->load->view('templates/header');
        $this->load->view('pasien/laporan_hasil', $data);
        $this->load->view('templates/footer');
    }
}
