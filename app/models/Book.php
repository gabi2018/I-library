<?php
    class Book{
        private $db;

		public function __construct(){
			$this->db = new DataBase;
        }
	
	//por ahora qeda asi esta funcion hhasta q se realice CONSULTAR LIBRO
        public function getBooks(){
			$this->db->query('SELECT * 
							  FROM book
							  ');

			$response = $this->db->getRecords();
			return $response;
		}
        

        public function addBook($param){
			$this->db->query('INSERT INTO book( book_isbn, book_title, book_desc, book_vol, book_year, book_num_pages,book_edition, book_single_copy, languaje_id, editorial_id, category_id,book_code,book_img,book_cantiEje) 
			VALUES(:book_isbn,:book_title, :book_desc, :book_vol, :book_year,:book_num_pages,:book_edition, :book_single_copy, :languaje_id, :editorial_id, :category_id,:book_code,:book_img,:,book_cantiEje)');

			# Link values
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
			$this->db->bind(':book_img', $param['book-title']);
			
			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}
        
    }