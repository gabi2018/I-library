<?php

	class Editorial{

		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function editorialRecord($param){
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



		public function getEditorialAll(){
			$this->db->query('SELECT * FROM  editorial');
			$result=$this->$db->getRecords();



		}		
	}
?>