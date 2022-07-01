<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pemasukan extends CI_Controller
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

		$data['judul'] = 'Kelola Pemasukan';

		$data['judul'] = 'Kelola Data Pemasukan';
		$this->db->order_by('jenis_id', 'ASC');
		$data['jenispemasukan'] = $this->db->get('tbl_jenis_pemasukan')->result();
		//sum pemasukan



		$this->load->view('paneladmin/partials/header', $data);
		$this->load->view('paneladmin/partials/sidebar', $data);
		$this->load->view('paneladmin/v_pemasukan', $data);
		$this->load->view('paneladmin/partials/footerpemasukan', $data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$jenis = $this->input->get("jenis");

		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$totaltoal = $this->db->query(" SELECT SUM(pemasukan_jumlah) AS total FROM tbl_pemasukan ")->row();
		$bulanini = date('m');
		$pemasukanbulanini = $this->db->query("SELECT  MONTH(pemasukan_tanggal) AS Month, SUM(pemasukan_jumlah) AS TotalBulan
        FROM tbl_pemasukan
        WHERE MONTH(pemasukan_tanggal) = '$bulanini'
        GROUP BY  MONTH(pemasukan_tanggal) ")->row();

		$realpemasukanbulanini=null;
		if ($pemasukanbulanini=='') {
			$realpemasukanbulanini=0;
		} else {
		$realpemasukanbulanini=$pemasukanbulanini->TotalBulan;
		}
		


		if ($jenis == 'all') {
			$query = $this->db->query(" SELECT tbl_pemasukan.*,tbl_user.`user_nama` AS namauser, tbl_jenis_pemasukan.`jenis_nama` FROM
        tbl_pemasukan , tbl_user, tbl_jenis_pemasukan WHERE
        tbl_pemasukan.`pemasukan_user`= tbl_user.`user_id` AND tbl_pemasukan.`pemasukan_jenis`= tbl_jenis_pemasukan.`jenis_id`   Order by pemasukan_tanggal DESC");
		} else {
			$query = $this->db->query(" SELECT tbl_pemasukan.*,tbl_user.`user_nama` AS namauser, tbl_jenis_pemasukan.`jenis_nama` FROM
        tbl_pemasukan , tbl_user, tbl_jenis_pemasukan WHERE
        tbl_pemasukan.`pemasukan_user`= tbl_user.`user_id` AND tbl_pemasukan.`pemasukan_jenis`= tbl_jenis_pemasukan.`jenis_id` AND pemasukan_jenis ='$jenis'  Order by pemasukan_tanggal DESC ");
		}



		$data = [];
		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
			$data[$key][]  = $no;
			$data[$key][]  = $lists->namauser;
			$data[$key][]  = $lists->jenis_nama;
			$data[$key][]  = '<span class="badge rounded-pill bg-success">Rp. ' . rupiah($lists->pemasukan_jumlah) . ' </span>';
			$data[$key][]  = $lists->pemasukan_tanggal;
			$data[$key][]  = '<a href="javascript:;" alt="Edit" class="btn btn-warning btn-sm bedit" data="' . $lists->pemasukan_id . '" > <i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->pemasukan_id . '"><i class="fa fa-trash nav-icon"></a>';
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data,
			"jenis" => $jenis,
			'total'    =>  '
                   <div class="info-box bg-light ">
                     <span class="info-box-icon bg-success"><i class="fas fa-comments-dollar"></i></span>
       
                     <div class="info-box-content">
                       <span class="info-box-text"> Total Pemasukan :</span>
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
                       <span class="info-box-text">Pemasukan Bulan ini :</span>
                       <span class="info-box-number text-primary"><h5>Rp. ' . rupiah($realpemasukanbulanini) . '</h5></span> <strong>per tanggal</strong> ' . date("d/m/Y") . '
                       
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
		$jenis = $this->input->post('jenis');
		$tanggal = $this->input->post('tanggal');


		$datasimpan = array(

			'pemasukan_user' => $this->session->userdata("user_id"),
			'pemasukan_jenis' => $jenis,
			'pemasukan_jumlah	' => $jumlah,
			'pemasukan_tanggal' => $tanggal,

		);

		$data = $this->db->insert('tbl_pemasukan', $datasimpan);
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$jenispemasukan = $this->db->query('select * from tbl_jenis_pemasukan')->result();
		$user = $this->db->query(" SELECT tbl_pemasukan.*,tbl_user.`user_nama` AS namauser, tbl_jenis_pemasukan.`jenis_nama` FROM tbl_pemasukan , tbl_user, tbl_jenis_pemasukan WHERE tbl_pemasukan.`pemasukan_user`= tbl_user.`user_id` AND tbl_pemasukan.`pemasukan_jenis`= tbl_jenis_pemasukan.`jenis_id` AND tbl_pemasukan.`pemasukan_id` = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'jumlah' => $data->pemasukan_jumlah,
					'tanggal' => $data->pemasukan_tanggal,
					'jenis' => $data->pemasukan_jenis,
					'namajenis' => $data->jenis_nama,
					'ljenis' => $jenispemasukan,

				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpan_edit()
	{

		$jumlah = $this->input->post('jumlah');
		$jenis = $this->input->post('jenis');
		$tanggal = $this->input->post('tanggal');





		$datasimpan = array(

			'pemasukan_user' => $this->session->userdata("user_id"),
			'pemasukan_jenis' => $jenis,
			'pemasukan_jumlah	' => $jumlah,
			'pemasukan_tanggal' => $tanggal,

		);

		$this->db->where('pemasukan_id', $this->input->post('id'));
		$simpan = $this->db->update('tbl_pemasukan', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{
		$id = $this->input->post('id');
		$data = $this->db->query("DELETE FROM tbl_pemasukan WHERE pemasukan_id = '$id' ");
		echo json_encode($id);
	}
}
