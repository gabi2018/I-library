<?php
    class Book{
		private $db;
		

		public function __construct(){
			$this->db = new DataBase;
		
			
		}
		
		public  function getIdsBooks($isbn){
			$this->db->query('SELECT b.book_id ,b.editorial_id,b.languaje_id,b.book_status_id,b.category_id 
			FROM book b 
			WHERE b.book_isbn=:book_isbn');
			$this->db->bind(':book_isbn', $isbn);		   
			$response = $this->db->getRecords();
			return $response; 


		}
		# getbook($id) todos los datos de book
       public function getBook($id){
			$this->db->query('SELECT * 
							FROM book b ,author a ,authors_has_book au ,author_type aut ,book_status bs,languaje l,editorial e
							WHERE book_topolographic = :book_topolographic
							AND b.book_id = au.book_id 
							AND au.author_id 		 = a.author_id 
							AND aut.author_type_id	 = au.author_type_id 
							AND b.book_status_id	 = bs.book_status_id
							AND b.languaje_id = l.languaje_id 
							AND b.editorial_id	 = e.editorial_id
							
							');
			$this->db->bind(':book_topolographic', $id);		  
			$response = $this->db->getRecord();
			return $response;
		}

		public function getBooksTitle($param){
			//esta funcion trae esos poquitos datos 
			// título, autor, edición, volumen y si está disponible.
			$this->db->query('SELECT b.book_title,bs.book_status_desc ,b.book_topolographic,b.book_isbn,b.book_img,b.book_id
			FROM book b ,book_status bs
			WHERE  b.book_title LIKE "%" :book_param"%"	AND 
			b.book_status_id	 = bs.book_status_id				
			ORDER BY b.book_title');

			$this->db->bind(':book_param', $param['book']);
			$result   = $this->db->getRecords(); 
			$response = array(); 
			$i = 1;	
			foreach ($result as $key => $value) {	
				$pos = substr($value->book_topolographic, -2);
				if($pos == '-1'){					
					$response[$i] = $value;//->book_topolographic."&nbsp&nbsp".$value->book_isbn."&nbsp&nbsp".$value->book_title ." &nbsp&nbsp".$value->author_name." &nbsp;". $value->book_edition." &nbsp&nbsp;". $value->book_vol."&nbsp; ". $value->book_status_desc;
					$i++;
				}
			} 
			return $response; 
		}

		//crear get bossks por autor
		public function getId($isbn){
			$this->db->query('SELECT  Max(book_id) AS book_id FROM book	WHERE book_isbn = :book_isbn LIMIT 1 ');
		$this->db->bind(':book_isbn', $isbn);		   
			$response = $this->db->getRecord();
			return $response->book_id; 	
		}
        

		public function addBook($param,$cantidadInitioBook,$numberCopies){//$cantidadinitiobook me da en que inicial l for
			//for de acuerdo a cantidad de ejemplares  y book
			if ($param){	
						for ($i = $cantidadInitioBook; $i <= $numberCopies; $i++){ 
				$cod_topolographic = $param['book-topo'].'-'.$i;
				$book_status=$param['book-status_id'];
					if(($i==1)&&($book_status==1)){//pone no disponible al primer ejemplar de cada libro 
						$book_status=5;
					}
				
				$this->db->query('INSERT INTO book(book_topolographic, book_isbn, book_title,book_desc, book_vol, book_catalographic, book_year, book_num_pages, book_edition, languaje_id, editorial_id, category_id, book_img, book_status_id) 
				    			  VALUES(:book_topo,:book_isbn,:book_title, :book_desc,:book_vol,:book_cata, :book_year,:book_num_pages,:book_edition,:languaje_id, :editorial_id, :category_id,:book_img,:book_status_id)');

				$isbn 	 = $param['book-isbn'];
				$autores = $param['book-authors'];
				
							
				$this->db->bind(':book_topo', $cod_topolographic);
				$this->db->bind(':book_title', $param['book-title']);
				$this->db->bind(':book_isbn', $param['book-isbn']);
				$this->db->bind(':book_num_pages', $param['book-pages']);
				$this->db->bind(':category_id', $param['book-category']);
				
				$this->db->bind(':book_desc', $param['book-desc']);
				$this->db->bind(':editorial_id', $param['book-editorial']);
				$this->db->bind(':book_vol', $param['book-vol']);
				$this->db->bind(':book_edition', $param['book-edition']);
				$this->db->bind(':book_year', $param['book-year']);
				$this->db->bind(':book_cata', $param['book-cata']);  //este es para el catalografico			
				$this->db->bind(':languaje_id', $param['book-languaje']);
				$this->db->bind(':book_status_id', $book_status);
				$nameImg = '';				
					if($i ==1) {
						if(!empty($param['book-img']['name']) ){																
							$file=	$param['book-img']['tmp_name']	;
							$type=$param['book-img']['type'];
							$ext=explode( '/', $type);
							$nameImg=$isbn.'.'.$ext[1];										
								$rut = 'media/images/book/'.$nameImg;
								copy($file,$rut);								
						}
						else{
								$nameImg='default-cover-book.png';
							}
						$this->db->bind(':book_img', $nameImg);
					}				
						$this->db->bind(':book_img', $nameImg);
						
					if($this->db->execute()){
						$book_id = $this->getId($isbn);
						foreach ($autores as $key => $value) {
						$ids          = explode("_", $value);
						$author_id    = $ids[0];
						$typeAuthorId = $ids[1];   
						echo"".$isbn;
						$this->addAHB($book_id,$author_id,$typeAuthorId);							
						}
					}
				}
				return true;
			}
			
		}

		
		//editar book
		public function editBook($param,$i){
			
			
			
				$book_status=$param['book-status_id'];
				$isbn 	 = $param['book-isbn'];
				$autores = $param['book-authors'];
					if(($i==1)&&( $book_status==1)){//pone no disponible al primer ejemplar de cada libro 
						
						$book_status=5;
					}
				$book_id=$param['book-id'];
				$cod_topolographic = $param['book-topo'];
				$this->db->query('UPDATE book
							  SET   
							   book_topolographic =:book_topo,
							  book_isbn=:book_isbn,
							  book_title=:book_title,
							  book_desc=:book_desc, 
							  book_vol=:book_vol,
							  book_catalographic=:book_cata,
							  book_year=:book_year,
							  book_num_pages=:book_num_pages,
							  book_edition=:book_edition,
							  book_img=:book_img,
							  languaje_id=:languaje_id,
							  editorial_id=:editorial_id,
							  category_id=:category_id,
							  book_status_id=:book_status_id 

							  WHERE book_id = :book_id');

				$this->db->bind(':book_id', $book_id);
				$this->db->bind(':book_topo', $cod_topolographic);				
				
				$this->db->bind(':book_title', $param['book-title']);
				$this->db->bind(':book_isbn', $param['book-isbn']);
				$this->db->bind(':book_num_pages', $param['book-pages']);
				$this->db->bind(':category_id', $param['book-category']);
				$this->db->bind(':book_desc', $param['book-desc']);
				$this->db->bind(':editorial_id', $param['book-editorial']);
				$this->db->bind(':book_vol', $param['book-vol']);
				$this->db->bind(':book_edition', $param['book-edition']);
				$this->db->bind(':book_year', $param['book-year']);				
				$this->db->bind(':languaje_id', $param['book-languaje']);
				$this->db->bind(':book_status_id', $book_status);
				$this->db->bind(':book_cata', $param['book-cata']);  //este es para el catalografico	
				$nameImg = '';				
						if($i ==1) {
								if($param['ext-img-vieja']=='.' ){	
								$file=	$param['book-img']['tmp_name']	;
								$type=$param['book-img']['type'];
								$ext=explode( '/', $type);
								$nameImg=$isbn.'.'.$ext[1];										
									$rut = 'media/images/book/'.$nameImg;
									copy($file,$rut);	
								$this->db->bind(':book_img', $nameImg);						
								}	
								else{					
								$this->db->bind(':book_img', $isbn.$param['ext-img-vieja']);	
								}
							}													
						else{
							$this->db->bind(':book_img','default-cover-book.png');
							}
							
					
					if($this->db->execute()){															
						
						foreach ($autores as $key => $value) {
							$ids          = explode("_", $value);
							$author_id     = $ids[0];
							$typeAuthorId = $ids[1];   
							$exists=$this->exists($book_id,$author_id,$typeAuthorId);
							if($exists!=1){
							$this->addAHB($book_id,$author_id,$typeAuthorId);
							}
						}
					}
				
			
		return true;
		}
	
	



#pensando como hacomo hacer q se vea la disponibilidad
	public function countBookAvailability($isbn,$status){
		$this->db->query('SELECT  COUNT(b.book_isbn) AS book_cantidad,bs.book_status_desc
		FROM book b,book_status bs
		WHERE  b.book_isbn =:book_isbn AND
		b.book_status_id=bs.book_status_id AND
		bs.book_status_desc=:status_desc');
		$this->db->bind(':book_isbn', $isbn);
		$this->db->bind(':status_desc', $status);	   
		$response = $this->db->getRecord();
		return $response; 
	}



	




	public function countBook($isbn){
		$this->db->query('SELECT  COUNT(:book_isbn) AS book_cantidad
							FROM book
							WHERE book_isbn =:book_isbn');
		$this->db->bind(':book_isbn', $isbn);		   
		$response = $this->db->getRecord();
		return $response; 
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

	public function addAHB($book_id,$author_id,$typeAuthorId){

		$this->db->query('INSERT INTO authors_has_book(book_id,author_id,author_type_id)
										  VALUES (:book_id,:author_id,:author_type_id)');
					
						$this->db->bind(':book_id',$book_id);
						$this->db->bind(':author_id',$author_id);
						$this->db->bind(':author_type_id',$typeAuthorId);
						$this->db->execute();					
					


	}

public function deletBook($param){
		$this->db->query('DELETE FROM book 
		WHERE book.book_id = :book_id AND
		book.languaje_id = :book_languaje_id AND
		book.editorial_id = :book_editorial_id AND
		book.category_id = :book_category_id AND
		book.book_status_id = :book_status_id');
		$this->db->bind(':book_id', $param['book_id']);	
		$this->db->bind(':book_languaje_id', $param['languaje_id']);	
		$this->db->bind(':book_editorial_id', $param['editorial_id']);
		$this->db->bind(':book_status_id', $param['book_status_id']);		
		$this->db->bind(':book_category_id',$param['category_id']);
		
		 $this->db->execute();
		return true;
	}




	
}
?>