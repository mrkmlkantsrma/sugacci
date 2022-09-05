<?php

class Product_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProducts()
    {
        $this->db->select('*');
        $this->db->order_by('position', 'asc');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getCategoryName($category_ID)
    {
        $this->db->select('name');
        $this->db->where('id', $category_ID);
        $query = $this->db->get('shop_categories');
        return $query->row_array();
    }
    

    public function setProduct($post, $id = 0)
    {
        if (!$this->db->insert('products', array(
                    'image' => $post['image'],
                    'shop_categorie' => $post['shop_categories'],
                    'gender' => $post['gender'],
                    'rating' => $post['rating'],
                    'quantity' => $post['quantity'],
                    'position' => $post['position'],
                    'time' => time(),
                    'title' => $post['title'],
                    'meta_title' => $post['meta_title'],
                    'meta_tags' => $post['meta_tags'],
                    'basic_description' => $post['basic_description'],
                    'description' => $post['description'],
                    'price' => $post['price'],
                    'discount_price' => $post['old_price'],
                    'abbr' => "en",
                ))) {
            log_message('error', print_r($this->db->error(), true));
        }
        $id = $this->db->insert_id();

        $this->db->where('id', $id);
        if (!$this->db->update('products', array(
                    'url' => str_replace(" ","_",$_POST['title'])
                ))) {
            log_message('error', print_r($this->db->error(), true));
        }

        // Gallery Images
        if( isset( $post['gallery_images'] ) ){      
            $galleryImg = json_decode($post['gallery_images'], true);

                foreach($galleryImg as  $img){              
                    if (!$this->db->insert('product_gallery', array(
                        'product_id' =>   $id,                
                        'image_name' => $img,
                        'time_update' => time()
                    ))) {
                        log_message('error', print_r($this->db->error(), true));
                    }
                }
            }
        return $id;
    }

    public function updateProduct($post, $id){


        if (!$this->db->where('id', $id)->update('products', array(
                'image' => $post['image'],
                'shop_categorie' => $post['shop_categories'],
                'gender' => $post['gender'],
                'rating' => $post['rating'],
                'quantity' => $post['quantity'],
                'position' => $post['position'],
                'time' => time(),
                'title' => $post['title'],
                'meta_title' => $post['meta_title'],
                'meta_tags' => $post['meta_tags'],
                'basic_description' => $post['basic_description'],
                'description' => $post['description'],
                'price' => $post['price'],
                'discount_price' => $post['old_price'],
                'abbr' => "en",
            ))) {
            log_message('error', print_r($this->db->error(), true));
        }
        $insertid = $this->db->insert_id();

        $this->db->where('id', $id);
        if (!$this->db->update('products', array(
                    'url' => str_replace(" ","_", $_POST['title'])
                ))) {
            log_message('error', print_r($this->db->error(), true));
        }
         // Gallery Images
        if( isset( $post['gallery_images'] ) ){      
            $galleryImg = json_decode($post['gallery_images'], true);


                foreach($galleryImg as  $img){              
                    if (!$this->db->insert('product_gallery', array(
                        'product_id' => $id,                
                        'image_name' => $img,
                        'time_update' => time()
                    ))) {
                        log_message('error', print_r($this->db->error(), true));
                    }
                }
            }
        return $id;
    
    }

    public function deleteProduct($id)
    {
        $this->db->where('id', $id);
        if (!$this->db->delete('products')) {
            log_message('error', print_r($this->db->error(), true));
        }
    }
   

    public function productsCount($search_title = null, $category = null)
    {
        if ($search_title != null) {
            $search_title = trim($this->db->escape_like_str($search_title));
            $this->db->where("(products_translations.title LIKE '%$search_title%')");
        }
        if ($category != null) {
            $this->db->where('shop_categorie', $category);
        }
        $this->db->join('products_translations', 'products_translations.for_id = products.id', 'left');
        $this->db->where('products_translations.abbr', MY_DEFAULT_LANGUAGE_ABBR);
        return $this->db->count_all_results('products');
    }



    public function numShopProducts()
    {
        return $this->db->count_all_results('products');
    }

    public function getOneProduct($id)
    {
        $this->db->select('*');
        $this->db->where('products.id', $id);
        $query = $this->db->get('products');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function productStatusChange($id, $to_status)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('products', array('visibility' => $to_status));
        return $result;
    }
    



    private function setProductTranslation($post, $id, $is_update)
    {
        $i = 0;
        $current_trans = $this->getTranslations($id);
        foreach ($post['translations'] as $abbr) {
            $arr = array();
            $emergency_insert = false;
            if (!isset($current_trans[$abbr])) {
                $emergency_insert = true;
            }
            $post['title'][$i] = str_replace('"', "'", $post['title'][$i]);
            $post['price'][$i] = str_replace(' ', '', $post['price'][$i]);
            $post['price'][$i] = str_replace(',', '.', $post['price'][$i]);
            $post['price'][$i] = preg_replace("/[^0-9,.]/", "", $post['price'][$i]);
            $post['old_price'][$i] = str_replace(' ', '', $post['old_price'][$i]);
            $post['old_price'][$i] = str_replace(',', '.', $post['old_price'][$i]);
            $post['old_price'][$i] = preg_replace("/[^0-9,.]/", "", $post['old_price'][$i]);
            $arr = array(
                'title' => $post['title'][$i],
                'basic_description' => 'basic_description',
                'description' => $post['description'][$i],
                'price' => $post['price'][$i],
                'old_price' => $post['old_price'][$i],
                'abbr' => $abbr,
                'for_id' => $id
            );
            if ($is_update === true && $emergency_insert === false) {
                $abbr = $arr['abbr'];
                unset($arr['for_id'], $arr['abbr'], $arr['url']);
                if (!$this->db->where('abbr', $abbr)->where('for_id', $id)->update('products_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            } else {
                if (!$this->db->insert('products_translations', $arr)) {
                    log_message('error', print_r($this->db->error(), true));
                }
            }
            $i++;
        }
    }

    public function getTranslations($id)
    {
        $this->db->where('for_id', $id);
        $query = $this->db->get('products_translations');
        $arr = array();
        foreach ($query->result() as $row) {
            $arr[$row->abbr]['title'] = $row->title;
            $arr[$row->abbr]['basic_description'] = $row->basic_description;
            $arr[$row->abbr]['description'] = $row->description;
            $arr[$row->abbr]['price'] = $row->price;
            $arr[$row->abbr]['old_price'] = $row->old_price;
        }
        return $arr;
    }
	
	public function getmatcat($id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $id);
        $result = $this->db->get('product_material_cat');
        return $result->result_array();
    }
    
    public function getllgridcat($mt_id12)	{
	    $this->db->select('*');
        $this->db->where('id!=', $mt_id12);
        $result = $this->db->get('material_design_category');
        return $result->result_array();
    }
	
	public function getgridcat($mt_id)
    {
        $this->db->select('*');
        $this->db->where('id', $mt_id);
        $result = $this->db->get('material_design_category');
        return $result->row_array();
    }
	function row_delete($product_id)
	{
	   $this->db->where('product_id', $product_id);
	   $this->db->delete('product_material_cat'); 
	}
	public function getDesigners()
    {
        $this->db->select('*');
		$this->db->order_by('position', 'asc');
        $result = $this->db->get('designers');
        return $result->result_array();
    }
    public function getProductImgs($productID)
    {
        $this->db->select('*');
        $this->db->where('product_id' ,$productID);
        $this->db->order_by("order_by asc");
        $result = $this->db->get('product_gallery');
        return $result->result();
    }

    function deleteWhere( $table, $whereData )
    {
        if( !empty( $table )  && is_array( $whereData ) && !empty( $whereData ) )    
            $result = $this->db->delete( $table, $whereData );
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
    
