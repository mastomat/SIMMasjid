<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Manage_gallery extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form helper and form validation library 
        $this->load->helper('form'); 
        $this->load->library('form_validation'); 
         
        // Load gallery model 
        $this->load->model('gallery'); 
        $this->load->model('m_masjid'); 

         
        // Default controller name 
        $this->controller = 'manage_gallery'; 
    } 
     
    public function index(){ 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
 
        $data['gallery'] = $this->gallery->getRows(); 
        $data['title'] = 'Gallery Archive'; 
         
        // Load the list page view 
        //settingdata masjid
       
		 $data['judulweb']=$this->m_masjid->detail()->masjid_nama;
		 $data['logo']=$this->m_masjid->detail()->masjid_logo;
 
		 //

		$data['judul'] = 'Kelola Gallery';
		
		$this->load->view('paneladmin/partials/header',$data);
		$this->load->view('paneladmin/partials/sidebar',$data);
		$this->load->view('paneladmin/v_galeri',$data);
		$this->load->view('paneladmin/partials/footergaleri',$data);
    } 
     
    public function view($id){ 
        $data = array(); 
         
        // Check whether id is not empty 
        if(!empty($id)){ 
            $data['gallery'] = $this->gallery->getRows($id); 
            $data['title'] = $data['gallery']['title']; 
             
            // Load the details page view 
            $this->load->view('templates/header', $data); 
            $this->load->view('gallery/view', $data); 
            $this->load->view('templates/footer'); 
        }else{ 
            redirect($this->controller); 
        } 
    } 
     
    public function add(){ 
        $data = $galleryData = array(); 
        $errorUpload = ''; 
         
        // If add request is submitted 
        if($this->input->post('imgSubmit')){ 
            // Form field validation rules 
            $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $galleryData = array( 
                'title' => $this->input->post('title') 
            ); 
             
            // Validate submitted form data 
            if($this->form_validation->run() == true){ 
                // Insert gallery data 
                $insert = $this->gallery->insert($galleryData); 
                $galleryID = $insert;  
                 
                if($insert){ 
                    if(!empty($_FILES['images']['name'])){ 
                        $filesCount = count($_FILES['images']['name']); 
                        for($i = 0; $i < $filesCount; $i++){ 
                            $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                             
                            // File upload configuration 
                            $uploadPath = 'uploads/gallery/'; 
                            $config['upload_path'] = $uploadPath; 
                            $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                             
                            // Load and initialize upload library 
                            $this->load->library('upload', $config); 
                            $this->upload->initialize($config); 
                             
                            // Upload file to server 
                            if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                $fileData = $this->upload->data(); 
                                $uploadData[$i]['gallery_id'] = $galleryID; 
                                $uploadData[$i]['file_name'] = $fileData['file_name']; 
                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                            }else{ 
                                $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                            } 
                        } 
                         
                        // File upload error message 
                        $errorUpload = !empty($errorUpload)?' Upload Error: '.trim($errorUpload, ' | '):''; 
                         
                        if(!empty($uploadData)){ 
                            // Insert files info into the database 
                            $insert = $this->gallery->insertImage($uploadData); 
                        } 
                    } 
                     
                    $this->session->set_userdata('success_msg', 'Gallery has been added successfully.'.$errorUpload); 
                    redirect($this->controller); 
                }else{ 
                    $data['error_msg'] = 'Some problems occurred, please try again.'; 
                } 
            } 
        } 
         
        $data['gallery'] = $galleryData; 
        $data['title'] = 'Create Gallery'; 
        $data['action'] = 'Add'; 
         
        //settingdata masjid
       
		 $data['judulweb']=$this->m_masjid->detail()->masjid_nama;
		 $data['logo']=$this->m_masjid->detail()->masjid_logo;
 
		 //

		$data['judul'] = 'Kelola Gallery';
		
		$this->load->view('paneladmin/partials/header',$data);
		$this->load->view('paneladmin/partials/sidebar',$data);
		$this->load->view('paneladmin/gallery/add-edit',$data);
		$this->load->view('paneladmin/partials/footergaleri',$data);
    } 
     
    public function edit($id){ 
        $data = $galleryData = array(); 
         
        // Get gallery data 
        $galleryData = $this->gallery->getRows($id); 
         
        // If update request is submitted 
        if($this->input->post('imgSubmit')){ 
            // Form field validation rules 
            $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $galleryData = array( 
                'title' => $this->input->post('title') 
            ); 
             
            // Validate submitted form data 
            if($this->form_validation->run() == true){ 
                // Update gallery data 
                $update = $this->gallery->update($galleryData, $id); 
 
                if($update){ 
                    if(!empty($_FILES['images']['name'])){ 
                        $filesCount = count($_FILES['images']['name']); 
                        for($i = 0; $i < $filesCount; $i++){ 
                            $_FILES['file']['name']     = $_FILES['images']['name'][$i]; 
                            $_FILES['file']['type']     = $_FILES['images']['type'][$i]; 
                            $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i]; 
                            $_FILES['file']['error']    = $_FILES['images']['error'][$i]; 
                            $_FILES['file']['size']     = $_FILES['images']['size'][$i]; 
                             
                            // File upload configuration 
                            $uploadPath = 'uploads/gallery/'; 
                            $config['upload_path'] = $uploadPath; 
                            $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                             
                            // Load and initialize upload library 
                            $this->load->library('upload', $config); 
                            $this->upload->initialize($config); 
                             
                            // Upload file to server 
                            if($this->upload->do_upload('file')){ 
                                // Uploaded file data 
                                $fileData = $this->upload->data(); 
                                $uploadData[$i]['gallery_id'] = $id; 
                                $uploadData[$i]['file_name'] = $fileData['file_name']; 
                                $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s"); 
                            }else{ 
                                $errorUpload .= $fileImages[$key].'('.$this->upload->display_errors('', '').') | ';  
                            } 
                        } 
                         
                        // File upload error message 
                        $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                         
                        if(!empty($uploadData)){ 
                            // Insert files data into the database 
                            $insert = $this->gallery->insertImage($uploadData); 
                        } 
                    } 
 
                    $this->session->set_userdata('success_msg', 'Gallery has been updated successfully.'.$errorUpload); 
                    redirect($this->controller); 
                }else{ 
                    $data['error_msg'] = 'Some problems occurred, please try again.'; 
                } 
            } 
        } 
 
         
        $data['gallery'] = $galleryData; 
        $data['title'] = 'Update Gallery'; 
        $data['action'] = 'Edit'; 
         
       
		 $data['judulweb']=$this->m_masjid->detail()->masjid_nama;
		 $data['logo']=$this->m_masjid->detail()->masjid_logo;
 
		 //

		$data['judul'] = 'Kelola Gallery';
		
		$this->load->view('paneladmin/partials/header',$data);
		$this->load->view('paneladmin/partials/sidebar',$data);
		$this->load->view('paneladmin/gallery/add-edit',$data);
		$this->load->view('paneladmin/partials/footergaleri',$data);
    } 
     
    public function block($id){ 
        // Check whether gallery id is not empty 
        if($id){ 
            // Update gallery status 
            $data = array('status' => 0); 
            $update = $this->gallery->update($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'Gallery has been blocked successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function unblock($id){ 
        // Check whether gallery id is not empty 
        if($id){ 
            // Update gallery status 
            $data = array('status' => 1); 
            $update = $this->gallery->update($data, $id); 
             
            if($update){ 
                $this->session->set_userdata('success_msg', 'Gallery has been activated successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function delete($id){ 
        // Check whether id is not empty 
        if($id){ 
            $galleryData = $this->gallery->getRows($id); 
             
            // Delete gallery data 
            $delete = $this->gallery->delete($id); 
             
            if($delete){ 
                // Delete images data  
                $condition = array('gallery_id' => $id);  
                $deleteImg = $this->gallery->deleteImage($condition);  
                  
                // Remove files from the server  
                if(!empty($galleryData['images'])){  
                    foreach($galleryData['images'] as $img){  
                        @unlink('uploads/images/'.$img['file_name']);  
                    }  
                }  
                 
                $this->session->set_userdata('success_msg', 'Gallery has been removed successfully.'); 
            }else{ 
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.'); 
            } 
        } 
 
        redirect($this->controller); 
    } 
     
    public function deleteImage(){ 
        $status  = 'err';  
        // If post request is submitted via ajax 
        if($this->input->post('id')){ 
            $id = $this->input->post('id'); 
            $imgData = $this->gallery->getImgRow($id); 
             
            // Delete image data 
            $con = array('id' => $id); 
            $delete = $this->gallery->deleteImage($con); 
             
            if($delete){ 
                // Remove files from the server  
                @unlink('uploads/images/'.$imgData['file_name']);  
                $status = 'ok';  
            } 
        } 
        echo $status;die;  
    } 
}