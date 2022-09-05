<?php

class Instagram_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function getInsta()
    {
        $result = $this->db->get('instagram');
        return $result->result_array();
    }
	
	public function getInstaSingle($ctid)
    {
		$this->db->where('id', $ctid);
        $query = $this->db->get('instagram');

            return $query->row_array();
    }

    public function setInstagrams($post)
    {
        if (!$this->db->insert('instagram', array(
                        'image' => $post['image'],
                        'insta_url' => $post['insta_url'],
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
    }
	public function updateInstagram($post, $id)
    {
       if (!$this->db->where('id', $id)->update('instagram', array(
						'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
						 'insta_url' => $post['insta_url'],
		))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
	
	 public function getOneInstagram($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('instagram');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    public function deleteInsta($id)
    {
        if (!$this->db->where('id', $id)->delete('instagram')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
	
	public function getInstagram()
    {
        $result = $this->db->get('instagram');
        return $result->result_array();
    }
	
	
	

    public function setInstagram($post, $id = 0)
    {
        
        
        $is_update = false;
        if ($id > 0) {
            $is_update = true;
            if (!$this->db->where('id', $id)->update('instagram', array(
                        'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
                        'insta_url' => $post['insta_url']
                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        } else {
            
           
            if (!$this->db->insert('instagram', array(
                       'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
                        'insta_url' => $post['insta_url']
                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();

            
        }
    }

    public function deleteInstagram($id)
    {
        if (!$this->db->where('id', $id)->delete('instagram')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

}
