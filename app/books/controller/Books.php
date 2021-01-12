<?php  
	class Books extends Controller{
		private $booksModel;
		private $authorModel;
		private $authorTypeModel;
		private $editorialModel;
		private $languajeModel;
		private $categoryModel;
		private $autHasBookModel;

		public function __construct(){
			parent::__construct();
			$this->booksModel      = $this->model('Book');
			$this->authorModel     = $this->model('Author', 'authors');
			$this->authorTypeModel = $this->model('AuthorType', 'authortypes');
			$this->editorialModel  = $this->model('Editorial', 'editorials');	 	
			$this->languajeModel   = $this->model('Languaje', 'languajes');
			$this->topicModel      = $this->model('Topic', 'topics');	
			$this->categoryModel= $this->model('Category','categories');
			$this->autHasBookModel = $this->model('AuthorHasBook','authorshasbooks'); 
		}
	
		public function show(){ 
			$this->view('show');
		} 

		public function index(){
			$this->view('index');
		}  

		public function create(){  
			$param = [
				"languajes"   => $this->languajeModel->getLanguajes(), 
				"authors"	  => $this->authorModel->getAuthors(),
				"authortypes" => $this->authorTypeModel->getAuthorTypes(),
				"editorials"  => $this->editorialModel->getEditorials(),
				"topics"	  => $this->topicModel->getTopics()
 			];
			$this->view('create', $param); 
		}

		public function store(){ 
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book-register'])){
				if(isset($_POST['book-title']) && isset($_POST['book-isbn']) && 
				   isset($_POST['book-languaje']) && isset($_POST['category-topic']) && 
				   isset($_POST['book-single']) && isset($_POST['editorial-id']) && 
				   isset($_POST['book-topo']) && isset($_POST['book-cata'])){
						   
					 $book_status = 1;//disponible
					 $cantidadBook=$_POST['book-cant'];
					if ($_POST['book-single'] == 1){
						$book_status = 2;//copia unica
						$cantidadBook=1;
					}
					
				  
					$param = [
						'book-title'	 => trim($_POST['book-title']),
						'book-isbn'		 => trim($_POST['book-isbn']),
						'book-img'		 => $_FILES['book-img'],
						'book-pages'	 => trim($_POST['book-pages']),
						'book-category'  => trim($_POST['category-topic']),
		
						'book-desc'		 => trim($_POST['book-desc']),
						'book-editorial' => trim($_POST['editorial-id']),
						'book-vol'		 => trim($_POST['book-vol']),
						'book-edition'	 => trim($_POST['book-edition']),
						'book-year'		 => trim($_POST['book-year']),
						'book-topo'		 => trim($_POST['book-topo']),
						'book-languaje'  => trim($_POST['book-languaje']),
					
						'book-authors'	 => $_POST['author-list'],
						'book-status_id' => $book_status,
						'book-cata'		 => trim($_POST['book-cata']),
					];
															

					if($this->booksModel->addBook($param,1,$cantidadBook)){
						echo '<p>guardado con exito<p>';	
						redirect('books/index');		
					}	
					else{
						echo"FATAL ERROR";
					}
				}
				echo"error no entro "; 
			}		 
		}

		public function search(){
			if(isset($_POST['search'])){
				$param = ['book' => trim($_POST['search'])];
				$books = $this->booksModel->getBooksTitle($param);

				foreach ($books as $book) {
					echo "<li class='option'><div class='card book-list col-2 mr-3 mb-3'>
					<a href='" .URL_ROUTE ."books/read/$book->book_topolographic '><img class='card-img-top' src=' " .URL_ROUTE."media/images/book/$book->book_img'style='width:100%'>
					<p>$book->book_title </p></a>";
					
					$AHB=$this->autHasBookModel->getAutorTipe($book->book_id);
					foreach ($AHB as $AHBS) {
					
					echo"<p> $AHBS->author_name  $AHBS->author_lastname   </p>";
					}
					echo "<input type='hidden'name ='isbn' value='$book->book_isbn '>";
					echo"</div></li></tr>";
				}
			}
		}
	

		public function read($topolographic){
			//consultar book
			$books = $this->booksModel->getBook($topolographic);
			$author=$this->authorModel->getAhutoresBook($topolographic);
			$categoryTemaSubtema=$this->categoryModel->getCategoSubteTema($topolographic);
			
			$param=[
				'book'=> $books,
				'author'=> $author,
				'category'=>$categoryTemaSubtema,
				'cantidad-ejemplares-disponi'=> $this->booksModel->countBookAvailability($books->book_isbn,'Disponible'),
				'cantidad-ejemplares-noDispo'=>$this->booksModel->countBookAvailability($books->book_isbn,'No disponible'),
				'cantidad-ejemplares-prestados'=>$this->booksModel->countBookAvailability($books->book_isbn,'Prestado'),
				'cantidad-ejemplares-reservados'=>$this->booksModel->countBookAvailability($books->book_isbn,'Reservado'),
				'cantidad-ejemplares-copiaUnica'=>$this->booksModel->countBookAvailability($books->book_isbn,'Copia unica'),							
			];

			$this->view('book',$param);
		}
		public function edit($topolographic){

			$books = $this->booksModel->getBook($topolographic);
			$author=$this->authorModel->getAhutoresBook($topolographic);
			$categoryTemaSubtema=$this->categoryModel->getCategoSubteTema($topolographic);
			
			$param=[
				'book'=> $books,
				'author'=> $author,
				'category'=>$categoryTemaSubtema,
				'languajes'  => $this->languajeModel->getLanguajes(), 
				'authors'	  => $this->authorModel->getAuthors(),
				'authortypes' => $this->authorTypeModel->getAuthorTypes(),
				'editorials'  => $this->editorialModel->getEditorials(),
				'topics'	  => $this->topicModel->getTopics(),
				'cantidad-ejemplares'=> $this->booksModel->countBook($books->book_isbn),
			];

			$this->view('edit', $param);
			

		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['book-update'])){
				if(isset($_POST['book-title']) && isset($_POST['book-isbn'])
					&& isset($_POST['book-languaje']) && isset($_POST['category-topic'])
					&&isset($_POST['editorial-id'])&& isset($_POST['book-topo']) && isset($_POST['book-cata'])){
					
									$isbnViejo=$_POST['book-isbn-viejo'];
									$Ids=$this->booksModel->getIdsBooks($isbnViejo);
									$book_status = 1;//disponible
									$cantidadBook=$_POST['book-cantidad'];
									$cantidadVieja=$_POST['book-cantidad-vieja'];
									if ($cantidadBook == 1){
									$book_status = 2;//copia unica
									$cantidadBook=1;
								}
							
							$i=1;
								foreach ($Ids as $id) {																							
												$param = [
													'book-id' 	  => $id->book_id, 
													'book-title'	 => trim($_POST['book-title']),
													'book-isbn'		 => trim($_POST['book-isbn']),
													'book-img'		 => $_FILES['book-img'],
													'ext-img-vieja'=> trim($_POST['ext-vieja']),
													'book-pages'	 => trim($_POST['book-pages']),
													'book-category'  => trim($_POST['category-topic']),
												
													'book-desc'		 => trim($_POST['book-desc']),
													'book-editorial' => trim($_POST['editorial-id']),
													'book-vol'		 => trim($_POST['book-vol']),
													'book-edition'	 => trim($_POST['book-edition']),
													'book-year'		 => trim($_POST['book-year']),
													'book-topo'		 => trim($_POST['book-topo']).'-'.$i,
													'book-languaje'  => trim($_POST['book-languaje']),
											
													'book-authors'	 => $_POST['author-list'],
													'book-status_id' => $book_status,
													'book-cata'		 => trim($_POST['book-cata']),
												];

												$this->booksModel->editBook($param,$i);
												$i++;
								}
																	 							
							if($cantidadBook>$cantidadVieja){
								$param = [
													'book-title'	 => trim($_POST['book-title']),
													'book-isbn'		 => trim($_POST['book-isbn']),
													'book-img'		 => $_FILES['book-img'],
													'ext-img-vieja'=> trim($_POST['ext-vieja']),
													'book-pages'	 => trim($_POST['book-pages']),
													'book-category'  => trim($_POST['category-topic']),											
													'book-desc'		 => trim($_POST['book-desc']),
													'book-editorial' => trim($_POST['editorial-id']),
													'book-vol'		 => trim($_POST['book-vol']),
													'book-edition'	 => trim($_POST['book-edition']),
													'book-year'		 => trim($_POST['book-year']),
													'book-topo'		 => trim($_POST['book-topo']),
													'book-languaje'  => trim($_POST['book-languaje']),											
													'book-authors'	 => $_POST['author-list'],
													'book-status_id' => $book_status,
													'book-cata'		 => trim($_POST['book-cata']),
												];
								
								$this->booksModel->addBook($param,$cantidadVieja+1,$cantidadBook);																																
							}

							elseif($cantidadBook<$cantidadVieja){
								$Ids=$this->booksModel->getIdsBooks($isbnViejo);
								$cantidadVieja=$cantidadVieja-1;
								for ($i=$cantidadVieja; $i>=$cantidadBook;$i--) {	
									
									$param = [
										'book_id' 	  => $Ids[$i]->book_id, 
										'category_id'  => $Ids[$i]->category_id	,																				
										'editorial_id' => $Ids[$i]->editorial_id,										
										'languaje_id'  => $Ids[$i]->languaje_id,																					
										'book_status_id' =>$Ids[$i]->book_status_id,
										
									];
								$this->booksModel->deletBook($param);
								}
							}


							redirect('books/index');							
				}	

			}									
			
				
		}

//book habilitacion para prestamo
	public function getsStatusBook(){
		if(isset($_POST['book_isbn'])){
			$isbn=$_POST['book_isbn'];
			
			$book_availability=$this->booksModel->countBookAvailability($isbn,'Disponible');
				$quantity=$book_availability->book_cantidad;	
			if($quantity>0){
					echo $quantity;
					$book=$this->booksModel->first_book_availability($isbn);
					echo "<input type=hidden name=book_id value='$book->book_id' >
					<p>topologrphic code $book->book_topolographic<p>";				}
				else{
					echo "no hay libro disponible";
				}
		}

		
	}
		





		public function delete($book_id){
			$book=$this->booksModel->getBook($book_id);
			$param = [
				'book_id' 	  => $book->book_id, 
				'category_id'  => $book->category_id	,																				
				'editorial_id' => $book->editorial_id,										
				'languaje_id'  => $book->languaje_id,																					
				'book_status_id' =>$book->book_status_id,
				
			];
		$this->booksModel->deletBook($param);
		}

		
 	}
?>