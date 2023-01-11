<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authen extends CI_Model
{
    public function login($email)
    {

        $query = $this->db->get_where('akun', ['email' => $email])->row_array();

        return $query;
    }

    public function get_donor($id)
    {
        $query = $this->db->get_where('didonor', ['id_account' => $id]);
        return $query->result_array();
    }

    public function getAkun()
    {
        $query = $this->db->get('akun');
        return $query->result_array();
    }

    public function getAllDonor()
    {
        $query = $this->db->get('didonor')->result_array();
        return $query;
    }
    public function getDonor()
    {
        $query = $this->db->get('didonor')->row_array();
        return $query;
    }
    public function getTheDonor($limit, $start)
    {
        $query = $this->db->get('didonor', $limit, $start)->result_array();
        return $query;
    }
    public function getDonorRow()
    {
        return $this->db->get('didonor')->num_rows();
    }

    public function get_donor_detail($id)
    {
        $query = $this->db->get_where('didonor', ['id' => $id]);
        return $query->result_array();
    }

    public function butuh_darah($data)
    {
        $this->db->insert('didonor', $data);
    }
    public function edit_data($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('didonor', $data);
    }

    public function edit_member($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('role', $data['role']);
    }

    public function getAll()
    {
        $query = $this->db->get('didonor')->row_array();
        return $query;
    }
    public function delete($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('didonor', $data);
    }
    public function tambah_pendonor($data)
    {
        $this->db->insert('pendonor', $data);
    }
    public function getAllPendonor()
    {
        $query = $this->db->get('pendonor');
        return $query->result_array();
    }
    public function pendonor_detail($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('pendonor');
        return $data->row_array();
    }
    public function member_detail($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('akun');
        return $data->row_array();
    }
    public function editpendonor($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('pendonor', $data);
    }
    public function editmember($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('akun', $data);
    }
    public function pendonorHapus($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('pendonor');
    }

    public function cari($cari)
    {
        $this->db->like('nama', $cari);
        $data = $this->db->get('didonor');
        return $data->result_array();
    }

    public function carimember($cari)
    {
        $this->db->like('name', $cari);
        $data = $this->db->get('akun');
        return $data->result_array();
    }

    public function getSomeDonors($id_user)
    {
        $this->db->where('id_account', $id_user);
        $data = $this->db->get('didonor');
        return $data->result_array();
    }
}
    

    /* End of file Auth.php */
