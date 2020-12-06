<?php
    class AuthorsHasBooks extends Controller{
      private $authorHasBookModel;

      public function __construct(){
        # Se crea el objeto y se lo asigna al modelo
        parent::__construct();
        $this->authorHasBookModel = $this->model('AuthorHasBook'); 
      }
 
      public  function delete($id_book){ 
        $idAutorTipo = $_POST['idtipo']; 
        if($idAutorTipo){
            $author = $this->authorHasBookModel->deleteAHB($idAutorTipo,$id_book); 
            echo $author; 
        }
      }

      public function index(){}

      public function getBooksOfAuthor(){
        $param = [
          "author_id" => $_POST['search']['author_id'],
          "book_char" => $_POST['search']['bookTitle']
        ];
        echo $this->authorHasBookModel->getBooksOfIdAuthor($param);
      }
  }
?>