<?php
	class Categories extends Controller{
		private $categoryModel;	

		# Con el metodo contructor, crea la variable category y se le asigna el modelo de la categoria por parametro
		public function __construct(){
			$this->categoryModel = $this->model('Category');

		}

		public function index(){
			$categories = $this->categoryModel->getCategories();
			$param = ['categories' => $categories];
			$this->view('categories/index',$param);
		}

		public function create(){
			$this->view('categories/create');
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['category-register'])){
				if(!empty($_POST['category-name'])){
					$param = ['category-name'=>trim($_POST['category-name'])];

					if ($this->categoryModel->addCategory($param)){
						redirect('categories/index');
					}
					else{
						die('FATAL ERROR');
					}
				}
			}
		}

		public function edit($id){
			$category = $this->categoryModel->getCategory($id); 
			$param = ['category' => $category];
			$this->view('categories/edit', $param);
		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['category-update'])){
				if(isset($_POST['category-name'])){
					$param = [
						'category-id' => trim($_POST['category-id']),
						'category-name' => trim($_POST['category-name'])];
						if ($this->categoryModel->editCategory($param)) {
							redirect('categories/index');
						}
						else{
							die("FATAL ERROR");
						}
				}
			}
		}
		public function delete(){
			
		}
	}
?>