<?php  

	class User{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}
		
		public function getUsers(){
			$this->db->query('SELECT user.user_dni,
									 user.user_name, 
									 user.user_lastname, 
									 user.user_address, 
									 user.user_phone, 
									 user.user_email, 
									 user_type.user_type_desc 
							  FROM   user, user_type
							  WHERE  user.user_type_id = user_type.user_type_id');

			$response = $this->db->getRecords();
			return $response;
		}

		public function getByEmail($email){
			$email =  $this->db->deleteSpecialChars($email,'email'); 
			$this->db->query('SELECT * FROM  user WHERE user_email = :email');
			$this->db->bind(':email', $email);

			$response = $this->db->getRecord();
			return $response;
		}

		public function addUser($param){

			$this->db->query('INSERT INTO user 
										 (user_dni, user_name, user_lastname, user_address, user_phone, user_email, user_password, user_type_id, user_img) 
							    VALUES  (:user_dni, :user_name, :user_lastname, :user_address, :user_phone, :user_email, :user_password, 1, :user_img)');

			# Link values 
			$this->db->bind(':user_name',     $param['user-name']);
			$this->db->bind(':user_lastname', $param['user-lastname']);
			$this->db->bind(':user_address',  $param['user-address']);
			$this->db->bind(':user_dni',      $param['user-dni']);
			$this->db->bind(':user_phone',    $param['user-phone']);
			$this->db->bind(':user_email',    $param['user-email']);
			$this->db->bind(':user_password', $param['user-pass']); 
			$nameImg='';
				
			if(!empty($param['user-img'])){			
				$nameImg = $param['user-img']['name'];
				$file 	 = $param['user-img']['tmp_name'];
				$rut 	 = '../public/media/partner/'.$nameImg; 
				copy($file,$rut);
			}

			$this->db->bind(':user_img',$nameImg);
			
			# Run
			return $this->db->execute();
		}

		public function userRecord($param){
			$this->db->query('INSERT INTO user (user_nick, user_email, user_password)
							  VALUES (:user_nick, :user_email, :user_password)');

			# Link values
			$this->db->bind(':user_nick',     $param['user-nick']);
			$this->db->bind(':user_email',    $param['user-email']);
			$this->db->bind(':user_password', $param['user-password']);

			# Run
			return $this->db->execute();
		}

		public function editUsers($param){		
			$this->db->query('UPDATE user 
							  SET    user.user_dni      = :user.user_dni, 
									 user.user_name     = :user.user_name, 
									 user.user_lastname = :user.user_lastname,
									 user.user_address  = :user.user_address,
									 user.user_phone    = :user.user_phone,
									 user.user_email    = :user.user_email,
									 user.user_password = :user.user_password,
									 user_type.user_type_desc = :user.user_type_desc
			 				  WHERE  user.user_type_id        = user_type.user_type_id');
			# Link values
			$this->db->bind(':user_name',     $param['user-name']);
			$this->db->bind(':user_lastname', $param['user-lastname']);
			$this->db->bind(':user_address',  $param['user-address']);
			$this->db->bind(':user_dni',      $param['user-doc']);
			$this->db->bind(':user_phone',    $param['user-phone']);
			$this->db->bind(':user_email',    $param['user-email']);
			$this->db->bind(':user_password', $param['user-password']);
			$this->db->bind(':user_type',     $param['user-type']);

			# Run
			return $this->db->execute();
		}
	}
 ?>
