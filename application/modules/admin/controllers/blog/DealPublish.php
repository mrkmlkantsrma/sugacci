<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class DealPublish extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
			'Deal_model',
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

 
            $this->Deal_model->setdeals($_POST, $id);
            $this->session->set_flashdata('result_publish', 'Deal is published!');
            if ($id == 0) {
                $this->saveHistory('Success published Deal');
            } else {
                $this->saveHistory('Success updated Deal');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/deals?' . $get));
            } else {
                redirect('admin/deals');
            }
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Deals';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['trans_load'] = $trans_load;
        $data['languages'] = $this->Languages_model->getLanguages();
        $data['shop_categories'] = $this->Categories_model->getShopCategories();
        $data['mtc'] = $this->Deal_model->getDeals();
       
        $this->load->view('_parts/header', $head);
        $this->load->view('blog/dealpublish', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish Deals');
    }
	
	public function edit($id)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Deals';
        $head['description'] = '!';
        $head['keywords'] = ''; 

        if (isset($_POST['submit'])) {
            if(!empty($_FILES['userfile']['name'])){
                $_POST['image'] = $this->uploadImage();
            }
            $this->Deal_model->updateDeal($_POST, $id);
            redirect('admin/deals');
        }

        
		$data['id']=$id;
        $data['deal'] = $this->Deal_model->getOneDeal($id);

        $this->load->view('_parts/header', $head);
        $this->load->view('blog/edit_deal', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to Deals page');
    }

    private function uploadImage()
    {
        $config['upload_path'] = './attachments/deal_images/';
        $config['allowed_types'] = 'gif|jpg|png|webp|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userfile')) {
            log_message('error', 'Image Upload Error: ' . $this->upload->display_errors());
        }
        $img = $this->upload->data();
        return $img['file_name'];
    }

}
