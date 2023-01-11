<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authen');
        if (
            $this->session->userdata('email') == ''
        ) {
            $this->session->set_flashdata('fail', 'Login Required!');

            die(redirect("auth/login"));
            return;
        }
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        if ($data['user']['role'] != 1) {
            $this->load->view('admin/404');
            $this->CI = &get_instance();
            $this->CI->output->_display();
            die();
        }
    }

    public function index()
    {
        if (!empty($_GET['cari_data'])) {

            $data = [
                'cari' => $this->input->get('cari_data')
            ];

            $data['hasil'] = $this->Authen->cari($data['cari']);
        }
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );

        $this->load->library('pagination');

        $config['base_url'] = "http://localhost/donor3/donor/admin/index";
        $config['total_rows'] = $this->Authen->getDonorRow();
        $config['per_page'] = 3;
        $config['full_tag_open'] = '
        <ul class="pagination">';
        $config['full_tag_close'] = '  </ul>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $data['start'] = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['donor'] = $this->Authen->getTheDonor($config['per_page'], $data['start']);
        $data['title'] = 'Input data penerima donor';


        $this->load->view('admin/index', $data);
    }

    public function detail($id)
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = 'Detail Penerima donor';
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );

        $data['donor_id'] = $this->Authen->get_donor_detail($id);
        $this->load->view('admin/donor_detail', $data);
    }

    public function butuh_darah()
    {
        date_default_timezone_set('Asia/Makassar');
        $t = time();
        $date = date("Y/m/d H:i:s", $t);

        $data_donor = [
            'id_account' =>
            $this->session->userdata('id'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'umur' => $this->input->post('umur'),
            'goldar' => $this->input->post('goldar') ? $this->input->post('goldar') : 0,
            'banyak_kantong' => $this->input->post('kantong'),
            'urgent' => $this->input->post('urgent') ? 1 : 0,
            'done' => $this->input->post('done') ? 1 : 0,
            'waktu' => $date

        ];

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
        $this->form_validation->set_rules('kantong', 'Banyak Kantong', 'trim|required|numeric');


        if ($this->form_validation->run() == TRUE) {
            if (is_numeric($data_donor['goldar'])) {
                $this->session->set_flashdata('fail', 'Data gagal diubah, Golongan darah tidak valid');

                redirect('admin/butuh_darah');
            }
            $this->Authen->butuh_darah($data_donor);

            $this->session->set_flashdata('succ', 'Data berhasil diinput');
            redirect('admin/index');
        } else {
            $data['title'] = 'Input data penerima donor';
            $this->load->view('admin/butuh_darah', $data);
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );


        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
        $this->form_validation->set_rules('kantong', 'Banyak Kantong', 'trim|required|numeric');



        if ($this->form_validation->run() == TRUE) {
            date_default_timezone_set('Asia/Makassar');
            $t = time();
            $date = date("Y/m/d H:i:s", $t);

            $data = [
                'id' => $this->input->post('id'),
                'id_account' => $this->input->post('id_account'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'umur' => $this->input->post('umur'),
                'goldar' => $this->input->post('goldar') ? $this->input->post('goldar') : 0,
                'banyak_kantong' => $this->input->post('kantong'),
                'urgent' => $this->input->post('urgent') ? 1 : 0,
                'done' => $this->input->post('done') ? 1 : 0,
                'waktu' => $date

            ];

            if (is_numeric($data['goldar'])) {
                $this->session->set_flashdata('fail', 'Data gagal diubah, Golongan darah tidak valid');

                redirect('admin/edit/' . $data['id']);
            }
            $this->Authen->edit_data($data);

            $this->session->set_flashdata('succ', 'Data berhasil diubah');
            redirect('admin/index');
        } else {
            $data['donor'] = $this->Authen->get_donor_detail($id);
            $data['title'] = 'Input data penerima donor';
            $this->load->view('admin/edit', $data);
        }
    }
    public function hapus($id)
    {

        $data['id'] = $id;

        $this->Authen->delete($data);
        $this->session->set_flashdata('succ', 'Data dihapus');

        redirect('admin/index');
    }

    public function info_darah()
    {
        $this->load->view('admin/info_darah');
    }

    public function pendonor()
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = 'Data pendonor';
        $data['pendonor'] = $this->Authen->getAllPendonor();
        $this->load->view('admin/pendonor', $data);
    }
    public function tambah_pendonor()
    {
        date_default_timezone_set('Asia/Makassar');
        $t = time();
        $date = date("Y/m/d H:i:s", $t);

        $data = [
            'id_account' =>
            $this->session->userdata('id'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'umur' => $this->input->post('umur'),
            'goldar' => $this->input->post('goldar'),
            'banyak_kantong' => $this->input->post('kantong'),
            'alamat_pmi' => $this->input->post('lokasi'),
            'waktu' => $date
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Lokasi PMI', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
        $this->form_validation->set_rules('kantong', 'Banyak Kantong', 'trim|required|numeric');


        if ($this->form_validation->run() == TRUE) {
            $this->Authen->tambah_pendonor($data);

            $this->session->set_flashdata('succ', 'Data berhasil diinput');
            redirect('admin/pendonor');
        } else {
            $data['title'] = 'Input data penerima donor';
            $this->load->view('admin/tambah_pendonor', $data);
        }
    }

    public function detail_pendonor($id)
    {
        $data['title'] = 'Detail pendonor';
        $data['pendonor'] = $this->Authen->getAllPendonor();
        $data['detail'] = $this->Authen->pendonor_detail($id);
        $this->load->view('admin/detail_pendonor', $data, FALSE);
    }

    public function editpendonor($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'Alamat PMI', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
        $this->form_validation->set_rules('kantong', 'Banyak Kantong', 'trim|required|numeric');


        if ($this->form_validation->run() == TRUE) {
            date_default_timezone_set('Asia/Makassar');
            $t = time();
            $date = date("Y/m/d H:i:s", $t);

            $data = [
                'id' => $this->input->post('id'),
                'id_account' => $this->input->post('id_account'),
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'umur' => $this->input->post('umur'),
                'goldar' => $this->input->post('goldar') ? $this->input->post('goldar') : 0,
                'banyak_kantong' => $this->input->post('kantong'),
                'alamat_pmi' => $this->input->post('lokasi'),
                'waktu' => $date
            ];

            if (is_numeric($data['goldar'])) {
                $this->session->set_flashdata('fail', 'Data gagal diubah, Golongan darah tidak valid');

                redirect('admin/editpendonor/' . $data['id']);
            }

            $this->Authen->editpendonor($data);

            $this->session->set_flashdata('succ', 'Data berhasil diubah');
            redirect('admin/pendonor');
        } else {
            $data['donor'] = $this->Authen->pendonor_detail($id);
            $data['title'] = 'Input data penerima donor';
            $this->load->view('admin/edit_pendonor', $data);
        }
    }
    public function hapusPendonor($id)
    {
        $data['id'] = $id;
        $this->Authen->pendonorHapus($data);

        $this->session->set_flashdata('succ', 'Data berhasil dihapus');

        redirect('admin/pendonor');
    }

    public function member()
    {
        $data = [
            'title' => 'Profile',
            'akun' => $this->Authen->getAkun()
        ];
        $data['title'] = 'Data Member';
        $data['user'] = $this->db->get_where('akun', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('admin/member', $data);
    }

    public function editmember($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        $this->form_validation->set_rules('goldar', 'Goldar', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('notelp', 'Notelp', 'trim|required');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id' => $this->input->post('id'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
                'username' => $this->input->post('username'),
                'name' => $this->input->post('name'),
                'goldar' => $this->input->post('goldar') ? $this->input->post('goldar') : 0,
                'alamat' => $this->input->post('alamat'),
                'notelp' => $this->input->post('notelp'),
            ];

            if (is_numeric($data['goldar'])) {
                $this->session->set_flashdata('fail', 'Data gagal diubah, Golongan darah tidak valid');

                redirect('admin/editmember/' . $data['id']);
            }

            $this->Authen->editmember($data);

            $this->session->set_flashdata('succ', 'Data berhasil diubah');
            redirect('admin/member');
        } else {
            $data['user'] = $this->Authen->login(
                $this->session->userdata('email')
            );
            $data['member'] = $this->Authen->member_detail($id);
            $data['title'] = 'Edit Member Pendonor';
            $this->load->view('admin/edit_member', $data);
        }
    }
}
    
    /* End of file User.php */
