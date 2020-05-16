<?php
	class School {
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function getSchools(){
			$this->db->query('SELECT * FROM  school');
			$response = $this->db->getRecords();
			return $response;
		}

		public function getSchool($id){
			$this->db->query('SELECT * FROM school WHERE school_id = :school_id');
			$this->db->bind(':school_id', $id);
			$response = $this->db->getRecord();
			return $response;
		}

		public function schoolRecord($param){
			$this->db->query('INSERT INTO school(school_name)
							  VALUES (:school_name )');
			# Link values
			$this->db->bind(':school_name', $param['school_name']);	
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function editSchool($param){		
			$this->db->query('UPDATE school SET school_name=:school_name  WHERE school_id=:school_id');
			# Link values
			$this->db->bind(':school_id', $param['school-id']);
			$this->db->bind(':school_name', $param['school_name']);
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>