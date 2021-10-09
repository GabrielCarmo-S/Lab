<?php

class Login_model extends CI_Model
{
	public function signin($email, $password){
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$user = $this->db->get("users")->row_array();
		return $user;
	}
}
