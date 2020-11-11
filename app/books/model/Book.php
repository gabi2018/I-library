<?php
    class Book{
		private $db;
		

		public function __construct(){
			$this->db = new DataBase;
		
			
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
			WHERE  b.book_title LIKE "%" :book_param"%" 							
			
			AND b.book_status_id	 = bs.book_status_id
						
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
					$book_id = $this->getIds($isbn);
					foreach ($autores as $key => $value) {
						$ids          = explode("_", $value);
						$author_id     = $ids[0];
						$typeAuthorId = $ids[1];   
						$this->addAHB($book_id,$author_id,$typeAuthorId);							
					}
				}
			}
		
			return true;
		}

		
		//editar book
		public function editBook($param){
			$numberCopies = $param['book-cantiEje'];
			if($numberCopies){	$j=0;
			for ($i = 1; $i <= $numberCopies; $i++){ 
			
				$book_id=$j+$param['book-id'];
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
							  category_id=:category_id
							  ,book_status_id=:book_status_id 
							  WHERE book_id = :book_id');

				$isbn 	 = $param['book-isbn'];
				$autores = $param['book-authors'];
				$this->db->bind(':book_topo', $cod_topolographic);				
				$this->db->bind(':book_id', $book_id);
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
				$this->db->bind(':book_status_id', $param['book-status_id']);
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
				$j++;
			}
		return true;
		}
	
	}




	public function countBook($isbn){
		$this->db->query('SELECT  COUNT( :book_isbn ) AS book_cantidad
							FROM book	
							WHERE book_isbn =:book_isbn ');
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

		
}
?>