<?php

/*
 * @Author:    Kiril Kirkov
 *  Gitgub:    https://github.com/kirilkirkov
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product extends ADMIN_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
			'Product_model',
            'Languages_model',
            'Brands_model',
            'Categories_model'
        ));
    }

    public function index($id = 0)
    {
      
        if (isset($_POST['submit'])) {

            $id = 0;

            $url = str_replace(" ","_",$_POST['title']);
            if(!empty($_FILES['userfile']['name'])){
			    $_POST['image'] = $this->uploadImage($url); 
            }
            
            if(!empty($_FILES['gallery_image']['name'])){
                $upath = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images' . DIRECTORY_SEPARATOR;
                if (!file_exists($upath)) {
                    mkdir($upath, 0777);
                }

                $_POST['folder'] = $url;
                $cpt = count($_FILES['gallery_image']['name']);
                $imgNames = [];
                
                for($i=0; $i<$cpt; $i++)
                {  
    
                    if(empty( $_FILES['gallery_image']['name'][$i] )){
                        continue;
                    }         

                    $time = $i.time();
                    $ext = pathinfo($_FILES['gallery_image']['name'][$i], PATHINFO_EXTENSION);
                    
                    $_FILES['gallery']['name']       = $time.'_'.$url.'.'.$ext;
                    $_FILES['gallery']['type']       = $_FILES['gallery_image']['type'][$i];
                    $_FILES['gallery']['tmp_name']   = $_FILES['gallery_image']['tmp_name'][$i];
                    $_FILES['gallery']['error']      = $_FILES['gallery_image']['error'][$i];
                    $_FILES['gallery']['size']       = $_FILES['gallery_image']['size'][$i]; 
                    $config['encrypt_name'] = false;

                    $config['upload_path'] = $upath;
                    $config['allowed_types'] = 'gif|jpg|png|webp';
                    $config['max_size'] = 2000;
                    $config['max_width'] = 1500;
                    $config['max_height'] = 1500;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if( $img = $this->upload->do_upload('gallery') ){
                    
                        $imgNames[] =  $_FILES['gallery']['name'];                     
                    } 
                    else{
                        $error = array('error' => $this->upload->display_errors());
                    }
                }
                $_POST['gallery_images'] = json_encode($imgNames);
            }

            $this->Product_model->setProduct($_POST, $id);
            $this->session->set_flashdata('result_publish', 'product is published!');
            if ($id == 0) {
                $this->saveHistory('Success published product');
            } else {
                $this->saveHistory('Success updated product');
            }
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/products?' . $get));
            } else {
                redirect('admin/products');
            }
        }
       
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Publish Product';
        $head['description'] = '!';
        $head['keywords'] = '';
        $data['id'] = $id;			
        $data['shop_categories'] = $this->Categories_model->getShopCategories();	
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/product', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to publish product');
        
    }
	
	public function edit($id)
    {
        $this->login_check();
        $data = array();
        $head = array();
        $head['title'] = 'Administration - Product';
        $head['description'] = '!';
        $head['keywords'] = ''; 

        if (isset($_POST['submit'])) {
         
            $url = str_replace(" ","_",$_POST['title']);

            if(!empty($_FILES['userfile']['name'])){
			    $_POST['image'] = $this->uploadImage($url); 
            }

            if(!empty($_FILES['gallery_image']['name'])){
                $upath = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images' . DIRECTORY_SEPARATOR;
                if (!file_exists($upath)) {
                    mkdir($upath, 0777);
                    $_POST['folder'] = $url;
                }

                $cpt = count($_FILES['gallery_image']['name']);
                $imgNames = [];
                
                for($i=0; $i<$cpt; $i++)
                {  
                    if(empty( $_FILES['gallery_image']['name'][$i] )){
                        continue;
                    }         

                    $time = $i.time();
                    $url = str_replace(" ","_",$_POST['title']);
                    $ext = pathinfo($_FILES['gallery_image']['name'][$i], PATHINFO_EXTENSION);
                    
                    $_FILES['gallery']['name']       = $time.'_'.$url.'.'.$ext;
                    $_FILES['gallery']['type']       = $_FILES['gallery_image']['type'][$i];
                    $_FILES['gallery']['tmp_name']   = $_FILES['gallery_image']['tmp_name'][$i];
                    $_FILES['gallery']['error']      = $_FILES['gallery_image']['error'][$i];
                    $_FILES['gallery']['size']       = $_FILES['gallery_image']['size'][$i]; 
                    $config['encrypt_name'] = false;

                    $config['upload_path'] = $upath;
                    $config['allowed_types'] = 'gif|jpg|png|webp';
                    $config['max_size'] = 2000;
                    $config['max_width'] = 1500;
                    $config['max_height'] = 1500;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if( $img = $this->upload->do_upload('gallery') ){
                    
                        $imgNames[] =  $_FILES['gallery']['name'];                     
                    } 
                    else{
                        $error = array('error' => $this->upload->display_errors());
                        // print_r($error);
                    }
                }
                
                $_POST['gallery_images'] = json_encode($imgNames);
            }

            $this->Product_model->updateProduct($_POST, $id);
            $this->session->set_flashdata('result_publish', 'product is published!');
            
            $this->saveHistory('Success updated product');
            
            if (isset($_SESSION['filter']) && $id > 0) {
                $get = '';
                foreach ($_SESSION['filter'] as $key => $value) {
                    $get .= trim($key) . '=' . trim($value) . '&';
                }
                redirect(base_url('admin/products?' . $get));
            } else {
                redirect('admin/products');
            }
        }
        $data['id'] = $id;
        $data['otherImgs'] = $this->loadOthersImages();
        $data['productImages'] = $this->Product_model->getProductImgs($id);
        $data['shop_categories'] = $this->Categories_model->getShopCategories();
        $data['product'] = $this->Product_model->getOneProduct($id);
        
        $this->load->view('_parts/header', $head);
        $this->load->view('ecommerce/edit_product', $data);
        $this->load->view('_parts/footer');
        $this->saveHistory('Go to Product page');
    }

    private function uploadImage($url)
    {
        $upath = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images' . DIRECTORY_SEPARATOR;
            if (!file_exists($upath)) {
                mkdir($upath, 0777);
            }
        $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);      
        $_FILES['userfile']['name'] = $url.'.'.$ext;
        $config['upload_path'] = $upath;
        $config['allowed_types'] = 'gif|jpg|png|webp';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
        } 
        $img = $this->upload->data();
        return $img['file_name'];
    }
    /*
     * called from ajax
     */

    public function do_upload_others_images()
    {
        if ($this->input->is_ajax_request()) {
            $upath = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images' . DIRECTORY_SEPARATOR;
            if (!file_exists($upath)) {
                mkdir($upath, 0777);
            }

            $this->load->library('upload');

            $files = $_FILES;
            $cpt = count($_FILES['others']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                unset($_FILES);
                $_FILES['others']['name'] = $files['others']['name'][$i];
                $_FILES['others']['type'] = $files['others']['type'][$i];
                $_FILES['others']['tmp_name'] = $files['others']['tmp_name'][$i];
                $_FILES['others']['error'] = $files['others']['error'][$i];
                $_FILES['others']['size'] = $files['others']['size'][$i];

                $this->upload->initialize(array(
                    'upload_path' => $upath,
                    'allowed_types' => $this->allowed_img_types
                ));
                $this->upload->do_upload('others');
            }
        }
    }

    public function loadOthersImages()
    {
        $output = '';
        if (isset($_POST['folder']) && $_POST['folder'] != null) {
            $dir = 'attachments' . DIRECTORY_SEPARATOR . 'shop_images' . DIRECTORY_SEPARATOR;
            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    $i = 0;
                    while (($file = readdir($dh)) !== false) {
                        if (is_file($dir . $file)) {
                            $output .= '
                                <div class="other-img" id="image-container-' . $i . '">
                                    <img src="' . base_url('attachments/shop_images/' . $_POST['folder'] . '/' . $file) . '" style="width:100px; height: 100px;">
                                    <a href="javascript:void(0);" onclick="removeSecondaryProductImage(\'' . $file . '\', \'' . $_POST['folder'] . '\', ' . $i . ')">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </div>
                               ';
                        }
                        $i++;
                    }
                    closedir($dh);
                }
            }
        }
        if ($this->input->is_ajax_request()) {
            echo $output;
        } else {
            return $output;
        }
    }

    /*
     * called from ajax
     */

    public function removeSecondaryImage()
    {
        if ($this->input->is_ajax_request()) {
            $img = '.' . DIRECTORY_SEPARATOR . 'attachments' . DIRECTORY_SEPARATOR . 'shop_images' . DIRECTORY_SEPARATOR;
            unlink($img);
        }
    }

    function deleteProductGalleryImage(){
    	$imageId 			= $this->input->post('imageId');
        $galleryType 			= $this->input->post('galleryType');
        $returnData = [
            'status' => true
        ];   
        
        if( empty( $imageId ) )
        {
            $returnData['status'] = false;
            $returnData['mssage'] = 'Input data not found';
        }
        else
        {
            $whereData = [
                'id' => $imageId,    
            ];

            $this->Product_model->deleteWhere('product_gallery',$whereData );
            $returnData['status'] = true;
            $returnData['mssage'] = 'Data deleted successfully';
        }    
        echo json_encode($returnData);
        die;        
    }

}
