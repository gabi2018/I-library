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
			//el metodo request pregunta qe metdo utilizar, si GET O POST
			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
				if(!empty($_POST['author-name']) && !
					empty($_POST['author-lastname'])){
					$param = [
						'author-name' => trim ($_POST['author-name']),
						'author-lastname' => trim ($_POST['author-lastname'])
					];
					
				}
			}
		}
	}



?>