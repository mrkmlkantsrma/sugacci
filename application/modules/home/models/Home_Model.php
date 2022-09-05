<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_Model extends CI_Model{
    
    public function __construct()
    {
		parent::__construct();
		$this->load->database();
	}
    public function getPopularProducts()
    {
        $this->db->select('*');
        $this->db->where('shop_categorie', '1');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getNewProducts()
    {
        $this->db->select('*');
        $this->db->where('shop_categorie', '2');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getSingleProduct($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        return $query->row_array();
    }
    public function getSingleProductGallary($id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $id);
        $query = $this->db->get('product_gallery');
        return $query->result_array();
    }
    public function getAllProducts()
    {
        $this->db->select('*');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getShopPopularProducts()
    {
        $this->db->select('*');
        $this->db->limit('4');
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getRelatedProducts($Category)
    {
        $this->db->select('*');
        $this->db->where('shop_categorie', $Category);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    public function getTestimonials()
    {
        $this->db->select('*');
        $query = $this->db->get('testimonials');
        return $query->result_array();
    }
    public function getInstagrams()
    {
        $this->db->select('*');
        $query = $this->db->get('instagram');
        return $query->result_array();
    }
    public function getYoutubes()
    {
        $this->db->select('*');
        $query = $this->db->get('youtube');
        return $query->row_array();
    }
    public function getDeals()
    {
        $this->db->select('*');
        $query = $this->db->get('deals');
        return $query->result_array();
    }
    public function getBlogs()
    {
        $this->db->select('*');
        $query = $this->db->get('blogs');
        return $query->result_array();
    }
    public function GetUserDetails($email)
    {
        $this->db->select('*');
        $this->db->where('email', $email);
        $query = $this->db->get('customers');
        return $query->row_array();
    }
    public function GetUserDetailsByemailorUsername($data)
    {
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->group_start();
        $this->db->where('username', $data['username'])->or_where('email', $data['email']);
        $this->db->group_end();
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getSingleCustomerDetails($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->limit(1);
        $this->db->order_by('id','desc');
        $query = $this->db->get('orders');
        return $query->row_array();
    }
    public function getCustomerOrderDetails($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id','asc');
        $query = $this->db->get('orders');
        return $query->result_array();
    }

    public function FillDetailUser($data)
    {   
        $this->db->where('email', $data['email']);
        $this->db->update('customers', $data);
    }

    public function ResetPassword($data)
    {   
        $this->db->where('email', $data['email']);
        $this->db->update('customers', $data);
    }

    public function RegisterUsers($data)
    {   
         $this->db->insert('customers', $data);
    }
     public function get_tbl()
    {   
         $this->db->select('*');
        $this->db->from('users');
        return $this->db->get()->result_array();
    }
    public function googleLogin($data, $tbl_data)
    
    {   
         $mydata = $tbl_data['id'];
         $id = $mydata[0]['id'];
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
         
         $this->db->where('id', $id);
         $this->db->update('users', $data);
        }
        else{
             $this->db->insert(' users', $data);
        }
    }
    public function mail_exists($data)
    {
        $this->db->where('email',$data);
        $query = $this->db->get('customers');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
     public function username_exists($data)
    {
        $this->db->where('username',$data);
        $query = $this->db->get('customers');
        if ($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function forgetEmail($data) {  
             
        $this->db->select('*');
        $this->db->from('customers');
        //$this->db->where($condition);
        $this->db->group_start();
        $this->db->where('username', $data['email'])->or_where('email', $data['email']);
        $this->db->group_end();
        $this->db->limit(1);
        $query = $this->db->get();
        $this->db->last_query();
         
        //
        if ($query->num_rows() > 0) {
            
            return $query->row_array();
            // print_r($query);
            return true;
        } else {
            
            return false;
        }
    }
    
     public function loginUsers($data) {  
             
        $this->db->select('*');
        $this->db->from('customers');
        //$this->db->where($condition);
        $this->db->group_start();
        $this->db->where('username', $data['email'])->or_where('email', $data['email']);
        $this->db->group_end();
        $this->db->where('password', $data['password']);
        $this->db->limit(1);
        $query = $this->db->get();
        $this->db->last_query();
         
        //
        if ($query->num_rows() > 0) {
            
            return $query->result();
            // print_r($query);
            return true;
        } else {
            
            return false;
        }
    }
    
    // Read data from database to show data in admin page
    public function read_user_information($username) {
    
        $condition = "email =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('customers');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }

    public function insertEntry($post)
    {   
        $this->db->insert('contacts', array(
            'first_name'    => $post['fname'],
            'last_name'     => $post['lname'],
            'email'         => $post['email'],
            'phone'         => $post['phone'],
            'message'       => $post['message'],
            'request_date'  => date('Y-m-d h:i'),
        ));
        return $this->db->insert_id();
    }

    
    public function setOrder($post)
    { 
    $q = $this->db->query('SELECT MAX(order_id) as order_id FROM orders');
    $rr = $q->row_array();
    
    if ($rr['order_id'] == 0) {
        $rr['order_id'] = 1;
    }
    $post['order_id'] = $rr['order_id'] + 1;
    $i = 0;
    
    $post['products'] = array();
    foreach ($post['id'] as $product) {
        $product_ID = $product['id'];
        $post['products'][$product_ID] = $product['qty'];
        $i++;
    }
    unset($post['id'], $product['qty']);
    $post['date'] = time();
    $products_to_order = [];
    
    if(!empty($post['products'])) 
    {
        // foreach($post['products'] as $pr_id => $pr_qua) {
        //     $products_to_order[] = [
        //         'product_info' => $this->getOneProductForSerialize($pr_id),
        //         'product_quantity' => $pr_qua
        //     ];
        // }
    }
    $post['products'] = serialize($post['products']);
    $this->db->trans_begin();
    // echo "reach <br>";
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";

        if (!$this->db->insert('orders', 
        array(
            'order_id'          => $post['order_id'],
            'first_name'        => $post['first_name'],
            'last_name'         => $post['last_name'],
            'email'             => $post['email'],
            'billing_phone'     => $post['billing_phone'],
            'billing_address'   => $post['billing_address'],
            'billing_city'      => $post['billing_city'],
            'billing_state'     => $post['billing_state'],
            'billing_post_code' => $post['billing_post_code'],
            'shipping_phone'    => $post['shipping_phone'],
            'shipping_address'  => $post['shipping_address'],
            'shipping_city'     => $post['shipping_city'],
            'shipping_state'    => $post['shipping_state'],
            'shipping_post_code'=> $post['shipping_post_code'],
            'products'          => $post['products'],
            'amount'            => $post['amount'],
            'date'              => $post['date'],
            'payment_type'      => $post['payment_type'],
            'payment_status'    => $post['payment_status'],
            'transaction_id'    => $post['payment_status'],
            'user_id'           => $post['user_id']
        )))
        { 
            log_message('error', print_r($this->db->error(), true));
        }
        
        if ($this->db->trans_status() === FALSE) 
        { 
            $this->db->trans_rollback();
            return false;
        } 
        else 
        { 
            $this->db->trans_commit();
            return $post['order_id'];
        }

    }
    public function orderItems($data)
    {
        $result = $this->db->insert('order_items', $data);
        return $result;
    }

    public function updateOrderStatus($order_id, $data)
    {   
        $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data);
    }
    
    public function getSingleOrder($orderid)
    {
        $this->db->select('*');
        $this->db->where('order_id', $orderid);
        $query = $this->db->get('orders');
        return $query->row_array();
    }
    public function getOrderItems($orderid)
    {
        $this->db->select('*');
        $this->db->where('order_id', $orderid);
        $query = $this->db->get('order_items');
        return $query->result_array();
    }

    /* Newsletter subscription */
    public function saveSubscription($data)
    {
        $count = $this->db->where('email', $data['email'])->count_all_results('subscribed');
        if ($count == 0) {
            $this->db->insert('subscribed', $data);
            return $this->db->insert_id();
        }
        return false;
    }
    
}
