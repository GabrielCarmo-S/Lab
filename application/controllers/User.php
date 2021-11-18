<?php
class User extends CI_Controller
{

  public $session_data;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('session');

  }

  public function index($id)
  {
    $data["title"] = 'Respostas';
    $this->load->model("Users_model");

    $data["users"] = $this->Users_model->show($id);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/footer');
  }


  
	public function update($id)
	{
    $this->load->model("Users_model");

		$user = array(
			"name" => $_POST["name"],
			"email" => $_POST["email"],
		);

		$this->Users_model->update($id, $user);
		redirect("/login/logout");
	}

}
