<?php
    class Careers extends Controller{ 
        private $careerModel; 

        public function __construct(){ 
            $this->careerModel = $this->model('Career');  
        }

        public function index(){
            $career = $this->careerModel->getCareers();
            $param = ['career' => $career];
            $this->view('careers/index',$param);
        }

        public function create(){
            $career = $this->careerModel->getCareers();
            $param 	  = ['career' => $career ];
            $this->view('careers/create',$param);
        }

        public function store(){
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['career-register'])){
                if(!empty($_POST['career-name'])&& !empty($_POST['career-name'])){
                    $param = [
                        'career-name-' => trim($_POST['career-name']),
                    ]; 
                    if($this->careerModel->addCareer($param)){
                        redirect('careers/index.php');		
                        echo 'guardado ';		
                    }	
                } 
                else{
                    echo 'error';
                }
            }
        }

        public function show($schoolId){ 
            $response = $this->careerModel->getCareers($schoolId);
            foreach ($response as $key => $value) {
                echo $key. "-" .$value.".";
            } 
        }

    }	
?>