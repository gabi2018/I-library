<?php
    class Loans extends Controller{
        private $loanModel;
        public function __construct(){
            parent::__construct();
            $this->loanModel= $this->model('Loan');
        }
        public function index(){
            $this->view('index');
        }

		public function create(){
            $param=[
                'date-current'=>$this->loan_date_server(),
            ];

            $this->view('create',$param);
        }

		public function store(){


            
        }
        public function loan_date_server(){
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $fecha = date("d-m-Y");
            
            return $fecha;
        }

		public function show(){}

		public function edit(){
            $this->view('edit');
        }

		public function update(){}

		public function delete(){}
    }
?>