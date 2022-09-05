<?php

class Blog_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function getTest()
    {
        $result = $this->db->get('blogs');
        return $result->result_array();
    }
	
	public function getTestSingle($ctid)
    {
		$this->db->where('id', $ctid);
        $query = $this->db->get('blogs');

            return $query->row_array();
    }

    public function setblogs($post)
    {
        if (!$this->db->insert('blogs', array(
                        'image' => $post['image'],
                        'name' => $post['name'],
                        'author' => $post['author'],
                        'description' => $post['description']
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
    }
	public function updateTestimonial($post, $id)
    {
       if (!$this->db->where('id', $id)->update('blogs', array(
						'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
						 'name' => $post['name'],
                         'author' => $post['author'],
                        'description' => $post['description']
		
		))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
	
	 public function getOneTestimonial($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('blogs');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    public function deleteTest($id)
    {
        if (!$this->db->where('id', $id)->delete('blogs')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
	
	public function getTestimonial()
    {
        $result = $this->db->get('blogs');
        return $result->result_array();
    }
	
	
	

    public function setTestimonial($post, $id = 0)
    {
        
        
        $is_update = false;
        if ($id > 0) {
            $is_update = true;
            if (!$this->db->where('id', $id)->update('blogs', array(
                        'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
						 'description' => $post['description'],
                         'author' => $post['author'],
                        'name' => $post['name']
                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        } else {
            
           
            if (!$this->db->insert('blogs', array(
                       'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
						'description' => $post['description'],
                        'author' => $post['author'],
                        'name' => $post['name']
                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();

            
        }
    }

    public function deleteTestimonial($id)
    {
        if (!$this->db->where('id', $id)->delete('blogs')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

}
