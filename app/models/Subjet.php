<?php
	class Subjet {
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function getSubjets(){
			$this->db->query('SELECT * FROM  subjet');
			$result=$this->db->getRecords();
			return $result;
		}

		public function getSubjet($id){
			$this->db->query('SELECT * FROM subjet WHERE subjet_id = :subjet_id');
			$this->db->bind(':subjet_id', $id);
			$response = $this->db->getRecord();
			return $response;
		}

		public function subjetRecord($param){
			$this->db->query('INSERT INTO subjet(subjet_id,subjet_name)
							  VALUES (:subjet_id,:subjet_name )');
			# Link values
			$this->db->bind(':subjet_id', $param['subjet-code']);
			$this->db->bind(':subjet_name', $param['subjet-name']);	
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function editSubjet($param){		
			$this->db->query('UPDATE subjet 
							  SET subjet_id = :subjet_id,subjet_name = :subjet_name 
							  WHERE subjet_id = :subjet_id');
			# Link values
			$this->db->bind(':subjet_id', $param['subjet-code']);
			$this->db->bind(':subjet_name', $param['subjet-name']);

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