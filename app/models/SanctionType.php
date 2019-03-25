<?php  

	class SanctionType{
		private $db;

		public function __construct(){
			$this->db = new DataBase;			
		}

		public function getSanctionType($id){
			$this->db->query('SELECT * FROM sanction_type WHERE sanction_type_id = :sanction_type_id');
			$this->db->bind(':sanction_type_id', $id);

			$response = $this->db->getRecord();
			return $response;
		}

		public function getSanctionTypes(){
			$this->db->query('SELECT * FROM  sanction_type');

			$response = $this->db->getRecords();
			return $response;
		}

		public function addSanctionType($param){
			$this->db->query('INSERT INTO sanction_type (sanction_type_measure) VALUES (:sanction_type_measure)');

			# Link values
			$this->db->bind(':sanction_type_measure', $param['sanctiontype-measure']);

			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}

		}

		public function editSanctionType($param){
			$this->db->query('UPDATE sanction_type SET sanction_type_measure = :sanction_type_measure WHERE sanction_type_id = :sanction_type_id');

			# Link values
			$this->db->bind(':sanction_type_id', $param['sanctiontype-id']);
			$this->db->bind(':sanction_type_measure', $param['sanctiontype-measure']);

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