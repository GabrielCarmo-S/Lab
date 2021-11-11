<?php
class Response extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("Question_model");
	//	$this->load->model("Response_model");
		$this->load->model("Category_model");
		$this->load->model("Login_model");
	}

	public function index($id_question, $id_category)
	{
		$data["title"] = 'Respostas';
		$data["id_question"] = $id_question;

		$data['questions'] =  $this->Question_model->show($id_question);
		$data['category'] =  $this->Category_model->show($id_category);

		foreach ($data['questions'] as $ret){

			$id_user = $ret['id_user'];

		}

		$data['login'] =  $this->Login_model->getUser($id_user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('response/index', $data);
		$this->load->view('templates/footer');
	}
}
