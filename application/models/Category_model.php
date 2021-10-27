<?php

class Category_model extends CI_Model
{
	public function index()
	{
		return $this->db->get_where("category")->result_array();
	}

	public function show($id_category)
	{
		return $this->db->get_where("category", array('id_category' => $id_category))->result_array();
	}
}
