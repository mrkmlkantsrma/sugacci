<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class BlogPublish extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
			'Blog_model',
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
          
            // $_POST['image'] = $this->uploadImage();
            $_POST['image'] = 'abc.jpg';

 
            $this->Blog_model->setblogs($_POST, $id);
            $this->session->set_flashdata('result_publish', 'Blog is published!');
            if ($id == 0) {
                $this->saveHistory('Success published Blog');
            } else {
                $this->saveHistory('Success updated Blog');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/blogs?' . $get));
            } else {
                redirect('admin/blogs');
            }
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Blogs';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['trans_load'] = $trans_load;
        $data['languages'] = $this->Languages_model->getLanguages();
        $data['shop_categories'] = $this->Categories_model->getShopCategories();
        $data['mtc'] = $this->Blog_model->getTest();
       
        $this->load->view('_parts/header', $head);
        $this->load->view('blog/blogpublish', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish Blogs');
    }
	
	public function edit($id)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Blogs';
        $head['description'] = '!';
        $head['keywords'] = ''; 

        if (isset($_POST['submit'])) {
			$_POST['image'] = $this->uploadImage();
            $this->Blog_model->updateTestimonial($_POST, $id);
            redirect('admin/blogs');
        }

        
		$data['id']=$id;
        $data['blog'] = $this->Blog_model->getOneTestimonial($id);

        $this->load->view('_parts/header', $head);
        $this->load->view('blog/edit_blog', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to Blogs page');
    }

    private function uploadImage()
    {
        $config['upload_path'] = './attachments/blog_images/';
        $config['allowed_types'] = $this->allowed_img_types;
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
            $img = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'blog_images' . DIRECTORY_SEPARATOR . '' . $_POST['folder'] . DIRECTORY_SEPARATOR . $_POST['image'];
            unlink($img);
        }
    }

}
