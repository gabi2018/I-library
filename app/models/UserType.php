<?php  

	class UserType{
		private $db;

		public function __construct(){
			$this->db = new DataBase;			
		}

		public function getUserType($id){
			$this->db->query('SELECT * FROM user_type WHERE user_type_id = :user_type_id');
			$this->db->bind(':user_type_id', $id);

			$response = $this->db->getRecord();
			return $response;
		}

		public function getUserTypes(){
			$this->db->query('SELECT * FROM  user_type');

			$response = $this->db->getRecords();
			return $response;
		}

		public function addUserType($param){
			$this->db->query('INSERT INTO user_type (user_type_desc) VALUES (:user_type_name)');

			# Link values
			$this->db->bind(':user_type_name', $param['usertype-name']);

			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}

		}

		public function editUserType($param){
			$this->db->query('UPDATE user_type SET user_type_desc = :user_type_name WHERE user_type_id = :user_type_id');

			# Link values
			$this->db->bind(':user_type_id', $param['usertype-id']);
			$this->db->bind(':user_type_name', $param['usertype-name']);

			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}

		}
	}
?>