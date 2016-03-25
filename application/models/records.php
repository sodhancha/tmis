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
		$sql = "SELECT * FROM tblsubject  where is_deleted =0";
		$log=$this->db->query($sql);
		return $log->result();
	}

	public function delSub($id)
	{
		$delete = "DELETE FROM tblsubject WHERE subject_id = '$id'";
		$query = $this->db->query($delete);
		return $query;
	}

	public function editSub($id)
	{
		$view = "SELECT * FROM `tblsubject` WHERE subject_id = '$id'";
		$query = $this->db->query($view);
		return $query->result();
	}

	public function updateSub($sid, $subname, $subdesc)
	{
		$update = "UPDATE tblsubject SET subject_id='$sid', subject_name='$subname', subject_description='$subdesc' WHERE subject_id = '$sid'";
		$query = $this->db->query($update);
		return $query;
	}

	public function addLab($data)
	{
		$query = $this->db->insert('tbllab', $data);
		return $query;
	}

	public function getLab()
	{
		$sql = "SELECT * FROM tbllab where is_deleted =0";
		$log=$this->db->query($sql);
		return $log->result();
	}

	public function delLab($id)
	{
		$delete = "DELETE FROM tbllab WHERE lab_id = '$id'";
		$query = $this->db->query($delete);
		return $query;
	}

	public function editLab($id)
	{
		$view = "SELECT * FROM `tbllab` WHERE lab_id = '$id'";
		$query = $this->db->query($view);
		return $query->result();
	}

	public function updateLab($lid, $labname)
	{
		$update = "UPDATE tbllab SET lab_id='$lid',lab_name='$labname' WHERE lab_id = '$lid'";
		$query = $this->db->query($update);
		return $query;
	}

	public function addTeacher($data)
	{
		$query = $this->db->insert('tblteacher', $data);
		return $query;
	}

	public function getTeacher()
	{
		$sql = "SELECT t.teacher_id, t.teacher_name, s.subject_name, l.lab_name, t.time_date, t.teacher_salary, t.teacher_image FROM `tblteacher` t
				INNER JOIN tblsubject s ON s.subject_id = t.subject_id
				INNER JOIN tbllab l ON l.lab_id = t.lab_id WHERE t.is_deleted = '0'";
		$log=$this->db->query($sql);
		return $log->result();
	}

	public function delTeacher($id)
	{
		$delete = "UPDATE tblteacher SET is_deleted = '1' WHERE teacher_id = '$id'";
		$query = $this->db->query($delete);
		return $query;
	}

	public function editTeacher($id)
	{
		$view = "SELECT t.teacher_id, t.teacher_name, s.subject_name, l.lab_name, t.time_date, t.teacher_salary, t.teacher_image FROM `tblteacher` t
				INNER JOIN tblsubject s ON s.subject_id = t.subject_id
				INNER JOIN tbllab l ON l.lab_id = t.lab_id WHERE t.is_deleted = '0'";
		$query = $this->db->query($view);
		return $query->result();
	}
}
