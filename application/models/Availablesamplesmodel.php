<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Availablesamplesmodel extends CI_Model {

	public function fetchData() {
		$query = "SELECT bloodinfo.samples,bloodinfo.hospital_name,bloodinfo.type as bloodtype,bloodinfo.quantity,bloodinfo.userId,users.type FROM users,bloodinfo WHERE bloodinfo.userId=users.id AND users.type=0 GROUP BY users.id ORDER BY hospital_name";
		$sqlQuery = $this->db->query($query);
		return $sqlQuery->result();
	}

	public function samplesrequest($data = '') {
		$this->db->insert('requestsamples', $data);
	}
}