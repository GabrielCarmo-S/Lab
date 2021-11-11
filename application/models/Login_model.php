<?php

class Login_model extends CI_Model
{
    public function signin($email, $password)
    {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $user = $this->db->get("users")->row_array();
        return $user;
    }

    public function store($user)
    {
        if ($this->db->insert("users", $user)) {
            return true;
        }
        return false;
    }

    public function getEmail($email)
	{
		return $this->db->get_where("users", array(
			"email" => $email
		))->row_array();
	}

    public function getUser($id_user)
	{
		return $this->db->get_where("users", array(
			"id_user" => $id_user
		))->result_array();
	}
}
