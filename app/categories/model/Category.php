<?php
	class Category{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function getCategory($id){
			$this->db->query('SELECT * FROM category WHERE category_id = :category_id');
			$this->db->bind('category_id',$id);
			$response = $this->db->getRecord();
			return $response; 
		}

		public function getCategories($id){ 
			$this->db->query('SELECT category_name, category_cod, category_id FROM category 
							  WHERE subtopic_id = :subtopic_id ORDER BY category_name DESC');
			$this->db->bind(':subtopic_id', $id);
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->category_id] = $value->category_name. "_" . $value->category_cod;
			}
			return $response;
		}
		
		public function addCategory($param){
			$this->db->query('INSERT INTO category(category_name) VALUES(:category_name)');
			$this->db->bind(':category_name',$param['category-name']);

			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}

//funcion q me muestra tema subtema y categoria de un libro 
		public function getCategoSubteTema($topolographic){
			$this->db->query('SELECT c.category_name,t.topic_name,s.subtopic_name,c.category_cod,s.subtopic_id,t.topic_cdu,c.category_id
				FROM book b,category c,subtopic s,topic t
				WHERE b.book_topolographic = :topolographic
				and b.category_id=c.category_id
				AND s.subtopic_id=c.subtopic_id
				AND t.topic_cdu=s.topic_cdu');
				$this->db->bind(':topolographic',$topolographic);
				$response = $this->db->getRecord();
			return $response; 
				}

		public function editCategory($param){
			$this->db->query('UPDATE category SET category_name = :category_name WHERE category_id = :category_id');
			$this->db->bind(':category_id', $param['category-id']);
			$this->db->bind(':category_name',$param['category-name']);

			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
	}

?>