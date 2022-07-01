<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengumuman extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_masjid');
        $this->load->model('m_pengumuman');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->path = FCPATH . "uploads/pengumuman/";
        $this->path2 = FCPATH . "uploads/pengumuman/isi/";


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

        $data['judul'] = 'Kelola pengumuman';

        $this->load->view('paneladmin/partials/header', $data);
        $this->load->view('paneladmin/partials/sidebar', $data);
        $this->load->view('paneladmin/v_pengumuman', $data);
        $this->load->view('paneladmin/partials/footerpengumuman', $data);
    }


    public function getdata()
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
            $data[$key][]  = $lists->pengumuman_waktu;
            $data[$key][]  = $lists->pengumuman_judul;
            $data[$key][]  = $lists->user_nama;
            $data[$key][]  = '<a href="' . base_url('pengumuman/') . $lists->pengumuman_slug . '"  target="_blank" class="btn btn-info btn-sm " data="' . $lists->pengumuman_slug . '" ><i class="fa fa-eye"></i></a> <a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->pengumuman_id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->pengumuman_id . '"><i class="fa fa-trash nav-icon"></i></a>';
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

    private function _configUpload()
    {
        $config['upload_path'] = $this->path;
        $config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
    }

    private function _compressImg($name)
    {
        $config['image_library']    = 'gd2';
        $config['source_image']     = $this->path . $name;
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = TRUE;
        $config['quality']          = '70%';
        $config['new_image']        = $this->path . $name;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    function simpan_pengumuman()
    {

        $judul = $this->input->post('post_title');
        $isi = $this->input->post('post_body');

        $tanggal = $this->input->post('post_date');
        $user = $this->session->userdata("user_id");
        $slug = $this->m_pengumuman->create_slug($judul);

        if (!empty($_FILES['post_thumbnail']['name'])) {
            $this->_configUpload();

            if ($this->upload->do_upload('post_thumbnail')) {
                $img = $this->upload->data();

                //Compress Image
                $this->_compressImg($img['file_name']);

                $gambar = $img['file_name'];
            } else {
                echo 'gagalgambar';
                $gambar = "gagalupload";
            }
            $datasimpan = array(

                'pengumuman_judul' => $judul,
                'pengumuman_waktu' => $tanggal,
                'pengumuman_isi' => $isi,
                'pengumuman_slug' => $slug,
                'pengumuman_user' => $user,
                'pengumuman_foto' => $gambar

            );

            $data = $this->db->insert('tbl_pengumuman', $datasimpan);
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
        $user = $this->db->query("select * from tbl_pengumuman where pengumuman_id = '$koser'");
        if ($user->num_rows() > 0) {
            foreach ($user->result() as $data) {
                $hasil = array(
                    'judul' => $data->pengumuman_judul,
                    'isi' => $data->pengumuman_isi,
                    'foto' => $data->pengumuman_foto,
                    'tanggal' => $data->pengumuman_waktu,
                    'id' => $data->pengumuman_id,
                );
            }
        }
        echo json_encode($hasil);
    }

    public function simpanedit()
    {

        $judul = $this->input->post('epost_title');
        $isi = $this->input->post('epost_body');
        $id = $this->input->post('kodedit');


        $tanggal = $this->input->post('epost_date');
        $user = $this->session->userdata("user_id");
        $slug = $this->m_pengumuman->create_slug($judul);
        $cariold = $this->db->get_where('tbl_pengumuman', array('pengumuman_id' => $id))->row();

        if (!empty($_FILES['epost_thumbnail']['name'])) {
            $oldimg = $cariold->pengumuman_foto;
            if ($oldimg) {
                if (is_file($this->path . $oldimg)) {
                    unlink($this->path . $oldimg);
                }
            }
            $this->_configUpload();

            if ($this->upload->do_upload('epost_thumbnail')) {
                $img = $this->upload->data();

                //Compress Image
                $this->_compressImg($img['file_name']);

                $gambar = $img['file_name'];
            } else {
                echo 'gagalgambar';
                $gambar = "gagalupload";
            }
            $datasimpan = array(

                'pengumuman_judul' => $judul,
                'pengumuman_waktu' => $tanggal,
                'pengumuman_isi' => $isi,
                'pengumuman_slug' => $slug,
                'pengumuman_user' => $user,
                'pengumuman_foto' => $gambar

            );
            $this->db->where('pengumuman_id', $this->input->post('kodedit'));
            $data = $this->db->update('tbl_pengumuman', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            $datasimpan = array(

                'pengumuman_judul' => $judul,
                'pengumuman_waktu' => $tanggal,
                'pengumuman_isi' => $isi,
                'pengumuman_slug' => $slug,
                'pengumuman_user' => $user,


            );
            $this->db->where('pengumuman_id', $this->input->post('kodedit'));
            $data = $this->db->update('tbl_pengumuman', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }


    public function hapus_pengumuman()
    {

        $id = $this->input->post('id');
        $pengumuman = $this->db->query("select * from tbl_pengumuman where pengumuman_id ='$id' ")->row();

        if ($pengumuman) {
            $this->deleteContentImage($pengumuman->pengumuman_isi);
            $img = $pengumuman->pengumuman_foto;
            $image = $this->path . $img;

            if ($img) {
                if (is_file($image)) {
                    unlink($image);
                }
            }
            $data = $this->db->query("DELETE FROM tbl_pengumuman WHERE pengumuman_id = '$id' ");
            if ($data) {
                echo 'success';
            } else {
                echo 'success';
            }
        } else {
            echo 'success';
        }
    }

    public function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $path = FCPATH . '/uploads/pengumuman/isi/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp|docx|pdf';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = $path . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 800;
                $config['height'] = 800;
                $config['new_image'] = $path . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url('uploads/pengumuman/isi/') . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }

    public function deleteContentImage($content)
    {

       
       $data= preg_match_all('/<img[^>]+>/i', $content, $imgTags);

       if($data != null){
        for ($i = 0; $i < count($imgTags[0]); $i++) {
            preg_match('/src="([^"]+)/i', $imgTags[0][$i], $imgage);
            $images[] = str_ireplace('src="', '',  $imgage[0]);
        }
            foreach ($images as $image) {
                $extract = explode('/', $image);
                $img = end($extract);
    
                $thumbnail = $this->path2 . $img;
                if (is_file($thumbnail)) {
                    unlink($thumbnail);
                }
            }
        }
       
    }
}
