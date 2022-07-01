<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_masjid');

		$this->load->model('m_grafik');
		$this->load->helper('rupiah_helper');
		if (!$this->session->userdata("level") == "admin") {
			redirect('login');
		}
	}

	// Halaman dasbor
	public function index()
	{
		$this->load->model('m_user');
		//settingdata masjid
		$id = $this->session->userdata("user_id");
		$data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
		$data['logo'] = $this->m_masjid->detail()->masjid_logo;
		$data['namauser'] = $this->m_user->getuser($id)->user_nama;


		//

		//get data in card
		$data['totalpemasukan'] = $this->db->query(" SELECT SUM(pemasukan_jumlah) AS total FROM tbl_pemasukan ")->row();
		$bulanini = date('m');
		 $pemasukanbulanini= $this->db->query("SELECT  MONTH(pemasukan_tanggal) AS Month, SUM(pemasukan_jumlah) AS pemasukan
		 FROM tbl_pemasukan
		 WHERE MONTH(pemasukan_tanggal) = '$bulanini'
		 GROUP BY  MONTH(pemasukan_tanggal) ")->row();
		$realpemasukanbulanini=null;
		 if ($pemasukanbulanini == '') {
			$realpemasukanbulanini= 0;
		} else {
			$realpemasukanbulanini=$pemasukanbulanini->pemasukan;
		 }
		 

		$data['pemasukanbulanini']=$realpemasukanbulanini;
		$data['totalpengeluaran'] = $this->db->query(" SELECT SUM(pengeluaran_jumlah) AS total FROM tbl_pengeluaran ")->row();
		$data['pengeluaranbulanini'] = $this->db->query("SELECT SUM(pengeluaran_jumlah) AS pengeluaran FROM tbl_pengeluaran WHERE MONTH(pengeluaran_tanggal) = '$bulanini'  ")->row();

		$data['grafikpemasukan'] = $this->m_grafik->get_data_pemasukan();
		$data['grafikpengeluaran'] = $this->m_grafik->get_data_pengeluaran();

		//
		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/dashboard', $data);
		$this->load->view('paneladmin/partials/footerdashboard', $data);
	}
}
