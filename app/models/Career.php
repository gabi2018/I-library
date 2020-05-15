<?php 
	class Career{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}
		
		public function getCareer($id){
			$this->db->query('SELECT Car.career_id, Car.career_name, Sh.school_name 
							  FROM career Car 
							  INNER JOIN school Sh ON Car.school_id = Sh.school_id ');
			$this->db->bind(':career_id', $id);
			$response = $this->db-> getRecord();
			return $response;
		}
		
		public function getCareers(){
			$this->db->query('SELECT * FROM career');
			$result = $this->db->getRecords(); 

			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->career_id] = $value->career_name;
			}
			return $response; 
		}

	}
?>