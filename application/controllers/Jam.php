<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jam extends CI_Controller
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
        $this->form_validation->set_rules('nama_jam', 'Nama Jam', 'required|trim');

        if ($this->form_validation->run() == False) {
            //form validasi gagal
            //notif gagal form belum...!
            $data['title'] = 'Data Jam';

            //ambil data session login
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            //model get jam
            $data['jam'] = $this->Scheduler_Model->getAllJAM();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('v_data_jam', $data);
            $this->load->view('templates/footer');
        } else {
            //form validasi sukses
            //model insert jam
            $this->Scheduler_Model->insertJam();

            //notif insert data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Jam telah ditambahkan..</div>');
            redirect('Jam');
        }
    }
    public function edit_jam($id_jam)
    {
        //rules form edit !!!
        $this->form_validation->set_rules('nama_jam', 'Nama Jam', 'required|trim');

        if ($this->form_validation->run() == False) {
            //notif gagal form belum...
            redirect('Jam');
        } else {

            //model edit Jam
            $this->Scheduler_Model->editJam($id_jam);

            //notif edit data sukses
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Jam telah diupdate..</div>');
            redirect('Jam');
        }
    }

    public function delete_jam($id_jam)
    {
        //model delete jam
        $this->Scheduler_Model->deleteJam($id_jam);

        //notif delete sukses
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Data Jam berhasil dihapus..</div>');
        redirect('Jam');
    }
}
