<?php
	class Authors extends Controller{
		private $authorModel;

		public function __construct(){
			//se crea el objeto y se lo asigna al modelo
			$this->authorModel = $this->model('Author');
			session_start();
		}
		public function create(){
			//se le pasa por parametro el autor a la vista
			$this->view('authors/create');
		}

		public function store(){
			//el metodo request pregunta qe metodo utilizar, si GET O POST
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
				if(!empty($_POST['author-name']) && !
					empty($_POST['author-lastname'])){
					$param = [
						'author-name' => trim ($_POST['author-name']),
						'author-lastname' => trim ($_POST['author-lastname'])
					];
					if($this->authorModel->authorModel($param) ){
						redirect('authors/index.php');
						echo 'Guardado cob exito';
					}
					else{
						echo'error';
					}
				}
			}
		}
		public function index(){
			$author = $this->authorModel->getAuthors();
			$param  = ['author' => $author,];
			$this->view('authors/index', $param);
		}

		public function edit($id){
			$author = $this->authorModel->getAuthor($id);
			$param  = ['author' => $author,];
			$this->view('authors/edit', $param);

		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['author-update'])){
				if(!empty($_POST['author-id']) && !empty($_POST['author-name']) && !empty($_POST['author-lastname'])){
					$param = [
						'author-id' => trim($_POST['author-id']), 
						'author-name' => trim($_POST['author-name']), 
						'author-lastname' => trim($_POST['author-lastname']),
					];
					if($this->authorModel->authorModel($param)){
						redirect('authors/index');
					}
					else{
						die("FATAL ERROR");
					}
				}
				else{
					echo'Error guardo vacio';
				}
			}
		}	
	}
?>