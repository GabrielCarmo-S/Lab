<?php

class Question_model extends CI_Model
{
    public function index($id_category)
    {
        return $this->db->get_where("questions",array('id_category' => $id_category))->result_array();
    }

    public function store($questions)
    {
        if ($this->db->insert("questions", $questions)) {
            return true;
        }
        return false;
    }


}