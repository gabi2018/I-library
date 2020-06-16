<?php
    class Book{
        private $db;

		public function __construct(){
			$this->db = new DataBase;
        }
	
		# getbook($id)
       public function getBook($id){
			$this->db->query('SELECT * 
							  FROM book
							  WHERE book_id=:book_id
							  ');
		$this->db->bind(':book_id', $id);		  

			$response = $this->db->getRecord();
			return $response;
		}
		public function getBooksTitle($title){//esta funcion trae esos poquitos datos 
			// título, autor, edición, volumen y si está disponible.
					$this->db->query('SELECT b.book_title,a.author_name,b.book_edition,b.book_vol,b.book_avalability,b.book_id,b.book_isbn
							  FROM book b ,author a ,authors_has_book au ,author_type aut 
							  WHERE  b.book_title=:book_title
							  AND b.book_id=au.book_id 
							  AND au.author_id=a.author_id 
							  AND aut.author_type_id=au.author_type_id 
							  AND aut.author_type_id=1
							 ORDER BY b.book_title');

					$this->db->bind(':book_title', $title);
					$result = $this->db->getRecords();
					
					
					$response = array(); 
					foreach ($result as $key => $value) {
						if($value->book_avalability==1){
							$avalability='disponible';
						}
						else{
							$avalability=' no disponible';
						}
						$response[$value->book_id] =$value->book_isbn."&nbsp&nbsp&nbsp".$value->book_title ." &nbsp&nbsp;".$value->author_name." &nbsp;  ". $value->book_edition." &nbsp&nbsp;". $value->book_vol."&nbsp; ". $avalability;
					}
				
					
			return $response;

		}
		//crear get bossks por autor
		
		public function getIds($isbn){
			$this->db->query('SELECT  book_id
							  FROM book 
							WHERE book_isbn=:book_isbn; ');
					$this->db->bind(':book_isbn', $isbn);		  

			$response = $this->db->getRecord();
			return $response->book_id;
			
			 
			
		}
        

        public function addBook($param){//for de acuerdo a cantidad de ejemplares  y book
			$this->db->query('INSERT INTO book( book_isbn, book_title, book_desc, book_vol, book_year, book_num_pages,book_edition, book_single_copy, languaje_id, editorial_id, category_id,book_code,book_img,book_cantiEje,book_avalability) 
			VALUES(:book_isbn,:book_title, :book_desc, :book_vol, :book_year,:book_num_pages,:book_edition, :book_single_copy, :languaje_id, :editorial_id, :category_id,:book_code,:book_img,:book_cantiEje,:book_avalabi)');

			$isbn=$param['book-isbn'];
			$autores=$param['book-authors'];
			//book_id con codigo topolografico
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
			$this->db->bind(':book_code', $param['book-cata']);  //este es para el catalografico
			$this->db->bind(':book_cantiEje', $param['book-cantiEje']);//
			$this->db->bind(':languaje_id', $param['book-languaje']);
			$this->db->bind(':book_avalabi', $param['book-avalability']);
				$nameImg='';
				if(isset($param['book-img'])){			
				$nameImg=$param['book-img']['name'];
				$file=$param['book-img']['tmp_name'];

				$rut='../public/media/books/'.$nameImg;

				 copy($file,$rut);
				}

				$this->db->bind(':book_img',$nameImg);
				
					if($this->db->execute()){
						$book_id=$this->getIds($isbn);
							foreach ($autores as $key => $value) {
								$ids          = explode("_", $value);
								$authorId     = $ids[0];
								$typeAuthorId = $ids[1];  
							

							$this->db->query('INSERT INTO authors_has_book(book_id,author_id,author_type_id) VALUES (:book_ids,:author_id,:author_type_id)');
							
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