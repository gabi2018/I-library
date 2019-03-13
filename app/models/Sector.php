<?php  

	class Sector{
		private $db;

		public function __construct(){
			$this->db = new DataBase;			
		}

		public function getSector($id){
			$this->db->query('SELECT * FROM  sector_unv WHERE sector_id = :sector_id');
			$this->db->bind(':sector_id', $id);

			$response = $this->db->getRecord();
			return $response;
		}

		public function getSectors(){
			$this->db->query('SELECT * FROM  sector_unv');

			$response = $this->db->getRecords();
			return $response;
		}

		public function addSector($param){
			$this->db->query('INSERT INTO sector_unv (sector_desc) VALUES (:sector_name)');

			# Link values
			$this->db->bind(':sector_name', $param['sector-name']);

			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}

		}

		public function editSector($param){
			$this->db->query('UPDATE sector_unv SET sector_desc=:sector_name WHERE sector_id=:sector_id');

			# Link values
			$this->db->bind(':sector_id', $param['sector-id']);
			$this->db->bind(':sector_name', $param['sector-name']);

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