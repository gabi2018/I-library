<?php
	class Authors extends Controller{
		private $authorModel;

		public function __construct(){ 
			$this->authorModel = $this->model('Author'); 
		}

		public function index(){ 
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