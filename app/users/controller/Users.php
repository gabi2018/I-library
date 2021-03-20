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
						'user-img'      => $_FILES['user-dni'],
						'user-pass'     => $pass,
						'user-type-id' 	=> trim($_POST['user-type'])
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
		
		public function edit($dni){
			$users = $this->userModel->getUser($dni);
			$param = ['users' => $users];
			$this->view('edit',$param);
		}

		public function update(){		
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['user-update'])){
				if (isset($_POST['user-name'])&& isset($_POST['user-lastname'])&&
					isset($_POST['user-phone'])&&isset($_POST['user-address'])&&
					isset($_POST['user-email'])) {
					$param = [
						'user-name'     => trim($_POST['user-name']),
						'user-lastname' => trim($_POST['user-lastname']),
						'user-phone'    => trim($_POST['user-phone']),
						'user-address'	=> trim($_POST['user-address']),
						'user-email'	=> trim($_POST['user-email']),
						'user-img'		=> trim($_POST['user-img'])
					];
					if($this->userModel->editUsers($param)){
						redirect('users/index');
					}else{
						die('Error locooo');
					}
				}
				else{
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
		
		// Funcion verifica que el email, sea unico y no se repita
		public function verify($email){
			$users = $this->userModel->getByEmail($email);
			$param = ['users' => $users];
			$this->view('user-email');
		}

		public function show(){ 
			//$this->view;
		}

		public function import(){
			$this->view('import');
		}

		public function search(){
			if(isset($_POST['search'])){
				$param = ['user' => trim($_POST['search'])];
				$users = $this->userModel->getUsersSearch($param);
				foreach($users as $user){
					echo "
						<div class='media list mt-2 col-12'>
							<img class='mr-3' src='" .URL_ROUTE. "media/images/partner/$user->user_img' alt='Foto_Socio' style='width: 100px'>
							<div class='media-body'>
								<div class='row'>
									<div class='col-10 icons-users'>
										<h5 class='mt-0'><a href=''>$user->user_name $user->user_lastname</a></h5>
										<p><span class='material-icons'>location_on</span>$user->user_address</p>
										<p><span class='material-icons'>phone</span>$user->user_phone</p>
										<p><span class='material-icons'>mail</span>$user->user_email</p>
									</div>
									<div class='col-2'>
										<span class='material-icons'><a href='". URL_ROUTE. "'users/edit/$user->user_dni' class='text-info'>edit</a></span>
										<span class='material-icons'><a href='". URL_ROUTE. "'users/disable/$user->user_dni' class='text-danger'>";
					echo($user->user_defaulter)?'close':'check'; 
					echo 				"</a></span>
									</div>
								</div> 
							</div> 
						</div>
					";
				}
			}
		}
		
		public function read($dni){
			$users = $this->userModel->getUser($dni);
			$param = ['user' => $users];
			$this->view('user', $param);

		}

		//FUnCION QUE BUSCA POR DNI AL USUARIO PARA PRESTAMO
		public functIon searchUserDni(){
			if(isset($_POST['search'])){
				$param = $_POST['search'];
				$users = $this->userModel->searchGetUser($param);
				
				foreach ($users as $user) {
					
					echo "<li class='option'><div class='card book-list col-2 mr-3 mb-3'>
					<img class='mr-1' src=' " .URL_ROUTE."media/images/partner/$user->user_img' alt ='Foto_Socio' style='width:100%'></div>";
					
					echo "<div class='col-6 mb-3 mr-3 '>";
					echo"<p>$user->user_name $user->user_lastname </p>";
					echo"<p>DNI: $user->user_dni</p>";
					if($user->user_defaulter==1){
						echo"<font color='red'>Socio con  morosidad</font>";
					}
					

					if($user->user_status==1){
						echo"<p><font color='red'>Socio desabilitado </font></p>";
					}
					else{
					echo"<p>habilitado</p>";
					}
					
					echo"</div>
					<input type='hidden' name='user_dni' value='$user->user_dni'>
 					     </li>";
				}

 
			}



		}
 
	}
?>