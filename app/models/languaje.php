<?php
	class Languaje {
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function getLanguajes(){
			$this->db->query('SELECT * FROM  languaje');
			$result=$this->db->getRecords();
			return $result;
		}

		public function getLanguaje($id){
			$this->db->query('SELECT * FROM languaje WHERE languaje_id = :languaje_id');
			$this->db->bind(':languaje_id', $id);
			$response = $this->db->getRecord();
			return $response;
		}

		public function languajeRecord($param){
			$this->db->deleteSpecialChars($param['languaje_desc'], 'text');
			$this->db->query('INSERT INTO languaje(languaje_desc)
								VALUES (:languaje_desc )');
			# Link values
			$this->db->bind(':languaje_desc', $param['languaje_desc']);	
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		
		public function editLanguaje($param){		
			$this->db->query('UPDATE languaje SET languaje_desc=:languaje_desc  WHERE languaje_id=:languaje_id');
			# Link values
			$this->db->bind(':languaje_id', $param['languaje-id']);
			$this->db->bind(':languaje_desc', $param['languaje_desc']);

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