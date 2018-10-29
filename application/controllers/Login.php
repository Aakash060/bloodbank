<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//loading session library
		$this->load->library('session');
		$this->load->model('loginmodel');
	}

	public function index() {
		$this->load->view('login');
	}

	public function createAccount() {
		$data = array(
			'email' => $this->input->post('email'),
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'password' => $this->input->post('password'),
		);

		$this->loginmodel->insertData($data);

	}

	public function getUsersData() {
		$email = $this->input->post('emailLogin');
		$password = $this->input->post('passwordLogin');
		$data = $this->loginmodel->getData($email, $password);
		if ($data == "true") {
			$this->loginmodel->updateStatus($email, $password);
			redirect('dashboard');
		} else {
			redirect('smspanel');
		}
	}
}