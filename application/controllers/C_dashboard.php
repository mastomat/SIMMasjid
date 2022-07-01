<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_masjid');

        $this->load->model('m_grafik');
        $this->load->model('m_gallery');
        $this->load->model('m_kegiatan');
        $this->load->model('m_pengumuman');
        $this->load->helper('date');
        $this->load->helper('rupiah_helper');
        $this->api = "https://api.myquran.com/v1/sholat/jadwal/1014/";
        $this->api2 = "https://api.aladhan.com/v1/gToH?date=";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('pagination');
    }

    // Halaman dasbor
    public function index()
    {
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();

        $data['slider'] = $this->m_kegiatan->get_dataslider();



        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));

        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));



        //
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/partials/slider', $data);
        $this->load->view('frontend/dashboard', $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function kegiatan_list()
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();
        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));
        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));

        $data['title']  = "Kegiatan List";



        $config['base_url'] = base_url('kegiatan/list');
        $config['total_rows'] = $this->m_kegiatan->count_data();
        //untuk namabahin berapa tampilan gambar//
        $config['per_page'] = 6;
        $config['reuse_query_string'] = TRUE;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '  <div class="pagination-wrap mt-20 d-flex flex-wrap justify-content-center text-center w-100">
        <ul class="pagination mb-0">';
        $config['full_tag_close']   = '</ul>
        </div>';
        $config['num_tag_open']     = '<li class="page-item"><a class="page-link" href="javascript:void(0);" title="">';
        $config['num_tag_close']    = '</a></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item next bg-dark text-white"><a  class="page-link"  title="">';
        $config['next_tagl_close']  = '</a></li>';
        $config['prev_tag_open']    = '<li class="page-item prev  bg-dark text-white"><a class="page-link">';
        $config['prev_tagl_close']  = '</a></li>';

        $this->pagination->initialize($config);

        $start = $this->uri->segment(3);
        $data['kegiatanlists'] = $this->m_kegiatan->get_all_post($config['per_page'], $start);
        $data['pagination'] = $this->pagination->create_links();
        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/kegiatanlist', $data);
        $this->load->view('frontend/partials/footer', $data);
    }


    public function pengumuman_list()
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();
        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));
        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));


        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/pengumumanlist', $data);
        $this->load->view('frontend/partials/footer', $data);
    }
    public function get_pengumuman()
    {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));


        $query = $this->db->query(" SELECT	tbl_pengumuman.* , tbl_user.`user_nama` FROM tbl_pengumuman, tbl_user WHERE
		tbl_pengumuman.`pengumuman_user` = tbl_user.`user_id` ");


        $data = [];

        $no = 0;
        foreach ($query->result() as $key => $lists) {
            $no++;

            $data[$key][]  = $no;
            $data[$key][]  = date(
                'd M Y',
                strtotime($lists->pengumuman_waktu)
            );
            $data[$key][]  = $lists->pengumuman_judul;
            $data[$key][]  = $lists->user_nama;
            $data[$key][]  = '<a href="' . base_url('pengumuman/') . $lists->pengumuman_slug . '" class="btn btn-info btn-sm bedit" data="' . $lists->pengumuman_slug . '" ><i class="fa fa-eye"></i></a> ';
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
    public function galeri_list()
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();
        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));
        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));

        $data['title']  = "Galeri List";



        $config['base_url'] = base_url('galeri/list');
        $config['total_rows'] = $this->m_gallery->count_data();
        $config['per_page'] = 6;
        $config['reuse_query_string'] = TRUE;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '  <div class="pagination-wrap mt-20 d-flex flex-wrap justify-content-center text-center w-100">
        <ul class="pagination mb-0">';
        $config['full_tag_close']   = '</ul>
        </div>';
        $config['num_tag_open']     = '<li class="page-item"><a class="page-link" href="javascript:void(0);" title="">';
        $config['num_tag_close']    = '</a></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="javascript:void(0);" title="">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item next bg-dark text-white"><a  class="page-link"  title="">';
        $config['next_tagl_close']  = '</a></li>';
        $config['prev_tag_open']    = '<li class="page-item prev  bg-dark text-white"><a class="page-link">';
        $config['prev_tagl_close']  = '</a></li>';

        $this->pagination->initialize($config);

        $start = $this->uri->segment(3);
        $data['galerilists'] = $this->m_gallery->get_all_galeri($config['per_page'], $start);
        $data['pagination'] = $this->pagination->create_links();
        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/galerilist', $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function kegiatan_view($slug = "")
    {
        if (!$slug) {
            redirect('kegiatan/list');
        }
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();





        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));

        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));
        $detail = $this->m_kegiatan->get_post_by_slug($slug);
        if (!$detail) {
            redirect('kegiatan/list');
        }

        $data['title']  = "Kegiatan Detail";
        $data['detail']   = $this->m_kegiatan->get_post_by_slug($slug);
        $data['recent_kegiatan'] = $this->m_kegiatan->recent_post($slug);
        $data['recent_pengumuman'] = $this->m_pengumuman->recent_pengumuman($slug);


        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/kegiatandetail', $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function pengumuman_view($slug = "")
    {
        if (!$slug) {
            redirect('pengumuman/list');
        }
        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();





        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));

        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));
        $detail = $this->m_pengumuman->get_pengumuman_by_slug($slug);
        if (!$detail) {
            redirect('home');
        }


        $data['detail']   = $this->m_pengumuman->get_pengumuman_by_slug($slug);
        $data['recent_kegiatan'] = $this->m_kegiatan->recent_post($slug);
        $data['recent_pengumuman'] = $this->m_pengumuman->recent_pengumuman($slug);


        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/pengumumandetail', $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function struktur($slug = "")
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;


        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();





        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));

        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));

        $data['tampil'] = $this->m_masjid->detail()->masjid_struktur;
        $data['title']  = "Struktur Masjid";
        $data['detail']   = $this->m_kegiatan->get_post_by_slug($slug);
        $data['recent_kegiatan'] = $this->m_kegiatan->recent_post($slug);
        $data['recent_pengumuman'] = $this->m_pengumuman->recent_pengumuman($slug);


        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/profil', $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function sejarah($slug = "")
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;


        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();





        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));

        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));

        $data['tampil'] = $this->m_masjid->detail()->masjid_sejarah;
        $data['title']  = "Sejarah Masjid";
        $data['detail']   = $this->m_kegiatan->get_post_by_slug($slug);
        $data['recent_kegiatan'] = $this->m_kegiatan->recent_post($slug);
        $data['recent_pengumuman'] = $this->m_pengumuman->recent_pengumuman($slug);


        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/profil', $data);
        $this->load->view('frontend/partials/footer', $data);
    }

    public function kontak()
    {

        $hari = date('d');
        $bulan = date('m');
        $tahun = date('Y');
        $tanggal = date('d-m-Y');

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['nohp'] = $this->m_masjid->detail()->masjid_nohp;
        $data['alamat'] = $this->m_masjid->detail()->masjid_alamat;



        $data['galeri'] = $this->m_gallery->get_datadashboard();
        $data['kegiatan'] = $this->m_kegiatan->get_datadashboard();

        $data['pengumuman'] = $this->m_pengumuman->get_datadashboard();





        //API JADWAL SOLAT
        $data['jadwalsolat'] = json_decode($this->curl->simple_get($this->api . '/' . $tahun . '/' . $bulan . '/' . $hari));

        //API TANGGAL HIJIRIYAH
        $data['hijriyah'] = json_decode($this->curl->simple_get($this->api2 . $tanggal));


        $data['title']  = "Hubungi Kami";



        // view
        $this->load->view('frontend/partials/header', $data);
        $this->load->view('frontend/kontak', $data);
        $this->load->view('frontend/partials/footer', $data);
    }
}
