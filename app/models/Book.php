<?php
    class Book{
        private $db;

		public function __construct(){
			$this->db = new DataBase;
        }
	
		# Por ahora qeda asi esta funcion hhasta q se realice CONSULTAR LIBRO
        public function getBooks(){
			$this->db->query('SELECT * 
							  FROM book
							  ');

			$response = $this->db->getRecord();
			return $response;
		}
		public function getIds($isbn){
			$this->db->query('SELECT  book_id
							  FROM book 
							WHERE book_isbn=:book_isbn; ');
					$this->db->bind(':book_isbn', $isbn);		  

			$response = $this->db->getRecord();
			return $response->book_id;
			
			 
			
		}
        

        public function addBook($param){
			$this->db->query('INSERT INTO book( book_isbn, book_title, book_desc, book_vol, book_year, book_num_pages,book_edition, book_single_copy, languaje_id, editorial_id, category_id,book_code,book_img,book_cantiEje) 
			VALUES(:book_isbn,:book_title, :book_desc, :book_vol, :book_year,:book_num_pages,:book_edition, :book_single_copy, :languaje_id, :editorial_id, :category_id,:book_code,:book_img,:book_cantiEje)');

			$isbn=$param['book-isbn'];
			$autores=$param['book-authors'];
			$this->db->bind(':book_title', $param['book-title']);
			$this->db->bind(':book_isbn', $param['book-isbn']);
			$this->db->bind(':book_num_pages', $param['book-pages']);
			$this->db->bind(':category_id', $param['book-category']);
			$this->db->bind(':book_single_copy', $param['book-single']);
			$this->db->bind(':book_desc', $param['book-desc']);
			$this->db->bind(':editorial_id', $param['book-editorial']);
			$this->db->bind(':book_vol', $param['book-vol']);
			$this->db->bind(':book_edition', $param['book-edition']);
			$this->db->bind(':book_year', $param['book-year']);
			  $this->db->bind(':book_code', $param['book-topo']);  
			  $this->db->bind(':book_cantiEje', $param['book-cantiEje']);
			$this->db->bind(':languaje_id', $param['book-languaje']);
			//consultar como guradar el nombre de la imagen eje. "ttiulolibro"
		
			 $nombreImg=$param['book-img']['name'];
			 $file=$param['book-img']['tmp_name'];

			$rut=  URL_ROUTE .'public/media/books/'.$nombreImg;
			move_uploaded_file($file,$rut);
			$this->db->bind(':book_img',$rut );
			if($this->db->execute()){
				$book_id=$this->getIds($isbn);
				foreach ($autores as $key => $value) {
					$ids          = explode("_", $value);
					$authorId     = $ids[0];
					$typeAuthorId = $ids[1];  
				
				$this->db->query('INSERT INTO authors_has_book ( book_id,author_id, author_type_id) VALUES (:book_ids,:author_id,:author_type_id)');
				
				$this->db->bind(':book_ids',$book_id);
				$this->db->bind(':author_id',$authorId);
				$this->db->bind(':author_type_id',$typeAuthorId);
				$this->db->execute();
				
				}
				
				return true;
				}
			
			else{
				return false;
			}
		}
        
    }