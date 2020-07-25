<?php 
	class Users extends Controller{
		private $userModel;
		private $userTypeModel; 
		private $schoolModel;

		public function __construct(){
			$this->userModel = $this->model('User');
			$this->userTypeModel = $this->model('UserType'); 
			$this->schoolModel = $this->model('School');
		}

		public function index(){
			$users = $this->userModel->getUsers();
			$param = [ 'users' => $users ];
			$this->view('users/index', $param);
		}

		public function create(){
			$param = [ 
				'usertypes' => $this->userTypeModel->getUserTypes(),
				'schools'   => $this->schoolModel->getSchools()
			];
			$this->view('users/create', $param);
		}

		public function store(){

			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['user-register'])){
				
				if(isset($_POST['user-pass']) && isset($_POST['user-doc'])) {
				
					$pass    =  password_hash(trim($_POST['user-pass']), PASSWORD_BCRYPT, ['cost' => 12]);
					$param = [
						'user-name' 	=> trim($_POST['user-name']),
						'user-lastname' => trim($_POST['user-lastname']),
						'user-address' 	=> trim($_POST['user-address']),
						'user-dni'      => trim($_POST['user-doc']),
						'user-phone' 	=> trim($_POST['user-phone']),
						'user-email' 	=> trim($_POST['user-email']),
						'user-img'      =>      $_FILES['user-dni'],
						'user-pass' => $pass
						//'user-type' 	=> trim($_POST['user-type'])
					];
                    
					if($this->userModel->addUser($param)){
						redirect('users/index');
					}
					else{
						die("FATAL ERROR");
					}
				 
				}
				
			}
		}

		public function show(){ }

		public function edit($id){
			$users = $this->userModel->getUsers($id);
			$param = [
				'users' => $users
			];
			$this->view('users/edit');
		}

		public function update(){}

		public function delete(){}
	}

?>