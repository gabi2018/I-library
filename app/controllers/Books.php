<?php  
	class Books extends Controller{
		private $booksModel;
		private $editorialsModel;
		private $languajesModel;
		private $topicModel;

		public function __construct(){
			$this->$booksModel = $this->model('book');
			$this->$editorialsModel = $this->model('editorial');	 	
			$this->$languajesModel = $this->model('languaje');
			$this->$topicModel = $this->model('topic');		 
		}
 	}
 ?>