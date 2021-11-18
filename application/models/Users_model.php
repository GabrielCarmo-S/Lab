<?php

class Users_model extends CI_model
{

  public function show($id)
  {
    return $this->db->get_where("users", array(
      "id_user" => $id
    ))->row_array();
  }

  public function update($id, $user)
  {

    $this->db->where("id_user", $id);
    return $this->db->update("users", $user);
  }
}
