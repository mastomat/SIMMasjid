<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_user extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_masjid');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');

		//cek session login
		if (!$this->session->userdata("level") == "admin") {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('m_user');
		//settingdata masjid
		$id = $this->session->userdata("user_id");
		$data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
		$data['logo'] = $this->m_masjid->detail()->masjid_logo;
		$data['namauser'] = $this->m_user->getuser($id)->user_nama;


		

		$data['judul'] = 'Kelola User/Pengguna';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/kelolauser', $data);
		$this->load->view('paneladmin/partials/footeruser', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->get("tbl_user");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;


			$data[$key][]  = $lists->user_nama;
			$data[$key][]  = $lists->user_username;
			$data[$key][]  = MD5($lists->user_password);
			$data[$key][]  = $lists->role;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->user_id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->user_id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);


		echo json_encode($result);
		exit();
	}


		//fungsi nyimpen data user 
	function simpan_user()
	{
		$this->load->model('m_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$role = $this->input->post('role');

		$datasimpan = array(

			'user_username' => $username,
			'user_password' => $password,
			'user_nama	' => $nama,
			'role	' => $role,
		);
		$cek = $this->db->get_where('tbl_user', array('user_username' => $username));
		if ($cek->num_rows() > 0) {
			echo 'ada';
		} else {
			$data = $this->db->insert('tbl_user', $datasimpan);
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from tbl_user where user_id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'nama' => $data->user_nama,
					'username' => $data->user_username,
					'password' => $data->user_password,
					'level' => $data->role,

				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{

		$data = array(
			'user_username' => $this->input->post('username'),
			'user_password' => $this->input->post('password'),
			'user_nama' => $this->input->post('nama'),
			'role' => $this->input->post('role'),

		);
		$this->db->where('user_id', $this->input->post('id'));
		$simpan = $this->db->update('tbl_user', $data);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus_user()
	{
		$user = $this->db->query("select * from tbl_user ");
		$id = $this->input->post('id');
		if ($user->num_rows() == 1) {
			echo 'ada';
		} else {
			$data = $this->db->query("DELETE FROM tbl_user WHERE user_id = '$id' ");
			if ($data) {
				echo 'success';
			} else {
				echo 'error';
			}
		}
	}

	public function profil(){
		$this->load->model('m_user');
		//settingdata masjid
		$id = $this->session->userdata("user_id");
		$data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
		$data['logo'] = $this->m_masjid->detail()->masjid_logo;
		$data['namauser'] = $this->m_user->getuser($id)->user_nama;


		

		$data['judul'] = 'Setting Profil';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/profil', $data);
		$this->load->view('paneladmin/partials/footerprofil', $data);


	}

	public function simpannama()
	{
		$id = $this->session->userdata("user_id");
		$data = array(
			
			'user_nama' => $this->input->post('nama'),
			

		);
		$this->db->where('user_id', $this->session->userdata("user_id"));
		$simpan = $this->db->update('tbl_user', $data);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function simpanpw()
	{
		$id = $this->session->userdata("user_id");
		$data = array(
			
			'user_password' => $this->input->post('password'),
			

		);
		$this->db->where('user_id', $this->session->userdata("user_id"));
		$simpan = $this->db->update('tbl_user', $data);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


}
