<?php
class C_galeri extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_masjid');
        $this->load->model('m_gallery');
        $this->load->helper(array('form', 'url', 'html'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->path = FCPATH . ".uploads/gallery/";

        //cek session loginz
        if (!$this->session->userdata("level") == "admin") {
            redirect('login');
        }
    }

    public function index()
    {
        if ($this->session->userdata('success_msg')) {
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if ($this->session->userdata('error_msg')) {
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        $this->load->model('m_user');
        //settingdata masjid
        $id = $this->session->userdata("user_id");
        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;
        $data['namauser'] = $this->m_user->getuser($id)->user_nama;


        //

        $data['judul'] = 'Kelola Gallery';

        $this->load->view('paneladmin/partials/header', $data);
        $this->load->view('paneladmin/partials/sidebar', $data);
        $this->load->view('paneladmin/v_galeri', $data);
        $this->load->view('paneladmin/partials/footergaleri', $data);
    }


    public function getdata()
    {

        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        $query = $this->m_gallery->get_data();
        $data = [];
        $no = 0;
        foreach ($query->result() as $key => $lists) {
            $no++;
            $data[$key][]  = $no;
            $data[$key][]  = '
                    <a href="' . base_url() . 'uploads/gallery/' . $lists->galeri_foto . '" data-toggle="lightbox" data-title="' . $lists->galeri_nama . '" data-gallery="gallery">
                      <img src="' . base_url() . 'uploads/gallery/' . $lists->galeri_foto . '" class="img-fluid mb-2" alt="' . $lists->galeri_nama . '"/>
                    </a>
                  '. ''. '<a href="javascript:;" class="btn btn-info btn-sm bedit" data="' . $lists->galeri_id . '" ><i class="fa fa-edit nav-icon"></i>Judul</a>';
            $data[$key][]  = $lists->galeri_nama;
            $data[$key][]  = $lists->namauser;

            $data[$key][]  = ' <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->galeri_id . '"><i class="fa fa-trash nav-icon"></i></a>';
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

    public function simpan()
    {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileSize = $_FILES['file']['size'];
            $targetPath = './uploads/gallery/';
            $targetFile = $targetPath . $fileName;
           
            move_uploaded_file($tempFile, $targetFile);
            $user = $this->session->userdata("user_id");
            $this->db->insert('tbl_galery', array( 'galeri_user' => $user, 'galeri_foto' => $fileName));
        }
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

    public function add()
    {
        $data = $galleryData = array();
        $errorUpload = '';

        // If add request is submitted 
        if ($this->input->post('imgSubmit')) {
            // Form field validation rules 
            $this->form_validation->set_rules('title', 'gallery title', 'required');

            // Prepare gallery data 
            $galleryData = array(
                'title' => $this->input->post('title')
            );

            // Validate submitted form data 
            if ($this->form_validation->run() == true) {
                // Insert gallery data 
                $insert = $this->m_gallery->insert($galleryData);
                $galleryID = $insert;

                if ($insert) {
                    if (!empty($_FILES['images']['name'])) {
                        $filesCount = count($_FILES['images']['name']);
                        for ($i = 0; $i < $filesCount; $i++) {
                            $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i];
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i];

                            // File upload configuration 
                            $this->_configUpload();


                            // Upload file to server 
                            if ($this->upload->do_upload('file')) {
                                // Uploaded file data 
                                $fileData = $this->upload->data();
                                $this->_compressImg($fileData['file_name']);
                                $uploadData[$i]['gallery_id'] = $galleryID;
                                $uploadData[$i]['file_name'] = $fileData['file_name'];
                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
                            } else {
                                echo 'error';
                            }
                        }

                        // File upload error message 
                        $errorUpload = !empty($errorUpload) ? ' Upload Error: ' . trim($errorUpload, ' | ') : '';

                        if (!empty($uploadData)) {
                            // Insert files info into the database 
                            $insert = $this->m_gallery->insertImage($uploadData);
                        }
                    }

                    $this->session->set_userdata('success_msg', 'Gallery has been added successfully.' . $errorUpload);
                    redirect('k_galeri/index');
                } else {
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }

        $data['gallery'] = $galleryData;
        $data['title'] = 'Create Gallery';
        $data['action'] = 'Add';

        //settingdata masjid

        $data['judulweb'] = $this->m_masjid->detail()->masjid_nama;
        $data['logo'] = $this->m_masjid->detail()->masjid_logo;

        //

        $data['judul'] = 'Kelola Gallery';

        $this->load->view('paneladmin/partials/header', $data);
        $this->load->view('paneladmin/partials/sidebar', $data);
        $this->load->view('paneladmin/gallery/tambah', $data);
        $this->load->view('paneladmin/partials/footergaleri', $data);
    }



    public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->query("select * from tbl_galery where galeri_id = '$koser'");
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'judul' => $data->galeri_nama,
					

				);
			}
		}
		echo json_encode($hasil);
	}

    public function simpanedit()
	{

		$data = array(
			
			'galeri_nama' => $this->input->post('judul'),

		);
		$this->db->where('galeri_id', $this->input->post('id'));
		$simpan = $this->db->update('tbl_galery', $data);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


    public function delete($id)
    {
        // Check whether id is not empty 
        if ($id) {
            $galleryData = $this->m_gallery->getRows($id);

            // Delete gallery data 
            $delete = $this->m_gallery->delete($id);

            if ($delete) {
                // Delete images data  
                $condition = array('gallery_id' => $id);
                $deleteImg = $this->m_gallery->deleteImage($condition);

                // Remove files from the server  
                if (!empty($galleryData['images'])) {
                    foreach ($galleryData['images'] as $img) {
                        @unlink('uploads/images/' . $img['file_name']);
                    }
                }

                $this->session->set_userdata('success_msg', 'Gallery has been removed successfully.');
            } else {
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('k_galeri/index');
    }

    public function deleteImage()
    {
        $status  = 'err';
        // If post request is submitted via ajax 
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $imgData = $this->m_gallery->getImgRow($id);

            // Delete image data 
            $con = array('id_foto' => $id);
            $delete = $this->m_gallery->deleteImage($con);

            if ($delete) {
                // Remove files from the server  
                @unlink('uploads/images/' . $imgData['file_name']);
                $status = 'ok';
            }
        }
        echo $status;
        die;
    }


    public function hapus()
    {
        $id = $this->input->post('id');
        $galeri = $this->db->query("select * from tbl_galery where galeri_id = '$id' ")->row();
        $data = $this->db->query("DELETE FROM tbl_galery WHERE galeri_id = '$id' ");
        if ($data) {
            unlink("uploads/gallery/" . $galeri->galeri_foto);
            echo 'success';
        } else {
            echo 'error';
        }
    }
}