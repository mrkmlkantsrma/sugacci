<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends MX_Controller {

	public function __construct()
   	{
       parent :: __construct();
        $this->load->helper(array('form', 'url'));
        // $this->load->library('form_validation');
        $this->load->model('Home_Model');
        $this->load->library('cart');
        

        // require_once APPPATH.'third_party/google-api/Google_Client.php';
		// require_once APPPATH.'third_party/google-api/contrib/Google_Oauth2Service.php';
   	}
	 
	public function index(){

	 	$this->load->template('homepage');
	}

	public function Aboutus(){

	 	$this->load->template('about-us');
	}
	public function View_product($id){

		$data['product_id'] = $id;

		$this->load->template('single-product',$data);
   }
    public function Shop(){

	 	$this->load->template('shop');
	}
	public function Whysugacci(){

		$this->load->template('why-sugacci');
   	}
	public function Blog(){

		$this->load->template('blog');
   	}
	public function Wishlist(){

		$this->load->template('wishlist');
   	}
	public function BlogDetail(){

		$this->load->template('blog-details');
   	}
	public function TermofUse(){

		$this->load->template('term-of-use');
   	}
	public function PrivacyPolicy(){

		$this->load->template('privacy-policy');
   	}
	public function Returns(){

		$this->load->template('returns');
   	}
	public function ShippingPolicy(){

		$this->load->template('shipping-policy');
   	}
	public function Account(){
		if($this->session->userdata('logged_in') && $this->session->userdata('logged_in_email')){
			$email = $this->session->userdata('logged_in_email');
			$result['userData'] = $this->Home_Model->GetUserDetails($email);
			$this->load->template('my-account' , $result);
		}else{
			$this->load->template('my-account');
		}
   	}
	public function Contact(){

	 	$this->load->template('contact-us');
	}
	public function Cart($product_Id){

		$this->load->library('cart');

		$result = $this->Home_Model->getSingleProduct($product_Id);

		if(!empty($result['discount_price']) || $result['discount_price'] !=''){
			$price = $result['discount_price'];
		}else{
			$price = $result['price'];
		}

        $data = array(
            'id'            => $product_Id,
            'qty'           => $this->input->post('qty'),
            'price'         => $price,
            'name'    	    => $this->input->post('prod_name'),
            'image'         => $this->input->post('prod_image'),
            'folder'        => $this->input->post('image_folder')
        );
	
        $this->cart->insert($data);
		redirect('cart');
  	}
   	public function Checkout(){
		$data = array();
		$data['cartItems'] = $this->cart->contents();

		$this->load->template('checkout', $data);
	}
	
   	public function NotFound(){

		$this->load->template('404');
	}

	public function Thankyou(){
		if ( $this->input->is_ajax_request())
        {
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (3 * 60) ;
			$order_id = $_POST['item_id'];
			$this->session->set_userdata('order', $order_id);
		}
		$this->load->template('Thankyou'); 
	}
	
	public function Login(){

	 	$this->load->template('login');
	}
	public function Register(){

	 	$this->load->template('register');
	}

	public function ResetPassword(){

		$data = array();
		$data['email'] = $this->session->userdata('forget_email');
		$data['auth'] = $this->session->userdata('forget_otp');

		$this->load->template('reset_password', $data);
   	}

	   

	public function CreateResetPassword()
    { 
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[10]');
        if($this->input->post())
    	{ 
            if($this->form_validation->run() == false)
            {
                $error = validation_errors();
				$response = array( 'success' => 'false','message' => $error );
				echo json_encode($response);
            }
            else{
				$email = $this->input->post('email');
                $data = array(
                    'email' => $email,
                    'password' => $this->input->post('password'),
                );
                $this->Home_Model->ResetPassword($data);
				$result = $this->Home_Model->read_user_information($email);
                if ($result != false) {
                    $session_data = array(
                    'username' => $result[0]->username,
                    'email' => $result[0]->email,
                    );
                    $this->session->set_userdata('logged_in', $session_data['username']);
					$this->session->set_userdata('logged_in_email', $session_data['email']);
                 $this->session->set_flashdata('success', ' '.$this->session->userdata('logged_in').' Your password Successfully changed');
                }
            $response = array( 'success' => 'true','message' => 'Password changed Successfully' , 'data' => $data);
			echo json_encode($response);
			die;
            }
        }
    }

	public function ForgetPassword()
    { 

		if (!$this->session->userdata('logged_in'))
		{ 
			$this->form_validation->set_rules('email', 'Email', 'required');
			if ($this->form_validation->run() == false) {
				$error = validation_errors();
				$response = array( 'success' => 'false','message' => $error );
				echo json_encode($response);
			} 
			else 
			{
					$data = array('email' => $this->input->post('email'));           
			
					$result = $this->Home_Model->forgetEmail($data);

					if ($result != false) {

						function random_str(
							int $length = 64,
							string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
						): string {
							if ($length < 1) {
								throw new \RangeException("Length must be a positive integer");
							}
							$pieces = [];
							$max = mb_strlen($keyspace, '8bit') - 1;
							for ($i = 0; $i < $length; ++$i) {
								$pieces []= $keyspace[random_int(0, $max)];
							}
							return implode('', $pieces);
						}
						
						$auth_Number = random_str(10);
		
						$detailsArr = array(
							'auth_Number' => $auth_Number,
						);
						
						$emailConfig = $this->config->item('smtp_sendinblue');
						$this->load->library('email', $emailConfig);
						
						$noreply_email = $emailConfig['noreply_email'];
						$admin_email = $emailConfig['admin_email'];
						$username = 'test';
						$user_email = $result['email'];
						$subject = 'Reset password OTP email';
								
						$this->email->from($noreply_email, $username);
		
						$this->email->to($user_email);
						
						$this->email->subject($subject);
					
						$data = array( 'auth_Number'=>  $auth_Number);
						$body = $this->load->view('templates/email-template',$data,TRUE);  
					
						$this->email->message($body);
					
						if($this->email->send()) return true;

						$this->session->set_userdata('forget_otp', $auth_Number);
						$this->session->set_userdata('forget_email', $result['email']);
		
						$response = array( 'success' => 'true','message' => 'Successfully Sent email to reset password' , 'data' => $data);
						echo json_encode($response);
						die;
					}else{
						$response = array( 'success' => 'false','message' => 'error found please check again' , 'data' => $data);
						echo json_encode($response);
						die;
					}
			}
		}
	}

	public function RegisterUser()
    { 

      if (!$this->session->userdata('logged_in'))
      { 
        $this->form_validation->set_rules('email','Email','trim|required|is_unique[customers.email]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[5]|max_length[10]');
        if($this->input->post())
    	{ 
            if($this->form_validation->run() == false)
            {
                $error = validation_errors();
				$response = array( 'success' => 'false','message' => $error );
				echo json_encode($response);
            }
            else{
				$email = $this->input->post('email');
				$parts = explode("@",$email);
				$username = $parts[0];
                $data = array(
                    'email' => $email,
                    'password' => $this->input->post('password'),
					'username' => $username,
					'registration_date' => date("jS F Y h:i:s"),
					'user_type' => 'customer',
                );
                $this->Home_Model->RegisterUsers($data);
                   $session_data = array(
                    'username' => $username,
                    'email' => $email,
                    );
                 $this->session->set_userdata('logged_in', $session_data['username']);
                 $this->session->set_userdata('logged_in_email', $session_data['email']);
            $this->session->set_flashdata('success', ' '.$this->session->userdata('logged_in').' You Are successfully registered');
			$response = array( 'success' => 'true','message' => 'Successfully Register', 'data' => $data);
			echo json_encode($response);
			die;
            }
        }
      }
    }
	public function FillUserDetails()
    { 

      if ($this->session->userdata('logged_in'))
      {
        $this->form_validation->set_rules('firstname','First Name','trim|required');
        $this->form_validation->set_rules('lastname','Last Name','trim|required');
        $this->form_validation->set_rules('username','User Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('number','number','trim|required|numeric');
        if($this->input->post())
    	{ 
            if($this->form_validation->run() == false)
            {
				$error = validation_errors();
				$response = array( 'success' => 'false','message' => $error );
				echo json_encode($response);
            }
            else{
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'number' => $this->input->post('number'),
                );
                $this->Home_Model->FillDetailUser($data);
                   $session_data = array(
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'name' => $data['firstname'],
                    );
                 $this->session->set_userdata('logged_in', $session_data['name']);
            $this->session->set_flashdata('success', ' '.$this->session->userdata('logged_in').' Your details successfully submitted');
			$response = array( 'success' => 'true','message' => 'Deatils submitted' , 'data' => $data);
			echo json_encode($response);
			die;	
		}
        }else{
			$this->session->set_flashdata('error', ' '.$this->session->userdata('logged_in').' Your details not submitted');
			$response = array( 'success' => 'false','message' => 'Deatils not filled!');
			echo json_encode($response);
			die;
		}
      }
    }
    public function email_check() {
        if (array_key_exists('email',$_POST))
        {
         if ( $this->Home_Model->mail_exists($this->input->post('email')) == TRUE )
          {
            echo 'false';
            }
           else
            {
               echo 'true';
            }
        }
    }
    public function username_check() {
        if (array_key_exists('username',$_POST))
        {
         if ( $this->Home_Model->username_exists($this->input->post('username')) == TRUE )
          {
            echo 'false';
            }
           else
            {
               echo 'true';
            }
        }
    }
    public function login_Email_check() {
        if (array_key_exists('email',$_POST))
        {
         if ( $this->Home_Model->mail_exists($this->input->post('email')) == TRUE )
          {
            echo 'true';
            }
           else
            {
               echo 'false';
            }
        }
    }

	public function forget_Email_check() {
        if (array_key_exists('email',$_POST))
        {
         if ( $this->Home_Model->mail_exists($this->input->post('email')) == TRUE )
          {
            echo 'true';
            }
           else
            {
               echo 'false';
            }
        }
    }
    
    public function LoginUser() {

        $this->form_validation->set_rules('email', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
			$error = validation_errors();
			$response = array( 'success' => 'false','message' => $error );
			echo json_encode($response);
        } 
        else 
        {
            $data = array('email' => $this->input->post('username'), 'email' => $this->input->post('email'), 'password' => $this->input->post('password'));           
           
			
			$result = $this->Home_Model->loginUsers($data);

            if ($result != false) {
            
                $username = $this->input->post('email');
                $result = $this->Home_Model->read_user_information($username);
                if ($result != false) {
                    $session_data = array(
                    'username' => $result[0]->username,
                    'email' => $result[0]->email,
                    );
                    $this->session->set_userdata('logged_in', $session_data['username']);
					$this->session->set_userdata('logged_in_email', $session_data['email']);
                 $this->session->set_flashdata('success', ' '.$this->session->userdata('logged_in').' You Are successfully Login');
                }
            $response = array( 'success' => 'true','message' => 'Successfully Login' , 'data' => $data);
			echo json_encode($response);
			die;
            } 
            else
            {
                // $this->session->set_flashdata('error_Login', 'Invalid Credantials');
                $response = array( 'success' => 'false','message' => 'Invalid Password');
				echo json_encode($response);
            }
        }
    }
//      public function google_Login(){
        
// // 		$clientId = '568121562085-gjqphhua0eg4topbm7guoop6ahm8klao.apps.googleusercontent.com'; //Google client ID
// // 		$clientSecret = 'y_15xuQJoitEC-w4dMS0sp5N'; //Google client secret

  
// 		$clientId = '796271523450-sn5d2c3o4ko4rrbe0clhp2cj06nds6ct.apps.googleusercontent.com'; //Google client ID
// 		$clientSecret = 'BQS1NODphx3XHv04gq7nRI9w'; //Google client secret
		
// 		$redirectURL = 'https://www.web-xperts.xyz/team/kamal/braincrester/home/HomeController/google_Login';
	
// 		$google_Client = new Google_Client();
// 		$google_Client->setApplicationName('Braincrester');
// 		$google_Client->setClientId($clientId);
// 		$google_Client->setClientSecret($clientSecret);
// 		$google_Client->setRedirectUri($redirectURL);
// 		$google_OauthV2 = new Google_Oauth2Service($google_Client);
		
// 		if(isset($_GET['code']))
// 		{ 
// 			$google_Client->authenticate($_GET['code']);
// 			$_SESSION['token'] = $google_Client->getAccessToken();
// 		}
// 		if (isset($_SESSION['token'])) 
// 		{
// 			$google_Client->setAccessToken($_SESSION['token']);
// 		}
// 		if ($google_Client->getAccessToken()) {
// 		    $data =[];
//             $data = $google_OauthV2->userinfo->get(); 
            
//             $tbl_data['id'] = $this->Home_Model->get_tbl();
            
//             $this->Home_Model->googleLogin($data, $tbl_data);
            
//             $session_data = array(
//                     'username' => $data['name'],
//                     'email' => $data['email'],
//                     'name' => $data['name'],
//                     'usertype'=> 'Customer',

//                     );
//                     $this->session->set_userdata('logged_in', $session_data['name']);
//                     $this->session->set_userdata('usertype', $session_data['usertype']);
//             $this->session->set_flashdata('success', ' '.$this->session->userdata('logged_in').' You Are successfully Login');
//         } 
// 		else 
// 		{
//             $googleURL = $google_Client->createAuthUrl();
// 		    header("Location: $googleURL");
//             exit;
//         }
//         redirect(base_url());
// 	}
    
	public function logout() {
        $sess_array = array('username' => '');
        $sess_email_array = array('email' => '');
		$this->session->set_flashdata('logged_out', ' '.$this->session->userdata('logged_in').' You Are successfully Logout');
        $this->session->unset_userdata('logged_in', $sess_array);
		$this->session->unset_userdata('logged_in_email', $sess_email_array);
        redirect(base_url());
    }
    public function load_style(){
        
        $this->load->view('load_style');
    }
    public function load_script(){
        $data['js'] =  [
                'validate'   =>'https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js',
                'sweetjslink'   =>'https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js',
                'validation'  =>'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js',
                'myvalidate' => 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js'
                
            ];
        $this->load->view('load_script',$data);
    }

	public function contactSubmit()
	{	
		$fname          = $this->input->post('fname');
		$lname          = $this->input->post('lname');
		$phone          = $this->input->post('phone');
		$email          = $this->input->post('email');
		$message        = $this->input->post('message');

		$postData = [
			'fname'                => $fname, 
			'lname'                => $lname, 
			'phone'                => $phone, 
			'email'                => $email, 
			'message'              => $message
		];

		$id = $this->Home_Model->insertEntry($postData);
		if($id){
			$response = array( 'success' => 'true','message' => 'We have received your inquiry and will follow up soon!');
			echo json_encode($response);
		}else{
			$response = array( 'success' => 'false','message' => 'Sorry message not deliver successfully, Please try again');
			echo json_encode($response);
		}
		die();
    }

	public function PlaceOrder()
	{		
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('billing_phone','Phone','trim|required|numeric');
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('billing_address','Address','trim|required');
        $this->form_validation->set_rules('billing_city','City','trim|required');
        $this->form_validation->set_rules('billing_state','State','trim|required');
        $this->form_validation->set_rules('billing_post_code','Postcode','trim|required');
        $this->form_validation->set_rules('payment_type','Payment Type','trim|required');
        if($this->input->post())
    	{ 
            if($this->form_validation->run() == false)
            {
				$error = validation_errors();
				$response = array( 'success' => 'false','message' => $error );
				echo json_encode($response);
            }
            else
			{
				if (isset($_POST['payment_type'])) {
					
					$_SESSION['payment_method'] = $_POST['payment_type'];

					if ($_POST['payment_type'] == 'cashOnDelivery') {
						$_POST['payment_status'] = 'cashOnDelivery';
					}
					if ($_POST['payment_type'] == 'razorpay') {
						$_POST['payment_status'] = 'pending';
					}
				
					$_POST['order_id'] = 0;
					$cartData = $this->cart->contents();
					$cartValues = array_values($cartData); 
					$_POST['amount'] = $this->cart->total();
					$_POST['id'] = $cartValues;
					
					$_SESSION['checkoutForm_Data'] = $_POST; 

					$_POST['user_id'] = isset($_SESSION['logged_user']) ? $_SESSION['logged_user'] : 0;
					$_POST['user_id'] = 0;

					$orderId = $this->Home_Model->setOrder($_POST);
					
					$products = $this->cart->contents();
					$productsV = array_values($products);  

					foreach($productsV as $value){

						$data = array(
							'order_id' => $orderId,
							'product_id' => $value['id'],
							'product_name' => $value['name'],
							'qty' => $value['qty'],
							'regular_price' => $value['price'],
							'total_price' => $value['subtotal']
						);
						$orderItems = $this->Home_Model->orderItems($data);
					}

					if ($orderId != false) 
					{                
						
						$this->orderId = $orderId;
						$this->goToDestination($orderId);
					} 
					else
					{
						$response = array( 'success' => 'false','message' => 'Order Not confirm' , 'data' => $data);
						echo json_encode($response);
						die;
					}
				}
				else
				{

				}
			}
		}
		else
		{
			$response = array( 'success' => 'false','message' => 'Details not submitted' , 'data' => $data);
			echo json_encode($response);
			die;	
		}
	}

	private function goToDestination($order_id)
	{
		if ($_POST['payment_type'] == 'cashOnDelivery') {
			$data = array();
			$data['orderId'] = $order_id;
			$data['orderItems'] = $this->Home_Model->getOrderItems($order_id);
			$data['payment_type'] = 'cashOnDelivery';
			$response = array( 'success' => 'true','message' => 'Thank you , Order Confirmed' , 'data' => $data);
			echo json_encode($response);
			die;
		}
		if ($_POST['payment_type'] == 'razorpay') {
			$data = array();
			$data['orderId'] = $order_id;
			$data['orderItems'] = $this->Home_Model->getOrderItems($order_id);
			$data['amount'] = $this->cart->total();
			$data['payment_type'] = 'razorpay';
			$response = array( 'success' => 'true','message' => 'Order Added Please Pay with Razer Pay to Confirm Order' , 'data' => $data);
			echo json_encode($response);
			die;
		}
	}  

	public function razerpayConfirm(){

		if($_POST['trans_id'] && $_POST['item_id']){
			$TransID = $_POST['trans_id'];
			$order_id = $_POST['item_id'];
			$data = array();
			$data['transaction_id'] = $_POST['trans_id'];
			$data['payment_status'] = 'success';
			$this->Home_Model->updateOrderStatus($order_id, $data);
			// $this->sendEmail($TransID);
		}else{
			$order_id = $_POST['item_id'];
			$data = array();
			$data['transaction_id'] = 'failed';
			$data['payment_status'] = 'failed';
			$this->Home_Model->updateOrderStatus($order_id, $data);
		}
	}

	private function sendEmail($TransID)
	{
		$emailConfig = $this->config->item('smtp_sendinblue');
		$this->load->library('email', $emailConfig);
		$this->email->set_newline("\r\n");
		$this->email->set_mailtype("html"); 
		$noreply_email = $emailConfig['noreply_email'];
		$customer_email = $_POST['email'];
		$admin_email = $emailConfig['admin_email'];
		//$username = 'v4designSpecialists';
		$username = $emailConfig['username'];
		$name = $_POST['first_name'];
		$subject = 'New Order';
		$this->email->from($noreply_email, $username);
		$this->email->to($admin_email);
		$orderId = get_cookie('paypal');
		$orderarr = $this->Public_model->getOrderByOrderId($orderId);
		$for_id = $orderarr[0]['for_id'];
		$orderproducts = $this->cart->contents();
		$orderData = array_values($orderproducts);
		$this->email->subject('Admin '.$subject.' Email for you');
		$data = array( 'img'=> 'https://www.sugacci.com/attachments/site_logo/logo.png' , 'items'=> $_POST , 'orderId' => $orderId, 'TransID' => $TransID , 'orderDataitems' => $orderData, 'for_id' => $for_id);
		$body = $this->load->view('/templates/clothesshop/email-template/order-email/admin_email_template',$data,TRUE);
		$this->email->message($body);

		if($this->email->send()) {
			$this->email->clear(TRUE); // Pass TRUE as an argument if you are sending attachments
			$this->email->from($noreply_email, $username); 
			$this->email->to($customer_email); 
			$this->email->subject('Welcome to '. $username);
			$body = $this->load->view('/templates/clothesshop/email-template/order-email/customer_email_template',$data,TRUE);           
			$this->email->message($body);
			if($this->email->send()){ }
		}
	}

	public function Newsletter()
	{
		$this->load->template('Newsletter');
	}		

	public function subscribeNewsletter()
	{
		$email = $this->input->post('email');
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$response = array(
				'success' => 'false',
				'message' => 'Please enter valid email address.'
			);
		}else{
			$data = array(
				'email'    => $email,
				'browser'  => $_SERVER['HTTP_USER_AGENT'],
				'time'     => time()
			);
			$resp = $this->Home_Model->saveSubscription($data);
			if ($resp) {
				
				//sending admin notification
				// $template_path = '/templates/clothesshop/email-template/subscription-email/admin_email_template';
				// send_mail('admin',NULL,'New Customer Subscription at V4designspecialists',$template_path,$data);
				
				$response = array(
					'success' => 'true',
					'message' => 'Thanks for subscribing!'
				);
			
			}else{
				$response = array(
					'success' => 'false',
					'message' => 'You have already subscribed!'
				);
			
			}
		
		}
	
		echo json_encode($response);
		die();
	}
	public function productPopup(){

        $data['product_id'] = $_POST['product_id'];
        $response = $this->load->view('single-product-popup',$data , true);   
        echo $response;
        exit;
    }  
	public function homepageCart($product_Id){

		$this->load->library('cart');

		$result = $this->Home_Model->getSingleProduct($product_Id);

		if(!empty($result['discount_price']) || $result['discount_price'] !=''){
			$price = $result['discount_price'];
		}else{
			$price = $result['price'];
		}

        $data = array(
            'id'            => $product_Id,
            'qty'           => '1',
            'price'         => $price,
            'name'    	    => $result['title'],
            'image'         => $result['image'],
            'folder'        => $result['folder']
        );
        $this->cart->insert($data);
		$response = 'success';
		echo json_encode($response);
  	}

	  
	
}