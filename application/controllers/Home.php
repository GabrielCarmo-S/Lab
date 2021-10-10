<?php
class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        permission();
	}

	public function index()
	{
		$data["title"] = 'Login';
		$this->load->view('templates/header2', $data);
		$this->load->view('index', $data);
		$this->load->view('templates/footer');
	}

}
