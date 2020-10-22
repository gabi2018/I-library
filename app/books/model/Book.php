<?php
    class Book{
        private $db;

		public function __construct(){
			$this->db = new DataBase;
        }
	
		# getbook($id)
       public function getBook($id){
			$this->db->query('SELECT * FROM book WHERE book_topolographic = :book_topolographic');
			$this->db->bind(':book_topolographic', $id);		  
			$response = $this->db->getRecord();
			return $response;
		}

		public function getBooksTitle($param){
			//esta funcion trae esos poquitos datos 
			// título, autor, edición, volumen y si está disponible.
			$this->db->query('SELECT b.book_title,a.author_name,b.book_edition,b.book_vol,bs.book_status_desc ,b.book_topolographic,b.book_isbn
							FROM book b ,author a ,authors_has_book au ,author_type aut ,book_status bs
							WHERE  b.book_title LIKE "%" :book_param "%" 							
							AND b.book_id = au.book_id 
							AND au.author_id 		 = a.author_id 
							AND aut.author_type_id	 = au.author_type_id 
							AND b.book_status_id	 = bs.book_status_id
							ORDER BY b.book_title');

			$this->db->bind(':book_param', $param['book']);
			$result   = $this->db->getRecords(); 
			$response = array(); 
			$i = 1;	
			foreach ($result as $key => $value) {	
				$pos = substr($value->book_topolographic, -2);
				if($pos == '-1'){					
					$response[$i] = $value->book_topolographic."&nbsp&nbsp".$value->book_isbn."&nbsp&nbsp".$value->book_title ." &nbsp&nbsp".$value->author_name." &nbsp;". $value->book_edition." &nbsp&nbsp;". $value->book_vol."&nbsp; ". $value->book_status_desc;
					$i++;
				}
			} 
			return $response; 
		}

		//crear get bossks por autor
		public function getIds($isbn){
			$this->db->query('SELECT  Max(book_id) AS book_id FROM book	WHERE book_isbn = :book_isbn LIMIT 1 ');
			$this->db->bind(':book_isbn', $isbn);		   
			$response = $this->db->getRecord();
			return $response->book_id; 
		}
        

		public function addBook($param){
			//for de acuerdo a cantidad de ejemplares  y book
			$numberCopies = $param['book-cantiEje'];
			for ($i = 1; $i <= $numberCopies; $i++){ 
				$cod_topolographic = $param['book-topo'].'-'.$i;
				
				$this->db->query('INSERT INTO book(book_topolographic, book_isbn, book_title,book_desc, book_vol, book_catalographic, book_year, book_num_pages, book_edition, book_single_copy, languaje_id, editorial_id, category_id, book_img, book_status_id) 
				    			  VALUES(:book_topo,:book_isbn,:book_title, :book_desc,:book_vol,:book_cata, :book_year,:book_num_pages,:book_edition, :book_single_copy, :languaje_id, :editorial_id, :category_id,:book_img,:book_status_id)');

				$isbn 	 = $param['book-isbn'];
				$autores = $param['book-authors'];
				
				//book_id con codigo topolografico 			
				$this->db->bind(':book_topo', $cod_topolographic);
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
				$this->db->bind(':book_cata', $param['book-cata']);  //este es para el catalografico			
				$this->db->bind(':languaje_id', $param['book-languaje']);
				$this->db->bind(':book_status_id', $param['book-status_id']);
				$nameImg = '';
				
				if(empty($param['book-img']) && ($i < 2)){			
					$nameImg = $param['book-img']['name'];
					$file 	 = $param['book-img']['tmp_name']; 
					$rut 	 = '../public/media/books/'.$nameImg;
				 	copy($file,$rut);
				}

				$this->db->bind(':book_img', $nameImg);
				if($this->db->execute()){
					$book_id = $this->getIds($isbn);
					foreach ($autores as $key => $value) {
						$ids          = explode("_", $value);
						$authorId     = $ids[0];
						$typeAuthorId = $ids[1];   
						$this->db->query('INSERT INTO authors_has_book(book_id,author_id,author_type_id)
										  VALUES (:book_id,:author_id,:author_type_id)');
					
						$this->db->bind(':book_id',$book_id);
						$this->db->bind(':author_id',$authorId);
						$this->db->bind(':author_type_id',$typeAuthorId);
						$this->db->execute();							
					}
				}
			}
			return true;
		}

		//crear get bossks por autor
		
}
?>