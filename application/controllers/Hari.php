<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hari extends CI_Controller
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
        $this->form_validation->set_rules('nama_hari', 'Nama Hari', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Hari';

            //ambil data session login
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get hari
            $data['hari'] = $this->Scheduler_Model->getAllHari();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_hari', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert hari
            $this->Scheduler_Model->insertHari();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data hari telah ditambahkan..</div>');
            redirect('hari');
        }
    }
    public function edit_hari($id_hari)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_hari', 'Nama Hari', 'required|trim');

        if ($this->form_validation->run() == False) {
            //notif gagal form belum...
            redirect('Hari');
        } else {

            //model edit hari
            $this->Scheduler_Model->editHari($id_hari);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Hari telah diupdate..</div>');
            redirect('Hari');
        }
    }

    public function delete_hari($id_hari)
    {
        //model delete hari
        $this->Scheduler_Model->deleteHari($id_hari);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Hari berhasil dihapus..</div>');
        redirect('Hari');
    }
}
