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


		public function getInit(){
			//
			for($i=0;$i<=9;$i++){
				$cdu=1;
				switch($i){
					case 0: 
						$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Generalidades';
					break;
					
					case 1:
						$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Filosofia y Psicologia';
		            break;

		            case 2:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$valu = 'Religion y Teologia';    
		            break;
		            
		            case 3:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$valu = 'Ciencias Sociales y Diciplinas Afines';    
		            break;

		            case 4:
		             	$cdu=37;
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$valu = 'Educacion';    
		            break;
		            
		            case 5:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Ciencias Puras y Naturales';
		            break;
		            
		            case 6:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Ciencias Aplicadas';
		            break;

		            case 7:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Bellas Artes';
		            break;
		            
		            case 8:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Linguistica-Filologia-Literatura';
		            break;

		            case 9:
		            	$this->db->query('INSERT INTO Topic(topic_cdu, topic_name) VALUES (:topic_cdu,:topic_name)');
						$value = 'Geografia-Bibliografias-Historia';
		            break;                      
				}
				$this->db->bind(':topic_cdu',$cdu);
		        $this->db->bind(':topic_name', $value);
				if($this->db->execute()){
					return true;
			
				}
			}		
		}

	}
?>