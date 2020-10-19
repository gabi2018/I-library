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
			if(isset($_POST['search'])){
					
				$date=[
						   'book'=>trim($_POST['search']),
						   'author'=>trim($_POST['search']),
						   'editorial'=>trim($_POST['search']),
				];

			$param = [
					'book'=>$this->booksModel->getBooksTitle($date), 
				'authors'=> $this->authorModel->getAuthorName($date),
			  'editorials'=> $this->editorialModel->getEditorialName($date),
			 ];
			 

			   foreach ($param as $search ){
				 	foreach($search as $key =>$value) {
						 echo "<li id=$key><span>$value</span></li>";
					 }
				}  
			}

		}


	}

?>