<?php  
	class Books extends Controller{
		private $booksModel;
		private $authorModel;
		private $authorTypeModel;
		private $editorialModel;
		private $languajeModel;
		private $categoryModel;

		public function __construct(){
			parent::__construct();
			$this->booksModel      = $this->model('Book');
			$this->authorModel     = $this->model('Author', 'authors');
			$this->authorTypeModel = $this->model('AuthorType', 'authortypes');
			$this->editorialModel  = $this->model('Editorial', 'editorials');	 	
			$this->languajeModel   = $this->model('Languaje', 'languajes');
			$this->topicModel      = $this->model('Topic', 'topics');	
			$this->categoryModel= $this->model('Category','categories');
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
						'book-single'	 => trim($_POST['book-single']),		
						'book-desc'		 => trim($_POST['book-desc']),
						'book-editorial' => trim($_POST['editorial-id']),
						'book-vol'		 => trim($_POST['book-vol']),
						'book-edition'	 => trim($_POST['book-edition']),
						'book-year'		 => trim($_POST['book-year']),
						'book-topo'		 => trim($_POST['book-topo']),
						'book-languaje'  => trim($_POST['book-languaje']),
						'book-cantiEje'	 => trim($cantidadBook),//me da el for para insertar
						'book-authors'	 => $_POST['author-list'],
						'book-status_id' => $book_status,
						'book-cata'		 => trim($_POST['book-cata']),
					];
															
					if($this->booksModel->addBook($param)){
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
					echo "<div class='card book-list col-2 mr-3 mb-3'>
					<a href='" .URL_ROUTE ."books/read/$book->book_topolographic '><img class='card-img-top' src=' " .URL_ROUTE."media/images/book/$book->book_img'style='width:100%'>
					<p>$book->book_title </p></a><p> $book->author_name</p></div></tr>";
				;}   
			}
		}
	/*	public function editar($topolographic){
			$book = $this->bookModel->getBook($topolographic);
			$param  = ['book' => $book];
			$this->view('edit', $param);
		}
*/
		public function read($topolographic){
			//consultar book
			$books = $this->booksModel->getBook($topolographic);
			$author=$this->authorModel->getAhutoresBook($topolographic);
			$categoryTemaSubtema=$this->categoryModel->getCategoSubteTema($topolographic);
			
			$param=[
				'book'=> $books,
				'author'=> $author,
				'category'=>$categoryTemaSubtema,
				'cantidad-ejemplares'=> $this->booksModel->countBook($books->book_isbn),
				
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
				&& isset($_POST['book-languaje']) && isset($_POST['category-topic'])&&
				isset($_POST['editorial-id'])&& isset($_POST['book-topo']) && isset($_POST['book-cata'])){
					
					$book_status = 1;//disponible
					$cantidadBook=$_POST['book-cantidad'];
				 	if ($cantidadBook == 1){
					   $book_status = 2;//copia unica
					   $cantidadBook=1;
				   }
				   
					$param = [
						'book-id' 	  => trim($_POST['book-id']), 
						'book-title'	 => trim($_POST['book-title']),
						'book-isbn'		 => trim($_POST['book-isbn']),
						'book-img'		 => $_FILES['book-img'],
						'book-pages'	 => trim($_POST['book-pages']),
						'book-category'  => trim($_POST['category-topic']),
					#	'book-single'	 => trim($_POST['book-single']),		
						'book-desc'		 => trim($_POST['book-desc']),
						'book-editorial' => trim($_POST['editorial-id']),
						'book-vol'		 => trim($_POST['book-vol']),
						'book-edition'	 => trim($_POST['book-edition']),
						'book-year'		 => trim($_POST['book-year']),
						'book-topo'		 => trim($_POST['book-topo']),
						'book-languaje'  => trim($_POST['book-languaje']),
						'book-cantiEje'	 => $cantidadBook,//me da el for para actualizar la cantidad de libros
						'book-authors'	 => $_POST['author-list'],
						'book-status_id' => $book_status,
						'book-cata'		 => trim($_POST['book-cata']),
					];
					if($this->booksModel->editBook($param)){
						redirect('books/index');
					}
					else{
						die("FATAL ERROR");
					}
				}
			}


		}

		public function delete(){}
 	}
?>