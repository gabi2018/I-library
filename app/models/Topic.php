<?php 
	class Topic{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}
		
		public function getTopic($cdu){
			$this->db->query('SELECT * FROM topic WHERE topic_cdu = topic_cdu');
			$this->db->bind(':topic_cdu', $cdu);
			$response = $this->db-> getRecord();
			return $response;
		}
		
		public function getTopics(){
			$this->db->query('SELECT * FROM topic');
			$result = $this->db->getRecords(); 

			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->topic_cdu] = $value->topic_name;
			}
			return $response; 
		}

	}
?>