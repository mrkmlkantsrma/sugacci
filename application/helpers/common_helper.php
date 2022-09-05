<?php 
    
function getProductOptions($whereData = [])
{
    $ci=& get_instance();
    if( isset( $whereData['mainCategory'] ) && !empty($whereData['mainCategory']) )
    {
        $catId = $whereData['mainCategory'];        
        if( $catId <= 14 )
        { // this check for furniture
            $sql = "select pt.title, p.id from products as p left join products_translations as pt on pt.for_id = p.id"; 
        }elseif( $catId >= 15 )
        { // this check for Lighting
            $sql = "select pt.title, p.id from products_lighting as p left join products_lighting_translations as pt on pt.for_id = p.id"; 
        }
        $query = $ci->db->query($sql);
        return $query->result();            
    }
}

function getRelatedProducts($whereData = []) 
{
    $ci=& get_instance();
    if( isset( $whereData['category_id'] ) )
    {
        $catgoryId = $whereData['category_id']; 
        $sql = "select * from related_product_new where category_id = '$catgoryId' and sub_category_id IS NULL order by id ASC";               
    }

    if( isset( $whereData['category_id'] ) && isset( $whereData['sub_category_id'] ) )
    {
        $subCatgoryId = $whereData['sub_category_id']; 
        $sql = "select * from related_product_new where category_id = '$catgoryId' and sub_category_id = '$subCatgoryId' and product_id IS NULL order by id ASC";               
    }

    if( isset( $whereData['category_id'] ) && isset( $whereData['sub_category_id'] )  && isset( $whereData['product_id'] ) )
    {
        $productId = $whereData['product_id']; 
        $sql = "select * from related_product_new where category_id = '$catgoryId' and sub_category_id = '$subCatgoryId' and product_id = '$productId' order by id ASC";               
    }
    $query = $ci->db->query($sql);
    $results = $query->result(); 
    $returnData = [];

    if( $results )
    {
        foreach( $results as $relatedProduct)
        {
            switch ($relatedProduct->product_type) 
            {
                case "FURNITURE":
                $sql = "select pt.title, p.id from products as p left join products_translations as pt on pt.for_id = p.id where p.id = '$relatedProduct->related_product'";
                break;
                case "LIGHTNING":
                $sql = "select pt.title, p.id from products_lighting as p left join products_lighting_translations as pt on pt.for_id = p.id where p.id = '$relatedProduct->related_product'";
                break;
                case "FINEART":
                $sql = "select title, id from fine_art_products  where id = '$relatedProduct->related_product'";
                break;                        
            }
            $query = $ci->db->query($sql);
            $returnData[] = $query->row()->title;        
        }
        return  implode(', ', $returnData);
    }
}

function getRelatedProductsOld($productId)
{
    $ci=& get_instance();    
    $sql = "select * from related_products where product_id = '$productId'";               
    $query = $ci->db->query($sql);
    $data = $query->row();

    if(empty($data))
    {
        return false;
    }
    else
    {
        return $data->related_products;  
    }             
}

function getSubCategories($catId)
{   
    $ci=& get_instance();  
    if($catId < 14)
    {
        $query = $ci->db->query('SELECT for_id,  Name  
        FROM shop_categories_translations 
        WHERE for_id < 14 AND for_id > 7
        ORDER BY for_id');
    }
    if($catId > 14)
    {
        $query = $ci->db->query('SELECT for_id,  Name  
        FROM shop_categories_translations 
        WHERE for_id > 14 AND for_id > 15
        ORDER BY for_id');
    }
    $result = $query->result();      
    return $result;
}


function pr($data, $die = false)
{
    echo "<pre>";
    print_r($data);
    if($die)
    {
        die;
    }
    echo "</pre>";
}

function getFineArtsProducts()
{
    $ci=& get_instance();
    $sql = "select title,id from fine_art_products";  
    $query = $ci->db->query($sql);
    return $query->result();            
}

function getGroupProductsDropdown()
{
    $data = [
        'FURNITURE' => getProductOptions(['mainCategory'=>7]),
        'LIGHTNING' => getProductOptions(['mainCategory'=>15]),
    ];
    
    $returnData = '';
    foreach($data as $key => $val): 
        $returnData .=  "<optgroup label='$key'>";
            foreach($val as $option):
                $returnData .= "<option value='$option->id'>{$option->title}</option> ";
            endforeach;
        $returnData .= "</optgroup>";
    endforeach;
    return $returnData;
    die;
}

function getSubCatGroupProductsDropdownNewFine(){
    $data = [
        'FURNITURE' => getProductOptions(['mainCategory'=>7]),
        'LIGHTNING' => getProductOptions(['mainCategory'=>15]),
        'FINEART'   => getFineArtsProducts(),
    ];

    $returnData = '';
    foreach($data as $key => $val):
            
        $returnData .=  "<optgroup label='$key'>";
        foreach($val as $option):
            pr($option);
                $returnData .= "<option value='{$key}-{$option->id}'>{$option->title}</option>";
                endforeach;
            $returnData .= "</optgroup>";
        endforeach;
    return $returnData;
    
    die;

}

function getSubCatGroupProductsDropdown()
{
    $data = [
        'FURNITURE' => getProductOptions(['mainCategory'=>7]),
        'LIGHTNING' => getProductOptions(['mainCategory'=>15]),
    ];

    $returnData = '';
    foreach($data as $key => $val):
        $returnData .=  "<optgroup label='$key'>";
            foreach($val as $option):
                $returnData .= "<option value='{$key}-{$option->id}'>{$option->title}</option>";
            endforeach;
        $returnData .= "</optgroup>";
    endforeach;
    return $returnData;
    die;
}


function getCatSubCatTitleById($id)
{
    $ci=& get_instance(); 
    $sql = "select name from shop_categories_translations where id  = '$id'";           
    $query = $ci->db->query($sql);
    return $query->row()->name;
}

if ( ! function_exists('form_dropdown'))
{
	function form_dropdown($name = '', $options = array(), $selected = array(), $extra = '')
	{
		if ( ! is_array($selected))
		{
			$selected = array($selected);
		}

		// If no selected state was submitted we will attempt to set it automatically
		if (count($selected) === 0)
		{
			// If the form name appears in the $_POST array we have a winner!
			if (isset($_POST[$name]))
			{
				$selected = array($_POST[$name]);
			}
		}

		if ($extra != '') $extra = ' '.$extra;

		$multiple = (count($selected) > 1 && strpos($extra, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

		$form = '<select name="'.$name.'"'.$extra.$multiple.">\n";

		foreach ($options as $key => $val)
		{
			$key = (string) $key;

			if (is_array($val) && ! empty($val))
			{
				$form .= '<optgroup label="'.$key.'">'."\n";

				foreach ($val as $optgroup_key => $optgroup_val)
				{
					$sel = (in_array($optgroup_key, $selected)) ? ' selected="selected"' : '';

					$form .= '<option value="'.$optgroup_key.'"'.$sel.'>'.(string) $optgroup_val."</option>\n";
				}

				$form .= '</optgroup>'."\n";
			}
			else
			{
				$sel = (in_array($key, $selected)) ? ' selected="selected"' : '';

				$form .= '<option value="'.$key.'"'.$sel.'>'.(string) $val."</option>\n";
			}
		}

		$form .= '</select>';

		return $form;
	}
}



function getCustomerRelatedProducts($whereData = []) 
{
    $ci=& get_instance();
    if( isset( $whereData['category_id'] ) )
    {
        $catgoryId = $whereData['category_id']; 
        $sql = "select * from customer_related_product where category_id = '$catgoryId' and sub_category_id IS NULL order by id DESC";               
    }

    if( isset( $whereData['category_id'] ) && isset( $whereData['sub_category_id'] ) )
    {
        $subCatgoryId = $whereData['sub_category_id']; 
        $sql = "select * from customer_related_product where category_id = '$catgoryId' and sub_category_id = '$subCatgoryId' and product_id IS NULL order by id ASC";               
    }

    if( isset( $whereData['category_id'] ) && isset( $whereData['sub_category_id'] )  && isset( $whereData['product_id'] ) )
    {
        $productId = $whereData['product_id']; 
        $sql = "select * from customer_related_product where category_id = '$catgoryId' and sub_category_id = '$subCatgoryId' and product_id = '$productId' order by id ASC";               
    }
    $query = $ci->db->query($sql);
    $results = $query->result(); 
    $returnData = [];

    if( $results )
    {
        foreach( $results as $relatedProduct)
        {
            switch ($relatedProduct->product_type) 
            {
                case "FURNITURE":
                $sql = "select pt.title, p.id from products as p left join products_translations as pt on pt.for_id = p.id where p.id = '$relatedProduct->related_product'";
                break;
                case "LIGHTNING":
                $sql = "select pt.title, p.id from products_lighting as p left join products_lighting_translations as pt on pt.for_id = p.id where p.id = '$relatedProduct->related_product'";
                break;
                case "FINEART":
                $sql = "select title, id from fine_art_products  where id = '$relatedProduct->related_product'";
                break;                        
            }
            $query = $ci->db->query($sql);
            $returnData[] = $query->row()->title;        
        }
        return  implode(', ', $returnData);
    }
}

function getAllProductsDropdown($whereData = []){
    $data = [
        'FURNITURE' => getProductOptions(['mainCategory'=>7]),
        'LIGHTNING' => getProductOptions(['mainCategory'=>15]),
        'FINEART'   => getFineArtsProducts(),
    ];

    $returnData = '';
    $matchData = $whereData['product_type']."-".$whereData['related_product'];

    foreach($data as $key => $val):       
        $returnData .=  "<optgroup label='$key'>";
                foreach($val as $option):
                    $optionData = $key."-".$option->id;
                    if($optionData== $matchData) {
                        $returnData .= "<option value='$optionData' selected>{$option->title}</option>";
                    }else{
                        $returnData .= "<option value='$optionData'>{$option->title}</option>";
                    }
                endforeach;
            $returnData .= "</optgroup>";
        endforeach;
    return $returnData;
    
    die;

}


function getAllLightingSelectedCategories($whereData = []){
    $cat_id = '15';

    $data = getCategoriesOptions($cat_id);
    $returnData = '';
    $matchData = $whereData['shop_categories_id'];

        foreach($data as $option):  
            $optionID = $option['for_id'];
            $optionTitle = $option['Name'];
            if($optionID== $matchData) {
                $returnData .= "<option value='$optionID' selected>$optionTitle</option>";
            }else{
                $returnData .= "<option value='$optionID'>$optionTitle</option>";
            }
        endforeach;
    return $returnData;
    die;
}

function getAllFurnitureSelectedCategories($whereData = []){
    $cat_id = '7';
    
    $data = getCategoriesOptions($cat_id);
    $returnData = '';
    $matchData = $whereData['shop_categories_id'];

        foreach($data as $option):  
            $optionID = $option['for_id'];
            $optionTitle = $option['Name'];
            if($optionID== $matchData) {
                $returnData .= "<option value='$optionID' selected>$optionTitle</option>";
            }else{
                $returnData .= "<option value='$optionID'>$optionTitle</option>";
            }
        endforeach;
    return $returnData;
    die;
}

function getCategoriesOptions($catId)
{
    $ci=& get_instance();
    $query = $ci->db->query("SELECT id FROM shop_categories where sub_for = $catId ");  
    $forArray = $query->result_array();
    $ids = [];
    foreach($forArray as  $id){
        $ids[] = $id['id'];
    }
    $ci->db->select('for_id, Name');
    $ci->db->where_in('for_id', $ids);
    $results = $ci->db->get('shop_categories_translations');
    return $results->result_array();
}


function verifyGoogleCaptcha($captha){
    $ci=& get_instance();
    $secretCaptcha = $ci->config->item('google_secret');
    if($captha != ''){
        $secretKey = $secretCaptcha;
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey .  '&response=' . $captha."&remoteip=".$ip;
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        return $responseKeys['success'];
    }else{
        return false;
    }   
}

function log_create($meta_key, $meta_data){
    $ci=& get_instance();
    $ci->db->insert('logs', array(
        'meta_key'       => $meta_key,
        'meta_data'      => json_encode($meta_data)
    ));
    if($ci->db->insert_id()){
        return true;
    }else{
        return false;
    }   
}

/* function db_updates(){
    $ci=& get_instance();
    
    //furniture products
    $sql = "select * from products"; 
    $query = $ci->db->query($sql);
    $products = $query->result_array();
    
    foreach( $products as $pro ){
       
        $sql1 = "select * from product_shop_Categories where product_type = 'FURNITURE' AND product_id = ".$pro['id']." AND shop_categories_id = ".$pro['shop_categorie']; 
        $query = $ci->db->query($sql1);
        $cat = $query->row_array();
        if( !empty($cat) ) {
            $data = array(
                'position'              => $pro['position']
            );
        
            $ci->db->where('id', $cat['id']);
            $ci->db->update('product_shop_Categories', $data);
            echo 'fur updated #'.$pro['id']."<br>";
        }else{
            $data = array(
                'product_id'           => $pro['id'],
                'shop_categories_id'    => $pro['shop_categorie'],
                'position'              => $pro['position'],
                'product_type'          => 'FURNITURE',
            );
            $ci->db->insert('product_shop_Categories', $data);
            echo 'fur inserted #'.$pro['id']."<br>";
        }
    }
    
    //lighting products 
    $sql3 = "select * from products_lighting";
    $query = $ci->db->query($sql3);
    $products = $query->result_array();
    
    foreach( $products as $pro ){
        $sql4 = "select * from product_shop_Categories where product_type = 'LIGHTING' AND product_id = ".$pro['id']." AND shop_categories_id = ".$pro['shop_categorie']; 
        $query = $ci->db->query($sql4);
        $cat = $query->row_array();
        if( !empty($cat) ) {
            $data = array(
                'position'              => $pro['position']
            );
        
            $ci->db->where('id', $cat['id']);
            $ci->db->update('product_shop_Categories', $data);
            echo 'light updated #'.$pro['id']."<br>";
        }else{
            $data = array(
                'product_id'           => $pro['id'],
                'shop_categories_id'    => $pro['shop_categorie'],
                'position'              => $pro['position'],
                'product_type'          => 'LIGHTING',
            );
            $ci->db->insert('product_shop_Categories', $data);
            echo 'light inserted #'.$pro['id']."<br>";
        }
    }
    
}
 */


if( !function_exists('body_classes') ){
	function body_classes(){
        $ci=& get_instance();
		$classes = '';
        $classes .= 'page-'.$ci->router->fetch_class(). '-' .$ci->router->fetch_method();
		if( user_agent_switch() != false ){
            $classes .= ' '.user_agent_switch();
        }
        return $classes;
	}
}

/*
* device & browser detection
*/
if( !function_exists('user_agent_switch') ){
	function user_agent_switch(){
		$device = '';

        //device
		if( stristr($_SERVER['HTTP_USER_AGENT'],'ipad') ) {
			$device = "ipad";
		} else if ( stristr($_SERVER['HTTP_USER_AGENT'],'iphone') || strstr($_SERVER['HTTP_USER_AGENT'],'iphone') ) {
			$device = "iphone";
		}
        
        //browser
        if ( stripos( $_SERVER['HTTP_USER_AGENT'], 'Chrome' ) !== false ) {
            $device .= " chrome";
        } else if ( stripos( $_SERVER['HTTP_USER_AGENT'], 'Safari' ) !== false ) {
            $device .= " safari";
        }
		
		if( $device ) {
			return $device; 
		} return false; {
			return false;
		}
	}
}

/*
 * usage: sending emails
 * @param: Type: admin/customer, template_path: view file, $arr(array): content data, 
 * @return true/false
 */
if ( !function_exists('send_mail') ) {
    function send_mail($type,$to=NULL,$subject,$template_path,$arr)
    {
        $ci=& get_instance();
        
        $emailConfig = $ci->config->item('smtp_sendinblue');
        $ci->load->library('email', $emailConfig);
        
        $noreply_email = $emailConfig['noreply_email'];
        $admin_email = $emailConfig['admin_email'];
        $username = $emailConfig['username'];
        
        $ci->email->from($noreply_email, $username);
        if ($type=='admin') {
            $ci->email->to($admin_email);  
        } else {
            $ci->email->to($to);
        }
        $ci->email->subject($subject);
    
        $data = array( 'img'=> 'https://www.v4designspecialists.com/attachments/site_logo/logo.png' , 'items'=> $arr );
    
        $body = $ci->load->view($template_path,$data,TRUE);    
    
        $ci->email->message($body);
    
        if($ci->email->send()) return true;
        
    }
}

?>