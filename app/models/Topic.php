<?php

	/**
	 * Creamos la clase tema
	 */
	class Topic{

		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}
		
		public function topicRecord($param){

			$this->db->query('INSERT INTO topic(topic_name) VALUES(:topic_name)');

			//Link values y pasamos por parametro a la base de datos
			$this->db->bind('topic_name', $param['topic_name']);

			//ejecuta la base de dato, simpre  cuando ese correcto

			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}

		}
		
		public function getTopicAll(){
			$this->db-query('SELECT * FROM topic');
			$result=$this->$db->getRecords();
		}
	}
?>