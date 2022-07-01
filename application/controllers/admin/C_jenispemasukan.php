<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jenispemasukan extends CI_Controller
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


		//

		$data['judul'] = 'Kelola Jenis Pemasukan';

		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_jenispemasukan', $data);
		$this->load->view('paneladmin/partials/footerjenispemasukan', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->get("tbl_jenis_pemasukan");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;


			$data[$key][]  = $lists->jenis_nama;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->jenis_id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->jenis_id . '"><i class="fa fa-trash nav-icon"></i></a>';
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



	function simpan()
	{


		$nama = $this->input->post('nama');

		$datasimpan = array(

			'jenis_nama	' => $nama,
		);

		$data = $this->db->insert('tbl_jenis_pemasukan', $datasimpan);
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from tbl_jenis_pemasukan where jenis_id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'nama' => $data->jenis_nama,
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{

		$data = array(
			'jenis_nama' => $this->input->post('nama'),
		);
		$this->db->where('jenis_id', $this->input->post('id'));
		$simpan = $this->db->update('tbl_jenis_pemasukan', $data);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_jenis_pemasukan WHERE jenis_id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
