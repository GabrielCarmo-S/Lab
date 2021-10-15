<?php

class Category_model extends CI_Model
{
    public function index()
    {
        return $this->db->get_where("category")->result_array();
    }
}
