<?php
	class AuthorTypes extends Controller{
		private $authorType;

		public function __construct(){ 
			parent::__construct();
			$this->authorType = $this->model('AuthorType'); 
		}

		public function index(){ 
			$ahutorTypes=$this->authorType->getAuthorTypes();
			$param = ['authortype' => $ahutorTypes];
			$this->view('index', $param);
		}

		public function create(){ 
		}

		public function store(){ 
		}
		
		public function edit($id){ 
		}

		public function update(){ 
		}

		public function delete(){}	
	}
?>