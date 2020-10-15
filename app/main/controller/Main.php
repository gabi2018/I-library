<?php   
	class Main extends Controller{
		

		private $booksModel;
		private $authorModel;
		private $editorialModel;

		public function __construct(){

			parent::__construct();
			$this->booksModel      = $this->model('Book','books');
			$this->authorModel     = $this->model('Author', 'authors');
			$this->editorialModel  = $this->model('Editorial', 'editorials');	 	
		}

		public function index(){
			$this->view('index');
		}

		public function searchGeneral(){
			if(isset($_POST['search-main'])){

				$date=trim($_POST['search-main']);
			$param = [
					"book"=>$this->booksModel->getBooksTitle($date), 
				 "authors"=> $this->authorModel->getAuthorsName($date),
			  "editorials"=> $this->editorialModel->getEditorialName($date),
			 ];
			 

			$this->view('', $param);//NOSE A Q VISTA IRIA DIRIGIDA
			}

		}


	}

?>