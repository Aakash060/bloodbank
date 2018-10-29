<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

	public function insertData($data = '') {
		$this->db->insert('users', $data);
	}

	public function updateType() {
		$query = "UPDATE users SET type=1 WHERE bloodgroup!=\"Hospital\"";
		$this->db->query($query);
	}

	public function insertBloodInfo($data = '') {
		$this->db->insert('bloodinfo', $data);
	}

	public function getData($email = '', $password = '') {
		$query = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
		$sqlQuery = $this->db->query($query)->result_array();
		if (count($sqlQuery) > 0) {
			return "true";
		} else {
			return "false";
		}
	}

	public function updateStatus($email = '', $password = '') {
		$query = "UPDATE users SET active=1 WHERE email='" . $email . "' AND password='" . $password . "'";
		$this->db->query($query);
	}

	public function getDbData($email = '') {
		$query = $this->db->query("SELECT * FROM users WHERE email='" . $email . "'");
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function updatePassword($email = '', $password = '') {
		$query = "UPDATE users SET password='" . $password . "' WHERE email='" . $email . "'";
		$this->db->query($query);
	}

	public function getUserId($email = '') {
		$query = "SELECT id FROM users WHERE email='" . $email . "'";
		$sqlQuery = $this->db->query($query);
		return $sqlQuery->result_array();
	}

	public function getUserName($email = '') {
		$query = "SELECT * FROM users WHERE email='" . $email . "'";
		$sqlQuery = $this->db->query($query);
		return $sqlQuery->result_array();
	}
}