<?php
    class Loans extends Controller{
        public function __construct(){
            
        }
        public function index(){
            $this->view('loans/index');
        }

		public function create(){
            $this->view('loans/create');
        }

		public function store(){}

		public function show(){}

		public function edit(){
            $this->view('loans/edit');
        }

		public function update(){}

		public function delete(){}
    }
?>