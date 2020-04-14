<?php
class Subtopic extends Controller{
		 
         private $subTopicModel;
         public function __construct(){
 
            
              
              $subTopicModel = $this->model('Subtopic');
               session_start(); 
         }
 
         public function index(){
             $subjet=$this->subjetModel->getSubjets();
                 
                 $param=[
                     'subjet' => $subjet,
                 ];
                 $this->view('subjets/index',$param);
         }
 
         public function create(){
             $this->view('subjets/create');
         }
 
         public function store(){
             if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['subjet-register'])){
                 if(!empty($_POST['subjet-code'])&& !empty($_POST['subjet-name'])){
                     $param = [
                         'subjet-code' 	=> trim($_POST['subjet-code']),
                         'subjet-name' 	=> trim($_POST['subjet-name']),
                     ];
                 
                     if($this->subjetModel->subjetRecord($param)){
                     redirect('subjets/index.php');		
                         echo 'guardado con exito';		
                     }	
                 }
 
                 else{
                     echo 'error';
                 }
             }
         }
 
         public function show(){}
 
         public function update(){
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
     }	
     ?>