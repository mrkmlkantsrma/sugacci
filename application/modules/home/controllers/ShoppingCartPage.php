<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ShoppingCartPage extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->library('cart');
        $this->load->Model('Home_Model');
    }

    public function index()
    {
        $data = array();
        $data['cartItems'] = $this->cart->contents();
        $this->load->template('cart', $data);
    }
	
	function updateItemQty(){
        $update = 0;
        
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        
        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }
        
        // Return response
        echo $update?'ok':'err';
    }
	
	function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        
        // Redirect to the cart page
       redirect('cart');
    }

}