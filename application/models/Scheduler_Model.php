<?php

class Scheduler_Model extends CI_Model
{
    //------------------------------ DOSEN ------------------------------
    public function getAllDosen()
    {
        return $this->db->get('tb_dosen')->result_array();
    }

    public function insertDosen()
    {
        $data = [
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "nip" => $this->input->post('nip', true)
        ];
        $this->db->insert('tb_dosen', $data);
    }

    public function editDosen($id_dosen)
    {
        $data = [
            "nama_dosen" => $this->input->post('nama_dosen', true),
            "nip" => $this->input->post('nip', true)
        ];

        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('tb_dosen', $data);
    }

    public function deleteDosen($id_dosen)
    {
        $this->db->where('id_dosen', $id_dosen);
        $this->db->delete('tb_dosen');
    }


    //----------------------------- PENGAMPU -----------------------------
    public function getAllPengampu()
    {
        return $this->db->get('tb_pengampu')->result_array();
    }

    public function insertPengampu()
    {
        $data = [
            "id_dosen" => $this->input->post('id_dosen'),
            "id_mata_kuliah" => $this->input->post('id_mata_kuliah'),
            "id_prodi" => $this->input->post('id_prodi'),
            "id_semester" => $this->input->post('id_semester'),
            "id_golongan" => $this->input->post('id_golongan'),
        ];
        $this->db->insert('tb_pengampu', $data);
    }

    public function editPengampu($id_pengampu)
    {
        $data = [
            "id_dosen" => $this->input->post('id_dosen'),
            "id_mata_kuliah" => $this->input->post('id_mata_kuliah'),
            "id_prodi" => $this->input->post('id_prodi'),
            "id_semester" => $this->input->post('id_semester'),
            "id_golongan" => $this->input->post('id_golongan')
        ];
        $this->db->where('id_pengampu', $id_pengampu);
        $this->db->update('tb_pengampu', $data);
    }

    public function deletePengampu($id_pengampu)
    {
        $this->db->where('id_pengampu', $id_pengampu);
        $this->db->delete('tb_pengampu');
    }


    //--------------------------- MATA KULIAH ---------------------------
    public function getAllMataKuliah()
    {
        return $this->db->get('tb_mata_kuliah')->result_array();
    }

    public function insertMataKuliah()
    {
        $data = [
            "id_prodi" => $this->input->post('id_prodi', true),
            "kode_mata_kuliah" => $this->input->post('kode_mata_kuliah', true),
            "nama_mata_kuliah" => $this->input->post('nama_mata_kuliah', true),
            "semester" => $this->input->post('semester', true),
            "jenis_mata_kuliah" => $this->input->post('jenis_mata_kuliah', true)
        ];
        $this->db->insert('tb_mata_kuliah', $data);
    }

    public function editMataKuliah($id_mata_kuliah)
    {
        $data = [
            "id_prodi" => $this->input->post('id_prodi'),
            "kode_mata_kuliah" => $this->input->post('kode_mata_kuliah', true),
            "nama_mata_kuliah" => $this->input->post('nama_mata_kuliah', true),
            "semester" => $this->input->post('semester'),
            "jenis_mata_kuliah" => $this->input->post('jenis_mata_kuliah')
        ];

        $this->db->where('id_mata_kuliah', $id_mata_kuliah);
        $this->db->update('tb_mata_kuliah', $data);
    }

    public function deleteMataKuliah($id_mata_kuliah)
    {
        $this->db->where('id_mata_kuliah', $id_mata_kuliah);
        $this->db->delete('tb_mata_kuliah');
    }


    //------------------------- PROGRAM STUDI ---------------------------
    public function getAllProdi()
    {
        return $this->db->get('tb_prodi')->result_array();
    }

    public function insertProdi()
    {
        $data = [
            "nama_prodi" => $this->input->post('nama_prodi', true),
        ];
        $this->db->insert('tb_prodi', $data);
    }

    public function editProdi($id_prodi)
    {
        $data = [
            "nama_prodi" => $this->input->post('nama_prodi', true),
        ];

        $this->db->where('id_prodi', $id_prodi);
        $this->db->update('tb_prodi', $data);
    }

    public function deleteProdi($id_prodi)
    {
        $this->db->where('id_prodi', $id_prodi);
        $this->db->delete('tb_prodi');
    }

    //---------------------------- GOLONGAN ------------------------------
    public function getAllGolongan()
    {
        return $this->db->get('tb_golongan')->result_array();
    }

    public function insertGolongan()
    {
        $data = [
            "nama_golongan" => $this->input->post('nama_golongan', true),
        ];
        $this->db->insert('tb_golongan', $data);
    }

    public function editGolongan($id_golongan)
    {
        $data = [
            "nama_golongan" => $this->input->post('nama_golongan', true),
        ];

        $this->db->where('id_golongan', $id_golongan);
        $this->db->update('tb_golongan', $data);
    }

    public function deleteGolongan($id_golongan)
    {
        $this->db->where('id_golongan', $id_golongan);
        $this->db->delete('tb_golongan');
    }

    //----------------------- TAHUN AKADEMIK ----------------------------
    public function getAllTahunAkademik()
    {
        return $this->db->get('tb_tahun_akademik')->result_array();
    }

    public function insertTahunAkademik()
    {
        $data = [
            "nama_tahun_akademik" => $this->input->post('nama_tahun_akademik', true),
        ];
        $this->db->insert('tb_tahun_akademik', $data);
    }

    public function editTahunAkademik($id_tahun_akademik)
    {
        $data = [
            "nama_tahun_akademik" => $this->input->post('nama_tahun_akademik', true),
        ];

        $this->db->where('id_tahun_akademik', $id_tahun_akademik);
        $this->db->update('tb_tahun_akademik', $data);
    }

    public function deleteTahunAkademik($id_tahun_akademik)
    {
        $this->db->where('id_tahun_akademik', $id_tahun_akademik);
        $this->db->delete('tb_tahun_akademik');
    }

    //-------------------------- SEMESTER -------------------------------
    public function getAllSemester()
    {
        return $this->db->get('tb_semester')->result_array();
    }

    public function insertSemester()
    {
        $data = [
            "id_tahun_akademik" => $this->input->post('id_tahun_akademik', true),
            "nama_semester" => $this->input->post('nama_semester', true)
        ];
        $this->db->insert('tb_semester', $data);
    }

    public function editSemester($id_semester)
    {
        $data = [
            "id_tahun_akademik" => $this->input->post('id_tahun_akademik', true),
            "nama_semester" => $this->input->post('nama_semester', true)
        ];
        $this->db->where('id_semester', $id_semester);
        $this->db->update('tb_semester', $data);
    }

    public function deleteSemester($id_semester)
    {
        $this->db->where('id_semester', $id_semester);
        $this->db->delete('tb_semester');
    }


    //------------------------------ RUANG ------------------------------
    public function getAllRuang()
    {
        return $this->db->get('tb_ruang')->result_array();
    }

    public function insertRuang()
    {
        $data = [
            "nama_ruang" => $this->input->post('nama_ruang', true),
            "kapasitas" => $this->input->post('kapasitas', true),
            "jenis_ruang" => $this->input->post('jenis_ruang', true)
        ];
        $this->db->insert('tb_ruang', $data);
    }


    public function editRuang($id_ruang)
    {
        $data = [
            "nama_ruang" => $this->input->post('nama_ruang', true),
            "kapasitas" => $this->input->post('kapasitas', true),
            "jenis_ruang" => $this->input->post('jenis_ruang', true)
        ];

        $this->db->where('id_ruang', $id_ruang);
        $this->db->update('tb_ruang', $data);
    }


    public function deleteRuang($id_ruang)
    {
        $this->db->where('id_ruang', $id_ruang);
        $this->db->delete('tb_ruang');
    }


    //---------------------------- HARI ---------------------------------
    public function getAllHari()
    {
        return $this->db->get('tb_hari')->result_array();
    }

    public function insertHari()
    {
        $data = [
            "nama_hari" => $this->input->post('nama_hari', true),
        ];
        $this->db->insert('tb_hari', $data);
    }

    public function editHari($id_hari)
    {
        $data = [
            "nama_hari" => $this->input->post('nama_hari', true),
        ];

        $this->db->where('id_hari', $id_hari);
        $this->db->update('tb_hari', $data);
    }

    public function deleteHari($id_hari)
    {
        $this->db->where('id_hari', $id_hari);
        $this->db->delete('tb_hari');
    }

    //----------------------------- JAM ----------------------------------
    public function getAllJAM()
    {
        return $this->db->get('tb_jam')->result_array();
    }

    public function insertJam()
    {
        $data = [
            "nama_jam" => $this->input->post('nama_jam', true),
        ];
        $this->db->insert('tb_jam', $data);
    }

    public function editJam($id_jam)
    {
        $data = [
            "nama_jam" => $this->input->post('nama_jam', true),
        ];

        $this->db->where('id_jam', $id_jam);
        $this->db->update('tb_jam', $data);
    }

    public function deleteJam($id_jam)
    {
        $this->db->where('id_jam', $id_jam);
        $this->db->delete('tb_jam');
    }
}
