<?php

	/**
	 * Creamos la clase tema
	 */
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
			$this->db-query('SELECT * FROM topic');
			$response = $this->$db->getRecords();
			return $response;

		}
		public function addTopic($param){
			$this->db->query('INSERT INTO Topic(topic_name)VALUES (:topic_name)');
			$this->db->bind(':topic_name', $param['topic_name']);

			if($this->db->execute()){
			return true;
			}
			else{
				return false;
			}	
		}

		public function editTopic($param){
			
		}
	}
?>