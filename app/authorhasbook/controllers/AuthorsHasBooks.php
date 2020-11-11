<?php
    class AuthorsHasbooks extends Controller{
		private $autHasBookModel;

		public function __construct(){
			# Se crea el objeto y se lo asigna al modelo
			parent::__construct();
			$this->$autHasBookModel = $this->model('AuthorHasBook'); 


        }



        public  function deleteAutorHasBook($id_book){
            $idAutorTipo=$_POST['delet'];
            $author = $this->$autHasBookModel->deleteAHB($idAutorTipo,$id_book);
            if($author==true){
            echo true ;
            }
            else{
                echo false;
            }

        }
}
?>