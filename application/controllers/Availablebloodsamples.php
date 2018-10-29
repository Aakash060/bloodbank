<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Availablebloodsamples extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//loading session library
		$this->load->library('session');
		$this->load->model('availablesamplesmodel');
	}

	public function index() {
		$data['sample'] = $this->availablesamplesmodel->fetchData();
		$this->load->view('availablesamples', $data);
	}

	public function requestedSamples() {
		$data = array(
			'name' => $this->session->userdata('name'),
			'address' => $this->session->userdata('address'),
			'email' => $this->session->userdata('email'),
			'mobile' => $this->session->userdata('mobile'),
			'bloodgroup' => $this->session->userdata('bloodgroup'),
			'quantity' => $this->input->post('quantity'),
			'description' => $this->input->post('description'),
		);
		$this->availablesamplesmodel->samplesrequest($data);
	}
}