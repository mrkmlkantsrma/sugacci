<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class InstaPublish extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
			'Instagram_model',
            // 'Products_model',
            'Languages_model',
            'Brands_model',
            'Categories_model'
        ));
    }

    public function index($id = 0)
    {
        $this->login_check();
        $is_update = false;
        $trans_load = null;
        if ($id > 0 && $_POST == null) {
            //$_POST = $this->Products_model->getOneProduct($id);
            //$trans_load = $this->Products_model->getTranslations($id);
        }
        if (isset($_POST['submit'])) {

            $id = 0;

            if(!empty($_FILES['userfile']['name'])){
                $_POST['image'] = $this->uploadImage();
            }
          
            $this->Instagram_model->setInstagram($_POST, $id);
            $this->session->set_flashdata('result_publish', 'Instagram is published!');
            if ($id == 0) {
                $this->saveHistory('Success published Instagram');
            } else {
                $this->saveHistory('Success updated Instagram');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/instagram?' . $get));
            } else {
                redirect('admin/instagram');
            }
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish instagram Post';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['trans_load'] = $trans_load;
        $data['languages'] = $this->Languages_model->getLanguages();
        $data['shop_categories'] = $this->Categories_model->getShopCategories();
        $data['mtc'] = $this->Instagram_model->getInsta();
       
        $this->load->view('_parts/header', $head);
        $this->load->view('blog/instapublish', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish instagram');
    }
	
	public function edit($id)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Instagram';
        $head['description'] = '!';
        $head['keywords'] = ''; 

        if (isset($_POST['submit'])) {
            if(!empty($_FILES['userfile']['name'])){
                $_POST['image'] = $this->uploadImage();
            }
            $this->Instagram_model->updateInstagram($_POST, $id);
            redirect('admin/instagram');
        }

        
		$data['id']=$id;
        $data['insta'] = $this->Instagram_model->getOneInstagram($id);

        $this->load->view('_parts/header', $head);
        $this->load->view('blog/edit_insta', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to instagram page');
    }

    private function uploadImage()
    {

        $config['upload_path'] = './attachments/instagram_images/';
        $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {
            log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
        }
        $img = $this->upload->data();
        return $img['file_name'];
    }

    
   
    /*
     * called from ajax
     */

    public function removeSecondaryImage()
    {
        if ($this->input->is_ajax_request()) {
            $img = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'instagram_images' . DIRECTORY_SEPARATOR . '' . $_POST['folder'] . DIRECTORY_SEPARATOR . $_POST['image'];
            unlink($img);
        }
    }

}
