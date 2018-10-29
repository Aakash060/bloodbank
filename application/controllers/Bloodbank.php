<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bloodbank extends CI_Controller {

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
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'password' => $this->input->post('password'),
		);
		$this->loginmodel->insertData($data);
	}

	public function getUsersData() {
		$email = $this->input->post('emailLogin');
		$password = $this->input->post('passwordLogin');
		$data = $this->loginmodel->getData($email, $password);
		$name = $this->loginmodel->getUserName($email);

		if ($data == "true") {
			$this->loginmodel->updateStatus($email, $password);
			//adding data to session
			$session = $this->session->set_userdata(array('id' => $name[0]['id'], 'type' => $name[0]['type'], 'email' => $email, 'name' => $name[0]['name'], 'address' => $name[0]['address'], 'mobile' => $name[0]['mobile'], 'bloodgroup' => $name[0]['bloodgroup']));
			$this->load->view('home');
		} else {
			// Display error message
			$this->session->set_flashdata('message_name', 'Invalid login credentials');
			redirect('bloodbank');
		}
	}

	public function registerUser() {
		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'bloodgroup' => $this->input->post('bloodgroup'),
			'email' => $this->input->post('email'),
			'mobile' => $this->input->post('mobile'),
			'password' => $this->input->post('password'),
		);
		$this->loginmodel->insertData($data);
		$this->loginmodel->updateType(); //type 0 for hospital and type 1 for receiver
	}

	public function logout() {
		//destroy session
		$this->session->sess_destroy();
		redirect('bloodbank');
	}

	public function resetPassword() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->loginmodel->updatePassword($email, $password);
	}

	public function insertbloodInfo() {
		$userName = $this->session->userdata('name');
		$userId = $this->session->userdata('id');
		$data = array(
			'userId' => $userId,
			'hospital_name' => $userName,
			'samples' => $this->input->post('availableSamples'),
			'type' => $this->input->post('sampleType'),
			'quantity' => $this->input->post('quantity'),
		);
		$this->loginmodel->insertBloodInfo($data);
		$this->load->view('home');
	}
}