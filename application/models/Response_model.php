<?php

class Response_model extends CI_Model
{
  public function index($id_question)
  {
    $this->db->select('*');
    $this->db->where('id_question', $id_question);
    $this->db->order_by('id_question', 'DESC');
    return $this->db->get('answers')->result_array();
  }

  public function show($id_question)
  {
    return $this->db->get_where("questions", array('id_question' => $id_question))->result_array();
  }

  public function store($response)
  {
    if ($this->db->insert("answers", $response)) {
      return true;
    }
    return false;
  }

  public function destroy($id_answer)
  {
    $this->db->where('id_answer', $id_answer);

    return $this->db->delete('answers');
  }
}
