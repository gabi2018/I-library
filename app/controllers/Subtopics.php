<?php
class Subtopics extends Controller{
		 
         private $subTopicModel;
         private $categoryModel;
         public function __construct(){
 
            
              $subTopicModel = $this->model('Subtopic');
              $categoryModel = $this->model('Category');
         }
 
         public function index(){
             $subTopic=$this->subTopicModel->getSubtopics();
                 
                 $param=[
                     'subtopics' => $subTopic,
                 ];
                 $this->view('subtopics/index',$param);
         }
 
         public function create(){
             $category=$this->categoryModel->getCategories();
             $param 	   = [ 'category' => $category ];
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
 
         public function show(){}
 
     /*   public function update(){
             if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['subjet-update'])){
                 if(!empty($_POST['subjet-code'])&&!empty($_POST['subjet-name'])){
                     $param = [
                         'subjet-code' => trim($_POST['subjet-code']),
                         'subjet-name' => trim($_POST['subjet-name']),
                     ];
 
                     if ($this->subjetModel->editSubjet($param)) {
                         redirect('subjets/index');
                     }
                     else{
                         die("FATAL ERROR");
                     }
                 }
                 else{
                     echo 'error puto no guardes vacio';
                 }		
             }
         }
 
         public function edit($id){
             $subjet = $this->subjetModel->getSubjet($id); 
             $param  = ['subjet' => $subjet,];
             $this->view('subjets/edit', $param);
         }
 
         public function delete(){ }
         */
     }	
     ?>