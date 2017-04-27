<?php

Class Login_model extends CI_Model {

	// Read data using username and password
	public function login($data) {
		
		$condition="username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . md5($data['password']). "' AND " . "status =" . "'Active'";
		$this->db->select('*');
		$this->db->from('tbl_admin');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}

?>