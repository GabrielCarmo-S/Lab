<?php
class Question extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        permission();
		$this->load->model("Question_model");
	}

	public function index($id_category)
	{
		$data["title"] = 'Perguntas';
		$data["id_category"] = $id_category;

		//$this->load->model("Category_model");

		$data['questions'] =  $this->Question_model->index($id_category);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('question/index', $data);
		$this->load->view('templates/footer');
	}

    public function store($id_category)
	{
		$now = new DateTime();
		foreach ($_SESSION['logged_user'] as $ret){
			$questions = array(
				'question'=>$_POST['question'],
				"created" => $now->format('Y-m-d H:i:s'),
				"modified" => $now->format('Y-m-d H:i:s'),
				'id_user'=>$ret,
				'id_category'=> $id_category,

			);
			if($this->Question_model->store($questions)){
				redirect('/home');
			}
			exit();
		}
	
	}

}
