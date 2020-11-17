<?php  
	class AuthorHasBook{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}


        public function addAHB($book_id,$author_id,$typeAuthorId){

            $this->db->query('INSERT INTO authors_has_book(book_id,author_id,author_type_id)
											  VALUES (:book_id,:author_id,:author_type_id)');
						
							$this->db->bind(':book_id',$book_id);
							$this->db->bind(':author_id',$author_id);
							$this->db->bind(':author_type_id',$typeAuthorId);
							$this->db->execute();					
						


        }

        public function exists($book_id,$author_id,$typeAuthorId){

			$this->db->query('SELECT true as valor
								from authors_has_book
								WHERE author_id= :author_id AND
									author_type_id=:author_type_id AND
									book_id=:book_id');

			$this->db->bind(':book_id',$book_id);
			$this->db->bind(':author_id',$author_id);
			$this->db->bind(':author_type_id',$typeAuthorId);		

				$value = $this->db->getRecord();					

            return $value->valor;
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
       public function getAutorTipe($book_id){
		$this->db->query("SELECT *
							FROM author a, author_type au, authors_has_book ab
							WHERE  ab.book_id=:book_id
							AND ab.author_id = a.author_id 		
							AND ab.author_type_id= au.author_type_id
							and au.author_type_identifier='narrador' ");
				$this->db->bind(':book_id', $book_id);
				$value = $this->db->getRecords();	


		return $value;


	   }


}
?>