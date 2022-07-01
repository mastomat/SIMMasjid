<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengeluaran extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_masjid');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper('rupiah_helper');


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



		$data['judul'] = 'Kelola Data Pengeluaran';

		//sum pemasukan



		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_pengeluaran', $data);
		$this->load->view('paneladmin/partials/footerpengeluaran', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));


		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$totaltoal = $this->db->query(" SELECT SUM(pengeluaran_jumlah) AS total FROM tbl_pengeluaran ")->row();
		$bulanini = date('m');
		$pengeluaranbulanini = $this->db->query("SELECT SUM(pengeluaran_jumlah) AS pengeluaran FROM tbl_pengeluaran WHERE MONTH(pengeluaran_tanggal) = '$bulanini'  ")->row();



		$query = $this->db->query(" SELECT tbl_pengeluaran.*,tbl_user.`user_nama` AS namauser FROM
        tbl_pengeluaran, tbl_user WHERE
        tbl_pengeluaran.`pengeluaran_user`= tbl_user.`user_id` Order by pengeluaran_tanggal DESC");





		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
			$data[$key][]  = $no;
			$data[$key][]  = $lists->namauser;
			$data[$key][]  = $lists->pengeluaran_ket;
			$data[$key][]  = '<span class="badge rounded-pill bg-success">Rp. ' . rupiah($lists->pengeluaran_jumlah) . ' </span>';
			$data[$key][]  = $lists->pengeluaran_tanggal;
			$data[$key][]  = '<a href="javascript:;" alt="Edit" class="btn btn-warning btn-sm bedit" data="' . $lists->pengeluaran_id . '" > <i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->pengeluaran_id . '"><i class="fa fa-trash nav-icon"></a>';
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data,

			'total'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-success"><i class="fas fa-comments-dollar"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text"> Total Pengeluaran :</span>
                       <span class="info-box-number text-primary"><h5>Rp. ' . rupiah($totaltoal->total) . '</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   ',

			'totalbulan'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-info"><i class="fas fa-comments-dollar"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text"> Total Pengeluaran Bulan ini :</span>
                       <span class="info-box-number text-primary"><h5>Rp. ' . rupiah($pengeluaranbulanini->pengeluaran) . '</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
                     </div>
                     <!-- /.info-box-content -->
                   </div>
                   <!-- /.info-box -->
               
                   '
		);


		echo json_encode($result);
		exit();
	}



	function simpan()
	{

		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		$tanggal = $this->input->post('tanggal');


		$datasimpan = array(

			'pengeluaran_user' => $this->session->userdata("user_id"),
			'pengeluaran_ket' => $keterangan,
			'pengeluaran_jumlah	' => $jumlah,
			'pengeluaran_tanggal' => $tanggal,

		);

		$data = $this->db->insert('tbl_pengeluaran', $datasimpan);
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function showedit()
	{
		$koser = $this->input->get('id');

		$user = $this->db->query(" SELECT tbl_pengeluaran.*,tbl_user.`user_nama` AS namauser FROM
        tbl_pengeluaran, tbl_user WHERE
        tbl_pengeluaran.`pengeluaran_user`= tbl_user.`user_id`   AND tbl_pengeluaran.`pengeluaran_id` = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'jumlah' => $data->pengeluaran_jumlah,
					'tanggal' => $data->pengeluaran_tanggal,
					'keterangan' => $data->pengeluaran_ket,



				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpan_edit()
	{

		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		$tanggal = $this->input->post('tanggal');

		$datasimpan = array(

			'pengeluaran_user' => $this->session->userdata("user_id"),
			'pengeluaran_ket' => $keterangan,
			'pengeluaran_jumlah	' => $jumlah,
			'pengeluaran_tanggal' => $tanggal,

		);

		$this->db->where('pengeluaran_id', $this->input->post('id'));
		$simpan = $this->db->update('tbl_pengeluaran', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("DELETE FROM tbl_pengeluaran WHERE pengeluaran_id = '$id' ");
		echo json_encode($id);
	}
}
