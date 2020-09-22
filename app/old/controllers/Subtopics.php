<?php
    class Subtopics extends Controller{ 
        private $subTopicModel; 

        public function __construct(){ 
            $this->subTopicModel = $this->model('Subtopic');  
        }

        public function index(){
            $subTopic = $this->subTopicModel->getSubtopics();
            $param = ['subtopics' => $subTopic];
            $this->view('subtopics/index',$param);
        }

        public function create(){
            $category = $this->categoryModel->getCategories();
            $param 	  = ['category' => $category ];
            $this->view('subtopics/create',$param);
        }

        public function store(){
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subtopic-register'])){
                if(!empty($_POST['category-name'])&& !empty($_POST['subtopic-name'])){
                    $param = [
                        'subtopic-name-' => trim($_POST['subtopic-name']),
                        'category-name' => trim($_POST['category-name']),
                    ]; 
                    if($this->subTopicModel->addSubtopic($param)){
                        redirect('subtopics/index.php');		
                        echo 'guardado con exito';		
                    }	
                } 
                else{
                    echo 'error';
                }
            }
        }

        public function show($id){ 
            $response = $this->subTopicModel->getSubtopics($id);
            foreach ($response as $key => $value) {
                echo $key. "-" .$value.".";
            } 
        }

    }	
?>