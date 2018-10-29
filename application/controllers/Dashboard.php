<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//loading session library
		$this->load->library('session');
	}

	public function index() {
		$userId = $this->session->userdata('id');
		$this->load->view('home');
	}
}