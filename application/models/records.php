<?php
class Records extends CI_Model{
	
	public function getRegister($data){
		$query = $this->db->insert('tbladmin', $data);
		return $query;
	}

	public function getAdminLogin($email, $password)
	{
		$sql = "SELECT * FROM `tbladmin` where admin_email = '$email' AND admin_password = '$password'";
		$log=$this->db->query($sql);
		return $log->result();
	}

	public function addSubject($data)
	{
		$query = $this->db->insert('tblsubject', $data);
		return $query;
	}

	public function getSubject()
	{
		$sql = "SELECT * FROM tblsubject";
		$log=$this->db->query($sql);
		return $log->result();
	}

	public function addLab($data)
	{
		$query = $this->db->insert('tbllab', $data);
		return $query;
	}

	public function getLab()
	{
		$sql = "SELECT * FROM tbllab";
		$log=$this->db->query($sql);
		return $log->result();
	}

	public function delLab($id)
	{
		$delete = "DELETE FROM tbllab WHERE lab_id = '$id'";
		$query = $this->db->query($delete);
		return $query;
	}

	public function addTeacher($data)
	{
		$query = $this->db->insert('tblteacher', $data);
		return $query;
	}
}
