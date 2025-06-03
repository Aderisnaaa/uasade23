<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('buku_model');
    }
    public function index(){

        $data['buku']=$this->buku_model->get_all_buku();
        $this->load->view('templates/header');
        $this->load->view('buku/index' ,$data);
        $this->load->view('templates/footer');
    }
    public function tambah(){
        $data['buku']=$this->buku_model->get_all_buku();
        $this->load->view('templates/header');
        $this->load->view('buku/form_buku',$data);
        $this->load->view('templates/footer');
    }
    public function insert(){
        $judul=$this->input->post('judul');
        $penulis=$this->input->post('penulis');
        $penerbit=$this->input->post('penerbit');
        $tahunterbit=$this->input->post('tahunterbit');
        $kategori=$this->input->post('kategori');
        $stok=$this->input->post('stok');

        $data=array(
            'judul'=>$judul,
            'penulis'=>$penulis,
            'penerbit'=>$penerbit,
            'tahunterbit'=>$tahunterbit,
            'kategori'=>$kategori,
            'stok'=>$stok,
        );

        $result=$this->buku_model->insert_buku($data);

        if($result){
            $this->session->set_flashdata('success','Buku berhasil disimpan');
            redirect('buku');
        }else{
            $this->session->set_flashdata('error','Buku gagal disimpan');
            redirect('buku');
        }
    }
    public function hapus($idbuku){
        $this->buku_model->delete_buku($idbuku);
        redirect('buku');
        }
    public function edit($idbuku){
        $data['buku']=$this->buku_model->get_buku_by_id($idbuku);
        $this->load->view('templates/header');
        $this->load->view('buku/edit_buku',$data);
        $this->load->view('templates/footer');
        }
    public function update($id){
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('penulis','penulis','required');
        $this->form_validation->set_rules('penerbit','penerbit','required');
        $this->form_validation->set_rules('tahunterbit','tahunterbit','required');
        $this->form_validation->set_rules('kategori','kategori','required');
        $this->form_validation->set_rules('stok','stok','required');
        if ($this->form_validation->run() === FALSE){
            $this->index($id);
        }else{
            $data = [
                'judul' => $this->input->post('judul'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tahunterbit' => $this->input->post('tahunterbit'),
                'kategori' => $this->input->post('kategori'),
                'stok' => $this->input->post('stok')
            ];
            $this->buku_model->update_buku($id, $data);
            redirect('buku');
        }
    }
    }