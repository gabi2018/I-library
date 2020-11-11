<?php  
	class Author{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

		public function getAuthor($id){
			$this->db->query('SELECT * FROM author WHERE author_id = :author_id');
			$this->db->bind(':author_id', $id);

			$response = $this->db->getRecord();
			return $response;
		}

		public function getAuthors(){
			$this->db->query('SELECT * FROM author ORDER BY author_name');
			$result   = $this->db->getRecords(); 
			$response = array(); 

			foreach ($result as $key => $value) {
				$response[$value->author_id] = $value->author_name ." ". $value->author_lastname;
			} 
			return $response;
		}

		public function getAuthorName($param){
			$this->db->query('SELECT *
							 FROM author 
							 WHERE author_name LIKE "%" :author "%" 
							 OR author_lastname LIKE "%" :author "%" 
							 ORDER BY author_name');
			$this->db->bind(':author', $param['author']);
			$result   = $this->db->getRecords(); 
			$response = array(); 
			
			foreach ($result as $key => $value) {
				$response[$value->author_id] = "".$value->author_name ." ". $value->author_lastname."";
			} 	
			return $response;
		}
		
		public function getAuthorId($param){
			$this->db->query('SELECT author_id 
								FROM author 
								WHERE author_name = :author_name 
								AND author_lastname = :author_lastname');
			$this->db->bind(':author_name', $param['author-name']);
			$this->db->bind(':author_lastname', $param['author-lastname']);
			$response = $this->db-> getRecord();
			return $response->author_id;
		}

		public function addAuthor($param){
			$this->db->query('INSERT INTO author (author_name, author_lastname) 
							  VALUES (:author_name, :author_lastname)');

			$this->db->bind(':author_name', $param['author-name']);
			$this->db->bind(':author_lastname', $param['author-lastname']);

			if($this->db->execute()){
				return $this->getAuthorId($param);
			}
			else{ return null;	}
		}
		
		public function getAhutoresBook($topolographic){

		$this->db->query('SELECT a.author_name,a.author_lastname,aut.author_type_identifier,a.author_id,aut.author_type_id
							FROM book b ,author a ,authors_has_book au ,author_type aut 
							WHERE book_topolographic = :book_topolographic
							AND b.book_id = au.book_id 
							AND au.author_id 		 = a.author_id 
							AND aut.author_type_id	 = au.author_type_id 
							ORDER BY aut.author_type_id
							');

		$this->db->bind(':book_topolographic', $topolographic);
	
		$result = $this->db-> getRecords();
			$response=array();
			foreach ($result as $key => $value) {
				$response[$key]=$value ;
			} 	
		return $response;


		}
		public function editAuthor($param){
			$this->db->query('UPDATE author 
							  SET author_name = :author_name, author_lastname = :author_lastname 
							  WHERE author_id = :author_id');

			$this->db->bind(':author_id', $param['author-id']);
			$this->db->bind(':author_name', $param['author-name']);
			$this->db->bind(':author_lastname', $param['author-lastname']);

			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}


		public function deleteAHB($idAutorTipo,$id_book){
			if (isset($id_book) && isset($idAutorTipo)){
			$ids= explode("_",$idAutorTipo);
			$authorId     = $ids[0];
			$typeAuthorId = $ids[1];   
			$this->db->query('DELETE FROM authors_has_book
								 WHERE authors_has_book.author_id =  :author_id AND 
								 authors_has_book.author_type_id = :author_type_id AND
								  authors_has_book.book_id = :book_id');

			$this->db->bind(':author_id',$authorId  );
			$this->db->bind(':author_type_id', $typeAuthorId);
			$this->db->bind(':book_id', $id_book);
				if($this->db->execute()){

				return true;
				}
				return false;
			}
		}
	}
?>