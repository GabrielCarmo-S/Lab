<?php
class Login extends CI_Controller
{

	public $session_data;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->session_data = $this->session->userdata('message');
		$this->load->model("Login_model");
	}

	public function index()
	{
		$data['error'] = $this->session->flashdata('error');
		$data['success'] = $this->session->flashdata('success');

		$data["title"] = 'Login';
		$this->load->view('templates/header', $data);
		$this->load->view('login/index', $data);
		$this->load->view('templates/footer');
	}

	public function register()
	{
		$data['error'] = $this->session->flashdata('error');
		$data["title"] = 'Registro';

		$this->load->view('templates/header', $data);
		$this->load->view('login/register', $data);
		$this->load->view('templates/footer');
	}

	public function signin()
	{
		
		$email = $_POST["email"];
		$password = md5($_POST["password"]);
		$user = $this->Login_model->signin($email, $password);

		if ($user) {
			$this->session->set_userdata("logged_user", $user);
			redirect("home");
		} else {
			$this->session->set_flashdata("error", 'Senha ou e-mail inválido.');
			redirect("login");
		}
	}

    public function store(){

		$now = new DateTime();

		$user = array(
			"name" => $_POST["name"],
			"email" => $_POST["email"],
			"password" => md5($_POST["password"]),
			"created" => $now->format('Y-m-d H:i:s'),
			"modified" => $now->format('Y-m-d H:i:s'),
		);

		$email = $this->Login_model->getEmail($user['email']);

		if(!empty($email)){
			
			$this->session->set_flashdata('error', 'Esse email já esta cadastrado');
			redirect("login/register");
			die();
		}

		if($this->Login_model->store($user)){
			$this->session->set_flashdata("success", 'Conta criada com sucesso');
			redirect("login");		
		}
		
		
	}

	public function logout(){
		$this->session->unset_userdata("logged_user");
		redirect("/");
	}

}
