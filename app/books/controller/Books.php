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
					if ($_POST['book-single'] == 1){
						$book_status = 2;//copia unica
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
						'book-cantiEje'	 => trim($_POST['book-cant']),//me da el for para insertar
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
				foreach ($books as $key => $value) {
					echo "<li class='option' id=$key><span>$value</span></li> ";
				}   
			}
		}
		
		public function edit($topolographic){
			$book = $this->bookModel->getBook($topolographic);
			$param  = ['book' => $book];
			$this->view('edit', $param);
			
		}

		public function update(){

			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['book-update'])){
				if(isset($_POST['book-title']) && isset($_POST['book-isbn']) && 
				isset($_POST['book-languaje']) && isset($_POST['category-topic']) && 
				isset($_POST['book-single']) && isset($_POST['editorial-id']) && 
				isset($_POST['book-topo']) && isset($_POST['book-cata'])){
					$param = [
						'book-id' 	  => trim($_POST['book-id']), 
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
						'book-cantiEje'	 => trim($_POST['book-cant']),//me da el for para insertar
						'book-authors'	 => $_POST['author-list'],
						'book-status_id' => $book_status,
						'book-cata'		 => trim($_POST['book-cata']),
					];
					if($this->bookModel->editBook($param)){
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