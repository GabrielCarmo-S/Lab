<?php
class Question extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		permission();
		$this->load->model("Question_model");
		$this->load->model("Category_model");
		$this->load->model("Login_model");
	}

	public function index($id_category)
	{
		$data["title"] = 'Perguntas';
		$data["id_category"] = $id_category;

		$data['questions'] = $this->Question_model->index($id_category);
		$data['category'] =  $this->Category_model->show($id_category);
		
		foreach ($data['questions'] as $ret){

			$id_user = $ret['id_user'];

		}

		$data['login'] =  $this->Login_model->getUser($id_user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('question/index', $data);
		$this->load->view('templates/footer');
	}

	public function store($id_category)
	{
		$now = new DateTime();
		foreach ($_SESSION['logged_user'] as $ret) {
			$questions = array(
				'question' => $_POST['question'],
				"created" => $now->format('Y-m-d H:i:s'),
				"modified" => $now->format('Y-m-d H:i:s'),
				'id_user' => $ret,
				'id_category' => $id_category,

			);
			if ($this->Question_model->store($questions)) {
				redirect("question/index/" . $id_category . "");
			}
			exit();
		}
	}

	public function destroy($id_question, $id_category)
	{
		$this->Question_model->destroy($id_question);
		//$this->session->set_flashdata("success", 'Usuário deletado com sucesso');
		redirect("/question/index/" . $id_category . "");
	}
}
