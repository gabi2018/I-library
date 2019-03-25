<?php 
	class Author{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function authorRecord($param){
			$this->db->query('INSERT INTO author(author_name, author_lastname) 
				VALUES (:author_name, :author_lastname)');

			$this->db->bind(':author_name', $param['author-name']);
			$this->db->bind(':author_lastname', $param['author-lastname']);

			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
		public function getAuthors(){
			$this->db->query('SELECT * FROM author');
			$result = $this->db->getRecords();

			return $result;
		}

		public function getAuthor($id){
			$this->db->query('SELECT * FROM author WHERE author_id = :author_id');
			$this->db->bind(':author_id',$id);

			$response = $this->db->getRecord();
			return $response;
		}

		public function editAuthor($param){
			$this->db->query('UPDATE author 
				SET author_name = :author_name, author_lastname = :author_lastname 
				WHERE author_id = author_id');

			$this->db->bind(':author_id', $param['author-id']);
			$this->db->bind(':author_name', $param['author-name']);
			$this->db->bind(':author_lastname',$param[
				'author-lastname']);

			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
	}

 ?>