<?php
class Login extends CI_Controller
{

	public $session_data;

	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->session_data = $this->session->userdata('message');
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
		$data['message'] = $this->session->flashdata('message');
		$data["title"] = 'Registro';

		$this->load->view('templates/header', $data);
		$this->load->view('login/register', $data);
		$this->load->view('templates/footer');
	}

	public function signin()
	{
		$this->load->model("login_model");
		$email = $_POST["email"];
		$password = ($_POST["password"]);
		$user = $this->login_model->signin($email, $password);

		if ($user) {
			$this->session->set_userdata("logged_user", $user);
			redirect("welcome");
		} else {
			$this->session->set_flashdata("error", 'Senha ou e-mail inválido.');
			redirect("login");
		}
	}

	public function logout(){
		$this->session->unset_userdata("logged_user");
		redirect("index.php/login");
	}

    public function store(){
		$this->load->model("Users_model");
		$this->load->model("Login_model");

		$user = array(
			"name" => $_POST["nome"],
			"cpf" => $_POST["cpf"],
			"funcao" => 'P',
			"datanasc" => $_POST["datanasc"],
			"email" => $_POST["email"],
			"password" => md5($_POST["password"]),
			"ativo" => 'S',
			"img_user" => ''
		);

		$email = $this->Users_model->getEmail($user['email']);

		if(!empty($email)){
			
			$this->session->set_flashdata('message', 'Não foi possível criar sua conta pois esse email já esta cadastrado');
			redirect("index.php/login/register");
			die();
		}

		if($this->Users_model->storeLogin($user)){
			$this->session->unset_userdata(['message']);
			$this->session->set_flashdata("success", 'Conta criada com sucesso, agora você pode fazer login');
			redirect("index.php/login");		
			
		}
		
		
	}

}
