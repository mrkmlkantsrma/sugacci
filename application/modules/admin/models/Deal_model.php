<?php

class Deal_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	public function getDealSingle($ctid)
    {
		$this->db->where('id', $ctid);
        $query = $this->db->get('deals');

            return $query->row_array();
    }

    public function setdeals($post)
    {
        if (!$this->db->insert('deals', array(
                        'image' => $post['image'],
                        'title' => $post['title'],
                        'product' => $post['product'],
                        'discount' => $post['discount'],
                        'end_date' => $post['end_date']
                    ))) {
                log_message('error', print_r($this->db->error(), true));
            }
    }
	public function updateDeal($post, $id)
    {
       if (!$this->db->where('id', $id)->update('deals', array(
						'image' => $post['image'] != null ? $_POST['image'] : $_POST['old_image'],
						 'title' => $post['title'],
                         'product' => $post['product'],
                         'discount' => $post['discount'],
                        'end_date' => $post['end_date']
		
		))) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }
	
	 public function getOneDeal($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('deals');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

	public function getDeals()
    {
        $result = $this->db->get('deals');
        return $result->result_array();
    }

    public function deleteDeal($id)
    {
        if (!$this->db->where('id', $id)->delete('deals')) {
            log_message('error', print_r($this->db->error(), true));
            show_error(lang('database_error'));
        }
    }

}
