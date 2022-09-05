<?php

class Youtube_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function getYoutube()
    {
        $result = $this->db->get('youtube');
        return $result->result_array();
    }
	
	public function getYoutubeSingle($ctid)
    {
		$this->db->where('id', $ctid);
        $query = $this->db->get('youtube');

            return $query->row_array();
    }

    public function setYoutubes($post)
    {
        if (!$this->db->insert('youtube', array(
            
                        'youtube_title' => $post['youtube_title'],
                        'youtube_url' => $post['youtube_url'],
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
    }
	public function updateYoutube($post, $id)
    {
       if (!$this->db->where('id', $id)->update('youtube', array(
					'youtube_title' => $post['youtube_title'],
					'youtube_url' => $post['youtube_url'],

                    
		))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
	
	 public function getOneYoutube($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('youtube');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }


    public function setYoutube($post, $id = 0)
    {
        
        
        $is_update = false;
        if ($id > 0) {
            $is_update = true;
            if (!$this->db->where('id', $id)->update('youtube', array(
                        'youtube_title' => $post['youtube_title'],
                        'youtube_url' => $post['youtube_url'],

                        
                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
        } else {
            
           
            if (!$this->db->insert('youtube', array(
                      'youtube_title' => $post['youtube_title'],
                      'youtube_url' => $post['youtube_url'],

                      
                        
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
            $id = $this->db->insert_id();

            
        }
    }

    public function deleteYoutube($id)
    {
        if (!$this->db->where('id', $id)->delete('youtube')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

}
