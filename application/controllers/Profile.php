<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Profile extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authen');

        //Do your magic here
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('akun', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('profile', $data);
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('akun', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required', (['required' => 'Nama tidak boleh kosong']
        ));
        $this->form_validation->set_rules('goldar', 'Goldar', 'required', (['required' => 'Golongan darah harus diisi.']
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', (['required' => 'Ada baiknya kami mengetahui alamat anda']));
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|trim|min_length[10]', (['min_length' => 'Nomer telepon terlalu pendek', 'required' => 'Nomer telepon harus diisi']));

        if ($this->form_validation->run() == false) {
            $this->load->view('edit_profile', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $goldar = $this->input->post('goldar');
            $alamat = $this->input->post('alamat');
            $notelp = $this->input->post('notelp');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './asset/ui/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['profile_pic'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'asset/ui/img/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('profile_pic', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                    redirect('user');
                }
            }


            $this->db->set('name', $name);
            $this->db->set('goldar', $goldar);
            $this->db->set('alamat', $alamat);
            $this->db->set('notelp', $notelp);
            $this->db->where('email', $email);
            $this->db->update('akun');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil anda telah berhasil diubah!</div>');
            redirect('profile');
        }
    }
}

    
    
    /* End of file Auth.php */
