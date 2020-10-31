<?php
	class Subtopic{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}
		
		public function getSubtopics($id){ 
			$this->db->query('SELECT *
			 FROM subtopic
			  WHERE topic_cdu = :topic_id
			   ORDER BY subtopic_name DESC');
			$this->db->bind(':topic_id', $id);
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->subtopic_id] = $value->subtopic_name;
			}
			return $response;
		}
	}
 ?>