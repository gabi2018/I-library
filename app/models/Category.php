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

		public function getCategories(){
			$this->db->query('SELECT * FROM category');
			$response = $this->db->getRecords();
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