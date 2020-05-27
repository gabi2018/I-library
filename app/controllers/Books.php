<?php  
	class Books extends Controller{
		private $booksModel;
		private $authorModel;
		private $authorTypeModel;
		private $editorialModel;
		private $languajeModel;
		private $categoryModel;

		public function __construct(){
			$this->booksModel      = $this->model('Book');
			$this->authorModel     = $this->model("Author");
			$this->authorTypeModel = $this->model("AuthorType");
			$this->editorialModel  = $this->model('Editorial');	 	
			$this->languajeModel   = $this->model('Languaje');
			$this->topicModel      = $this->model('Topic');	

		}
		public function index(){
			$books = $this->booksModel->getBooks();
			$param = [ 'books' => $books ];
			$this->view('books/index', $param);
		}  

		public function create(){  
			$param = [
				 "languajes"  => $this->languajeModel->getLanguajes(), 
				 "authors"	  => $this->authorModel->getAuthors(),
				 "authortypes" => $this->authorTypeModel->getAuthorTypes(),
				 "editorials" => $this->editorialModel->getEditorials(),
				 "topics"	  => $this->topicModel->getTopics()
 			];
			$this->view('books/create', $param);/*
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
			/* De esta forma se accede a la lista de autores y tipos de autores enviados de la vista. 
				Ya esta listo para enviarse al model. Hay un error en la base de datos para guardar esto!!!!
				foreach ($_POST["author-list"] as $key => $value) {
					$ids          = explode("_", $value);
					$authorId     = $ids[0];
					$typeAuthorId = $ids[1];  
				}	
			 */
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book-register'])){
				if(isset($_POST['book-title']) && isset($_POST['book-isbn'])&& 
				   isset($_POST['book-languaje']) && isset($_POST['category-topic']) && 
				   isset($_POST['book-single']) && isset($_POST['book-editorial'])/*&& 
				   isset($_POST['book-topo'])&&isset($_POST['book-cata'])*/){
				   				   
				  
					$param = [
						'book-title'=>trim($_POST['book-title']),
						'book-isbn'=>trim($_POST['book-isbn']),
						'book-img'=>$_FILES['book-img'],
						'book-pages'=>trim($_POST['book-pages']),
						'book-category'=>trim($_POST['category-topic']),
						'book-single'=>trim($_POST['book-single']),		
						'book-desc'=>trim($_POST['book-desc']),
						'book-editorial'=>trim($_POST['book-editorial']),
						'book-vol'=>trim($_POST['book-vol']),
						'book-edition'=>trim($_POST['book-edition']),
						'book-year'=>trim($_POST['book-year']),
						'book-topo'=>trim($_POST['book-topo']),
						'book-languaje'=>trim($_POST['book-languaje']),
						'book-cantiEje'=>trim($_POST['book-cant']),
						'book-authors'=>$_POST['author-list'],
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