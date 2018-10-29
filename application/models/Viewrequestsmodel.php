<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viewrequestsmodel extends CI_Model {

	public function fetchData() {
		$query = "SELECT * FROM requestsamples ORDER BY name";
		$sqlQuery = $this->db->query($query);
		return $sqlQuery->result();
	}
}