<?php
defined('BASEPATH')OR exit('No direct script access allowed');

class dokter_moodel extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('dokter_model');
       // $this->load->library('session');
    }

    public function index() {
        $data['dokter_pasien'] = $this->dokter_model->get_all_dokter();
        $this->load->view('templates/header');
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah(){
        $data['dokter_pasien']=$this->dokter_model->get_all_dokter();
        $this->load->view('templates/header');
        $this->load->view('dokter/form_dokter', $data);
        $this->load->view('templates/footer');
    }
    public function insert(){
        $dokter= $this->input->post('dokter');
        $data=array(      
            'dokter'=>$dokter          
        );
        $result= $this->dokter_model->insert_dokter($data);

        if($result){
            $this->session->set_flashdata('success', 'pasien berhasil disimpan');
            redirect('dokter');
        }else{
            $this->session->set_flashdata('error', 'gagal menyimpan pasien');
            redirect('dokter');
        }
    }
    public function hapus($iddokter){
        $this->dokter_model->delete_dokter($iddokter);
        redirect('dokter');
    }
    public function edit($iddokter){
        $data['dokter_pasien']=$this->dokter_model->get_dokter_by_id($iddokter);
        $this->load->view('templates/header');
        $this->load->view('dokter/edit_dokter',$data);
        $this->load->view('templates/footer');
    }
    public function update($id) {
        
        $this->form_validation->set_rules('dokter', 'dokter', 'required');
       

        if ($this->form_validation->run() === FALSE) {
            $this->index($id);
        } else {
            $data = [
                
                'dokter' => $this->input->post('dokter')
                
            ];
            $this->dokter_model->update_dokter($id, $data);
            redirect('dokter');
        }
    }
}