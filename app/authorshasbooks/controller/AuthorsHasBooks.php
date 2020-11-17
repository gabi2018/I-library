<?php
    class AuthorsHasBooks extends Controller{
		private $autHasBookModel;

		public function __construct(){
			# Se crea el objeto y se lo asigna al modelo
      parent::__construct();
      
			$this->autHasBookModel = $this->model('AuthorHasBook'); 


    }



        public  function delete($id_book){
            
           $idAutorTipo=$_POST['idtipo'];
       
             if($idAutorTipo){
                  $author = $this->autHasBookModel->deleteAHB($idAutorTipo,$id_book);
                  
                  echo $author;
                
             }
                
             
             
        }

        public function index(){
          echo"adasdasdas";
        }
}
?>