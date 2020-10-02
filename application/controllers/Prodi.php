<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth/access_blocked');
        }

        //load model
        $this->load->model('Scheduler_Model');
    }

    public function index()
    {
        //rules form insert !!!
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Prodi';

            //ambil data session login
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get dosen
            $data['prodi'] = $this->Scheduler_Model->getAllProdi();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_prodi', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert dosen
            $this->Scheduler_Model->insertProdi();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Prodi telah ditambahkan..</div>');
            redirect('Prodi');
        }
    }
    public function edit_Prodi($id_prodi)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim');

        if ($this->form_validation->run() == False) {
            //notif gagal form belum...
            redirect('Prodi');
        } else {

            //model edit dosen
            $this->Scheduler_Model->editProdi($id_prodi);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Prodi telah diupdate..</div>');
            redirect('Prodi');
        }
    }

    public function delete_Prodi($id_prodi)
    {
        //model delete dosen
        $this->Scheduler_Model->deleteProdi($id_prodi);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Prodi berhasil dihapus..</div>');
        redirect('Prodi');
    }
}
