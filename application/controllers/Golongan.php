<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Golongan extends CI_Controller
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
        $this->form_validation->set_rules('nama_golongan', 'Nama Golongan', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Golongan';

            //ambil data session login
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get golongan
            $data['golongan'] = $this->Scheduler_Model->getAllGolongan();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_golongan', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert golongan
            $this->Scheduler_Model->insertGolongan();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Golongan telah ditambahkan..</div>');
            redirect('Golongan');
        }
    }
    public function edit_golongan($id_golongan)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_golongan', 'Nama Golongan', 'required|trim');

        if ($this->form_validation->run() == False) {
            //notif gagal form belum...
            redirect('Golongan');
        } else {

            //model edit golongan
            $this->Scheduler_Model->editGolongan($id_golongan);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Golongan telah diupdate..</div>');
            redirect('Golongan');
        }
    }

    public function delete_golongan($id_golongan)
    {
        //model delete golongan
        $this->Scheduler_Model->deleteGolongan($id_golongan);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data golongan berhasil dihapus..</div>');
        redirect('Golongan');
    }
}
