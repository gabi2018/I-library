<?php
	class Authors extends Controller{
		private $authorModel;

		public function __construct(){
			# Se crea el objeto y se lo asigna al modelo
			$this->authorModel = $this->model('Author'); 
		}

		public function index(){
			$authors = $this->authorModel->getAuthors();
			$param  = [
				'authors' => $authors
			];
			$this->view('authors/index', $param);
		}

		public function create(){
			//se le pasa por parametro el autor a la vista
			$this->view('authors/create');
		}

		public function store(){ 
			if(!empty($_POST['author_name']) && !empty($_POST['author_lastname'])){
				$param = [
					'author-name'     => trim($_POST['author_name']),
					'author-lastname' => trim($_POST['author_lastname']),			
				];

				$id = $this->authorModel->addAuthor($param);
				if($id != null){ 
					echo $id;		
				}	
			} 
		}
		
		public function edit($id){
			$author = $this->authorModel->getAuthor($id);
			$param  = ['author' => $author];
			$this->view('authors/edit', $param);
		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['author-update'])){
				if(isset($_POST['author-name'])){
					$param = [
						'author-id' => trim($_POST[
							'author-id']), 
						 'author-name' => trim($_POST['author-name']), 
						'author-lastname' => trim($_POST['author-lastname'])
					];
					if($this->authorModel->editAuthor($param)){
						redirect('authors/index');
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