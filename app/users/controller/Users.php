<?php 
	class Users extends Controller{
		private $userModel;
		private $userTypeModel; 
		private $schoolModel;

		public function __construct(){
			parent::__construct();
			$this->userModel     = $this->model('User');
			$this->userTypeModel = $this->model('UserType', 'userstypes'); 
			$this->schoolModel   = $this->model('School', 'schools');
		}

		public function index(){
			$users = $this->userModel->getUsers();
			$param = [ 'users' => $users ];

			$this->view('index', $param);
		}

		public function create(){
			$param = [ 
				'usertypes' => $this->userTypeModel->getUserTypes(),
				'schools'   => $this->schoolModel->getSchools()
			];
			$this->view('create', $param);
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['user-register'])){
				if(isset($_POST['user-pass']) && isset($_POST['user-doc'])) {
					$pass  =  password_hash(trim($_POST['user-pass']), PASSWORD_BCRYPT, ['cost' => 12]);
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
				};
		 	
			}
		}	
		
		public function edit($dni){
			$users = $this->userModel->getUser($dni);
			$param = [
				'users' => $users,
			];
			$this->view('edit',$param);

		}
		public function update(){		

			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['user-update'])){
				if (!empty($_POST['user-dni'])&&!empty($_POST['user-phone'])&&!empty($_POST['user-address'])&&!empty($_POST['user-email'])) {
					$param = [
						'user-dni'=>$_POST['user-dni'],
						'user-phone'=>trim($_POST['user-phone']),
						'user-address'=>trim($_POST['user-address']),
						'user-email'=>trim($_POST['user-email']),
						
					];
					if($this->userModel->editUsers($param)){
						redirect('edit');
					}else{
						die('Error locooo');
					}
				}else{
				echo "error";
				}
				//obtiene la informacion del usuario desde el modelo
				
			}	
			
		}
		
		/*Deshactivar un Usuario */
		public function disable($dni){
			
			$this->userModel->disableUser($dni);
			redirect('users/index');
					
		}	
		

		public function delete(){}

		public function verify($email){
			$users = $this->userModel->getByEmail($email);
			$param = [
				'users' => $users
			];
			$this->view('user-email');
		}
		public function show(){ 
			$this->view;
		}
		
		
	}

?>