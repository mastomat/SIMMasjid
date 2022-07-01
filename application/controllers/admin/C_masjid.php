<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_masjid extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //	$this->load->model('users_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('m_masjid');

        $this->path = FCPATH . "./assets/upload/logo";

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


        //seting data masjid

        $data['judul'] = 'Data Masjid';

        $this->load->view('paneladmin/partials/header', $data);
        $this->load->view('paneladmin/partials/sidebar', $data);
        $this->load->view('paneladmin/v_masjid', $data);
        $this->load->view('paneladmin/partials/footermasjid', $data);
    }





    function simpan()
    {



        $nama = $this->input->post('nama');
        $nohp = $this->input->post('nohp');
        $struktur = $this->input->post('struktur');
        $sejarah = $this->input->post('sejarah');
        $alamat = $this->input->post('alamat');
        $id = $this->input->post('id');



        $datasimpan = array(

            'masjid_nama' => $nama,
            'masjid_alamat' => $alamat,
            'masjid_struktur' => $struktur,
            'masjid_nohp' => $nohp,
            'masjid_sejarah' => $sejarah,
        );
        $cek = $this->db->get_where('tbl_masjid', array('masjid_id' => $id));
        if ($cek->num_rows() > 0) {
            $simpan = $this->db->update('tbl_masjid', $datasimpan);
            if ($simpan) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            $data = $this->db->insert('tbl_masjid', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }

    public function showdata()
    {
        $kode = $this->input->get('id');
        $user = $this->db->query("select * from tbl_masjid where masjid_id = '$kode'");
        if ($user->num_rows() > 0) {
            foreach ($user->result() as $data) {
                $hasil = array(
                    'nama' => $data->masjid_nama,
                    'nohp' => $data->masjid_nohp,
                    'alamat' => $data->masjid_alamat,
                    'struktur' => $data->masjid_struktur,
                    'sejarah' => $data->masjid_sejarah,
                    'logo' => $data->masjid_logo,
                );
            }
        }
        echo json_encode($hasil);
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
        $config['source_image']     = $this->path . '/' . $name;
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = TRUE;
        $config['quality']          = '70%';
        $config['width'] = 185;
        $config['height'] = 58;
        $config['new_image']        = $this->path . '/' . $name;

        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    public function uploadgambar()
    {

        if (!empty($_FILES['file']['name'])) {



            $img =  $this->m_masjid->detail()->masjid_logo;
            $image = $this->path . '/' . $img;
            unlink($image);
            $this->_configUpload();

            if (!$this->upload->do_upload('file')) {
                $status = "error";
                $msg = $this->upload->display_errors();
            } else {


                $dataupload = $this->upload->data();
                $this->_compressImg($dataupload['file_name']);
                $datasimpan = array(

                    'masjid_logo' => $dataupload['file_name']

                );
                $this->db->update('tbl_masjid', $datasimpan);
                $status = "success";
                $msg = $dataupload['file_name'] . " berhasil diupload";
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => $status, 'msg' => $msg)));
    }





    public function upload_image()
    {
        if (isset($_FILES["image"]["name"])) {
            $path = FCPATH . '/uploads/masjid/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
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
                echo base_url('uploads/masjid/') . $data['file_name'];
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
}
