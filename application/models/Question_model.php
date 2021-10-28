<?php

class Question_model extends CI_Model
{
  public function index($id_category)
  {
    $this->db->select('*');
    $this->db->where('id_category', $id_category);
    $this->db->order_by('id_question', 'DESC');
    return $this->db->get('questions')->result_array();
  }

  public function store($questions)
  {
    if ($this->db->insert("questions", $questions)) {
      return true;
    }
    return false;
  }

  public function destroy($id_question)
  {
    $this->db->where('id_question', $id_question);

    return $this->db->delete('questions');;
  }
}
