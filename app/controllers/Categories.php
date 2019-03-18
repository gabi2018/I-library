<?php
	
	class Categories extends Controller{
		private $categotyModel;	

		//con el metodo contructor, crea la variable category y se le asigna el modelo de la categoria por parametro

		public function __construct(){

			$this->$categoryModel = $this->model('Category');

		}
		public function index(){
			$Categories=$this->$categoryModel->getCategories();
			$param = ['categories'=>$categories];
			$this->view('categories/index',$param);
		} 
		public function create(){
			$this->view('Categories/create');
		}
		public function store(){
			if($_SERVER['REQUIRE_METHOD'] == "POST" && isset($_POST['categories-register'])){
				if(isset($_POST['category-name'])){
					$param = ['categoty-name'=>trim($_POST['category-name'])];

					if ($this->categoryModel->addCategory($param)){
						redirect('categories/index');
						
					}
				}
			}
		}


	}





?>