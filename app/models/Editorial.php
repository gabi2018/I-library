<?php
	class Editorial{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function getEditorials(){
			$this->db->query('SELECT * FROM  editorial ORDER BY editorial_name');
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->editorial_id] = $value->editorial_name;
			}
			return $response; 
		}		

		public function getEditorial($id){
			$this->db->query('SELECT * FROM  editorial WHERE editorial_id = :editorial_id');
			$this->db->bind(':editorial_id', $id);

			$response = $this->db->getRecord();
			return $response;
		}

		public function getEditorialId($name){
			$this->db->query('SELECT editorial_id FROM editorial WHERE editorial_name = :editorial_name');
			$this->db->bind(':editorial_name', $name);
			$response = $this->db->getRecord();
			return $response->editorial_id;
		}

		public function getEditorialName($param){
			$this->db->query('SELECT * FROM editorial WHERE editorial_name  LIKE "%" :editorial "%" ORDER BY editorial_name');
			$this->db->bind(':editorial', $param['editorial']);
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->editorial_id] =  $value->editorial_name;
			} 	
			return $response;
		}

		public function addEditorial($param){
			$this->db->query('INSERT INTO editorial(editorial_name, editorial_fiscal_address)
							  VALUES (:editorial_name,:editorial_address )');
			# Link values
			$this->db->bind(':editorial_name', $param['editorial-name']);
			$this->db->bind(':editorial_address', $param['editorial-address']);
			
			# Run
			if($this->db->execute()){
				return $this->getEditorialId($param['editorial-name']);
			}
			else{ return null; }
		}

		public function editEditorial($param){
			$this->db->query('UPDATE editorial 
							  SET editorial_name = :editorial_name ,editorial_fiscal_address = :editorial_address 
							  WHERE editorial_id = :editorial_id');

			# Link values
			$this->db->bind(':editorial_id', $param['editorial-id']);
			$this->db->bind(':editorial_name', $param['editorial-name']);
			$this->db->bind(':editorial_address', $param['editorial-address']);
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