<?php  
	class Books extends Controller{
		private $booksModel;
		private $authorModel;
		private $editorialsModel;
		private $languajesModel;
		private $topicModel;

		public function __construct(){
			$this->$booksModel = $this->model('book');
			$this->$editorialsModel = $this->model('editorial');	 	
			$this->$languajesModel = $this->model('languaje');
			$this->$topicModel = $this->model('topic');	

		}
		public function index(){
			$this->view('books/index');
		}

		public function create(){
			$this->view('books/create');
		}

		public function store(){}

		public function show(){}

		public function edit(){
			$this->view('books/edit');
		}

		public function update(){}

		public function delete(){}
 	}
 ?>