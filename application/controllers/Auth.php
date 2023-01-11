<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Authen');

        //Do your magic here
    }


    public function index()
    {
        $data['title'] = 'landing - AYO DONOR DARAH!';
        $this->load->view('landing', $data);
    }

    public function signup()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[akun.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('pass2', 'Password Confirmation', 'required|matches[pass1]');



        if ($this->form_validation->run() == false) {
            # code...
            $data['title'] = 'Sign Up';
            $this->load->view('signup', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'pass1' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
                'profile_pic' => 'default.png',
                'role' => 2,
                'goldar' => '',
                'alamat' => '',
                'notelp' => ''
            ];

            $this->db->insert('akun', $data);

            $this->session->set_flashdata('succ', 'Akun berhasil dibuat');
            redirect('auth/login');
        }
    }

    public function login()
    {
        if (!empty($this->session->userdata('role_id'))) {
            if ($this->session->userdata('role_id') == 1) {
                $this->session->set_flashdata('login', 'Anda sudah login sebagai Admin');
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('login', 'Anda sudah login sebagai user ' .
                    $this->session->userdata('uname'));
                redirect('user/index');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pass1', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'LOGIN';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass1');

        $user = $this->Authen->login($email);

        if ($user) {

            if (password_verify($pass, $user['pass1'])) {
                $data = [
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'role_id' => $user['role'],
                    'id' => $user['id'],
                    'uname' => $user['username']
                ];
                if ($data['role_id'] == 2) {
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_userdata($data);
                    redirect('admin/index');
                }
            } else {
                print_r($user);
                print_r($pass);
                $this->session->set_flashdata('fail', 'Pass salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('fail', 'Email belum terdaftar');
            redirect('auth/login');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('succ', 'Logout berhasil!');

        redirect('auth/login');
    }
}

    
    
    /* End of file Auth.php */
