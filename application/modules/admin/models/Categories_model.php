<?php

class Categories_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function categoriesCount()
    {
        return $this->db->count_all_results('shop_categories');
    }

    public function getShopCategories()
    {
        $this->db->select('*');
        $query = $this->db->get('shop_categories');
        return $query->result_array();
    }

    public function setShopCategorie($post)
    {
        if (!$this->db->insert('shop_categories', array(
		'name' => $post['categorie_name'],
		))) {
            log_message('error', print_r($this->db->error(), true));
        }
        $id = $this->db->insert_id();
    }

    public function shop_categories($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $result = $this->db->get('shop_categories');
        return $result->row_array();
    }
    public function deleteShopCategorie($id)
    {
        $this->db->where('id', $id);
        if (!$this->db->delete('shop_categories')) {
            log_message('error', print_r($this->db->error(), true));
        }
    }

}
