<?php 

	class UserTypes extends Controller{
		private $userTypeModel;

		public function __construct(){
			$this->userTypeModel = $this->model('UserType');
		}

		public function index(){
			$usertypes = $this->userTypeModel->getUserTypes();
			$param = [
				'usertypes' => $usertypes
			];
			$this->view('usertypes/index', $param);
		}

		public function create(){
			$this->view('usertypes/create');
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['usertype-register'])){
				if (isset($_POST['usertype-name'])) {
					$param = [
						'usertype-name' => trim($_POST['usertype-name'])
					];

					if($this->userTypeModel->addUserType($param)){
						redirect('userTypes/index');
					}
					else{
						die("FATAL ERROR");
					}
				}
			}
		}

		public function show(){
		}

		public function edit($id){ 
			$usertype = $this->userTypeModel->getUserType($id);
			$param = [
				'usertype' => $usertype
			];
			$this->view('usertypes/edit', $param);
		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['usertype-update'])){
				if (isset($_POST['usertype-name'])) {
					$param = [
						'usertype-id'	=> trim($_POST['usertype-id']),
						'usertype-name' => trim($_POST['usertype-name'])
					];

					if($this->userTypeModel->editUserType($param)){
						redirect('userTypes/index');
					}
					else{
						die("FATAL ERROR");
					}
				}
			}
		}

		public function delete(){}
	}

?>