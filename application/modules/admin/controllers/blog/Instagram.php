<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Instagram extends ADMIN_Controller
{

    private $num_rows = 10;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Instagram_model');
    }

    public function index($page = 0)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - View Instagram';
        $head['description'] = '!';
        $head['keywords'] = '';
		
		 unset($_SESSION['filter']);
        $search_title = null;
        if ($this->input->get('search_title') !== NULL) {
            $search_title = $this->input->get('search_title');
            $_SESSION['filter']['search_title'] = $search_title;
            $this->saveHistory('Search for product title - ' . $search_title);
        }
        
        $category = null;
        if ($this->input->get('category') !== NULL) {
            $category = $this->input->get('category');
            $_SESSION['filter']['category '] = $category;
            $this->saveHistory('Search for product code - ' . $category);
        }
        if (isset($_GET['delete'])) {
            $this->Instagram_model->deleteInstagram($_GET['delete']);
            $this->session->set_flashdata('result_delete', 'Instagram is deleted!');
            $this->saveHistory('Delete Instagram id - ' . $_GET['delete']);
            redirect('admin/instagram');
        }

       
        
        
       // $rowscount = $this->Products_model->productsCount($search_title, $category);
        //$data['materials'] = $this->Material_model->getMaterial();
       // $data['links_pagination'] = pagination('admin/materials', $rowscount, $this->num_rows, 3);

        $data['Instagrams'] = $this->Instagram_model->getInstagram();
        $data['mtc'] = $this->Instagram_model->getInsta();
        $this->saveHistory('Go to instagram');
        $this->load->view('_parts/header', $head);
        $this->load->view('blog/instagram', $data);
        $this->load->view('_parts/footer');
    }

    public function getProductInfo($id, $noLoginCheck = false)
    {
        /* 
         * if method is called from public(template) page
         */
        if ($noLoginCheck == false) {
            $this->login_check();
        }
        return $this->Products_model->getOneProduct($id);
    }

    /*
     * called from ajax
     */

    public function productStatusChange()
    {
        $this->login_check();
        $result = $this->Products_model->productStatusChange($_POST['id'], $_POST['to_status']);
        if ($result == true) {
            echo 1;
        } else {
            echo 0;
        }
        $this->saveHistory('Change product id ' . $_POST['id'] . ' to status ' . $_POST['to_status']);
    }
	
	

}
