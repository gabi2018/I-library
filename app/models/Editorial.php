<?php

	class Editorial{

		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function editorialRecord($param){
			$db->deleteSpecialChars($param['name'], 'text');
					$this->db->query('INSERT INTO editorial(editorial_name, editorial_fiscal_address)
											 VALUES (:editorial_name, :editorial_address )');

					# Link values
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



		public function getEditorials(){
			$this->db->query('SELECT * FROM  editorial');
			$result=$this->db->getRecords();

			return $result;

		}		


		public function getEditorial($id){
			$this->db->query('SELECT * FROM  editorial WHERE editorial_id = :editorial_id');
			$this->db->bind(':editorial_id', $id);

			$response = $this->db->getRecord();
			return $response;
		}

			public function editEditorial($param){
			$this->db->query('UPDATE editorial SET editorial_name=:editorial_name ,editorial_fiscal_address =:editorial_address WHERE editorial_id=:editorial_id');

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