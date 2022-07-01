<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->model('m_masjid');
        //settingdata masjid

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;

        $this->load->view('user_login', $data);
    }


    public function cek_admin()
    {
        //load model M_user
        $this->load->model('m_user');

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->m_user->cek_admin($username, $password);

        if (!empty($cek)) {

            foreach ($cek as $user) {

                //looping data user
                $session_data = array(
                    'user_id'   => $user->user_id,
                    'user_username'  => $user->user_username,
                    'user_nama' => $user->user_nama,
                    'role' => $user->role,
                    'level' => "admin"
                );
                //buat session berdasarkan user yang login
                $this->session->set_userdata($session_data);
            }

            echo "success";
        } else {

            echo "error";
        }
    }


    public function logout()
    {
        //hapus session
        $this->session->sess_destroy();

        redirect('login');
    }
}
