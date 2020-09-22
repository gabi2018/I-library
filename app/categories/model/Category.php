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