<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TahunAkademik extends CI_Controller
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
        $this->form_validation->set_rules('nama_tahun_akademik', 'Nama Tahun Akademik', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Tahun Akademik';

            //ambil data session login
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get golongan
            $data['tahun_akademik'] = $this->Scheduler_Model->getAllTahunAkademik();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_tahun_akademik', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert golongan
            $this->Scheduler_Model->insertTahunAkademik();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Tahun Akademik telah ditambahkan..</div>');
            redirect('TahunAkademik');
        }
    }
    public function edit_tahun_akademik($id_tahun_akademik)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_tahun_akademik', 'Nama Tahun Akademik', 'required|trim');

        if ($this->form_validation->run() == False) {
            //notif gagal form belum...
            redirect('TahunAkademik');
        } else {

            //model edit golongan
            $this->Scheduler_Model->editTahunAkademik($id_tahun_akademik);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Tahun Akademik telah diupdate..</div>');
            redirect('TahunAkademik');
        }
    }

    public function delete_tahun_akademik($id_tahun_akademik)
    {
        //model delete golongan
        $this->Scheduler_Model->deleteTahunAkademik($id_tahun_akademik);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Tahun Akademik berhasil dihapus..</div>');
        redirect('TahunAkademik');
    }
}
