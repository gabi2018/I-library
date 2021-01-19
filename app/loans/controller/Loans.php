<?php
    class Loans extends Controller{
        public function __construct(){
            parent::__construct();
        }
        public function index(){
            $this->view('index');
        }

		public function create(){
            $this->view('create');
        }

		public function store(){


            
        }
        public function loan_date_server(){
            


        }

		public function show(){}

		public function edit(){
            $this->view('edit');
        }

		public function update(){}

		public function delete(){}
    }
?>