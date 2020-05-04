<?php  
	class Books extends Controller{
		private $booksModel;
		private $authorModel;
		private $editorialsModel;
		private $languajesModel;
		private $categoryModel;

		public function __construct(){
			$this->booksModel = $this->model('Book');
			/*$this->$editorialsModel = $this->model('editorial');	 	
			$this->$languajesModel = $this->model('languaje');
			$this->$topicModel = $this->model('topic');	*/

		}
		public function index(){
			
			$books = $this->booksModel->getBooks();
			$param = [ 'books' => $books ];
			$this->view('books/index', $param);
		}

		public function create(){
			$this->view('books/create');/*
			$author = $this->authorModel->getAuthor();
			$param 	   = [ 'ahutor' => $author ];
			$this->view('authors/create', $param);
			$editorial = $this->editorialsModel->getEditorial();
			$param 	   = [ 'editorials' => $editorial ];
			$this->view('editorials/create', $param);
			$languaje = $this->languajesModel->getLanguajes();
			$param 	   = [ 'languajes' => $languaje ];
			$this->view('languajes/create', $param);
			$category = $this->categoryModel->getCategories();
			$param 	   = [ 'categories' => $category ];
			$this->view('categories/create', $param);*/

		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book-register'])){
				if(isset($_POST['book-title']) && isset($_POST['book-isbn'])&& isset($_POST['book-languaje']) && isset($_POST['category-topic']) && isset($_POST['book-single'])&& isset($_POST['book-editorial'])/*&& isset($_POST['book-code'])&&isset($_POST['book-cata'] */)
				{

					$param = [
						'book-title'=>trim($_POST['book-title']),
						'book-isbn'=>trim($_POST['book-isbn']),
						'book-img'=>trim($_POST['cover-img']),
						'book-pages'=>trim($_POST['book-pages']),
						'book-category'=>trim($_POST['category-topic']),
						'book-single'=>trim($_POST['book-single']),		
						'book-desc'=>trim($_POST['book-desc']),
						'book-editorial'=>trim($_POST['book-editorial']),
						'book-vol'=>trim($_POST['book-vol']),
						'book-edition'=>trim($_POST['book-edition']),
						'book-year'=>trim($_POST['book-year']),
						'book-topo'=>trim($_POST['book-topo']),
						'book-cata'=>trim($_POST['book-cata']),
						'book-languaje'=>trim($_POST['book-languaje']),
						'book-cantiEje'=>trim($_POST['book-cant']),
					];

				
					if($this->booksModel->addBook($param)){
						redirect('books/create');		
						echo '<p>guardado con exito<p>';		
					}	
			
			    else{
					echo"FATAL ERROR";
				}
			}
			echo"error no entro ";

		}		

	}

		public function show(){}

		public function edit(){
			$this->view('books/edit');
		}

		public function update(){}

		public function delete(){}
 	}
 ?>