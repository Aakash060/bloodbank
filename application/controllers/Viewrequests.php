<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewrequests extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//loading session library
		$this->load->library('session');
		$this->load->model('viewrequestsmodel');
	}

	public function index() {
		$data['requests'] = $this->viewrequestsmodel->fetchData();
		$this->load->view('viewrequests', $data);
	}
}