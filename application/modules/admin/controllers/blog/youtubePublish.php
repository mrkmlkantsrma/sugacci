<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class YoutubePublish extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
			'Youtube_model',
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

            $this->Youtube_model->setYoutube($_POST, $id);
            $this->session->set_flashdata('result_publish', 'Youtube is published!');
            if ($id == 0) {
                $this->saveHistory('Success published Youtube');
            } else {
                $this->saveHistory('Success updated Youtube');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/youtube?' . $get));
            } else {
                redirect('admin/youtube');
            }
        }
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Youtube Post';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;
        $data['trans_load'] = $trans_load;
        $data['languages'] = $this->Languages_model->getLanguages();
        $data['shop_categories'] = $this->Categories_model->getShopCategories();
        $data['mtc'] = $this->Youtube_model->getYoutube();
       
        $this->load->view('_parts/header', $head);
        $this->load->view('blog/youtubepublish', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish Youtube');
    }
	
	public function edit($id)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Youtube';
        $head['description'] = '!';
        $head['keywords'] = ''; 

        if (isset($_POST['submit'])) {
            $this->Youtube_model->updateYoutube($_POST, $id);
            redirect('admin/youtube');
        }
        
		$data['id']=$id;
        $data['youtube'] = $this->Youtube_model->getOneYoutube($id);

        $this->load->view('_parts/header', $head);
        $this->load->view('blog/edit_youtube', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to Youtube page');
    }

}
