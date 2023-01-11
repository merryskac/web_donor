<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authen');
    }

    public function checkLogin()
    {
        if (
            $this->session->userdata('email') == ''
        ) {
            $this->session->set_flashdata('fail', 'Login Required!');

            die(redirect("auth/login"));
            return;
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
        $config['base_url'] = "http://localhost/donor3/donor/user/index";
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

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $data['start'] = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['donor'] = $this->Authen->getTheDonor($config['per_page'], $data['start']);
        $data['title'] = 'Input data penerima donor';



        $this->load->view('user/index', $data);
    }

    public function detail($id)
    {

        $data['title'] = 'Detail Penerima donor';

        $data['donor_id'] = $this->Authen->get_donor_detail($id);
        $this->load->view('user/donor_detail', $data);
    }
    public function detailInput($id)
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = 'Detail Penerima donor';

        $data['donor_id'] = $this->Authen->get_donor_detail($id);

        $this->load->view('user/input_detail', $data);
    }

    public function butuh_darah()
    {

        $this->checkLogin();
        date_default_timezone_set('Asia/Makassar');
        $t = time();
        $date = date("Y/m/d H:i:s", $t);
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data_donor = [
            'id_account' =>
            $this->session->userdata('id'),

            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'umur' => $this->input->post('umur'),
            'goldar' => $this->input->post('goldar') ? $this->input->post('goldar') : 0,
            'banyak_kantong' => $this->input->post('kantong'),
            'urgent' => $this->input->post('urgent'),
            'done' => '0',
            'waktu' => $date
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

        $this->form_validation->set_rules('umur', 'Umur', 'trim|required|numeric');
        $this->form_validation->set_rules('kantong', 'Banyak Kantong', 'trim|required|numeric');
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );

        if ($this->form_validation->run() == TRUE) {
            if (is_numeric($data_donor['goldar'])) {
                $this->session->set_flashdata('fail', 'Data gagal diubah, Golongan darah tidak valid');

                redirect('user/butuh_darah');
            }

            $this->Authen->butuh_darah($data_donor);

            $this->session->set_flashdata('succ', 'Data berhasil diinput');
            redirect('user/index');
        } else {
            $data['title'] = 'Input data penerima donor';
            $this->load->view('user/butuh_darah', $data);
        }
    }
    public function  syarat_donor()
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = 'Syarat Pendonor';
        $this->load->view('user/syarat_donor', $data);
    }

    public function latar_belakang()
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = "Latar Belakang Program";
        $this->load->view('user/latar_belakang', $data);
    }

    public function inputanSaya()
    {
        $this->checkLogin();
        $data['donor'] = $this->Authen->getSomeDonors($this->session->userdata('id'));
        $data['title'] = 'Inputan Saya';
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );


        $this->load->view('user/inputan_saya', $data);
    }

    public function hapus($id)
    {

        $data['id'] = $id;

        $this->Authen->delete($data);
        $this->session->set_flashdata('succ', 'Data dihapus');

        redirect('user/inputanSaya');
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

                redirect('user/edit/' . $data['id']);
            }
            $this->Authen->edit_data($data);

            $this->session->set_flashdata('succ', 'Data berhasil diubah');
            redirect('user/inputanSaya');
        } else {
            $data['donor'] = $this->Authen->get_donor_detail($id);
            $data['title'] = 'Input data penerima donor';
            $this->load->view('user/edit', $data);
        }
    }

    public function map()
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = "Map PMI Kota Palu";
        $this->load->view('user/map', $data);
    }

    public function about_dev()
    {
        $data['user'] = $this->Authen->login(
            $this->session->userdata('email')
        );
        $data['title'] = "About";
        $this->load->view('user/about', $data);
    }
}
    
    /* End of file User.php */
