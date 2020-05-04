<?
class Subtopics{
		private $db;
		
		public function __construct(){
			$this->db = new DataBase;
		}
		
		public function getSubtopics(){
			$this->db->query('SELECT s.subtopic_name,c.category_name
							  FROM subtopic s JOIN category c ON c.category_id = s.category_id
							   ORDER BY s.subtopic_name DESC  ');

			$response = $this->db->getRecords();
			return $response;
		}

		


	/*	public function userRecord($param){
			$this->db->query('INSERT INTO user (user_nick, user_email, user_password)
							  VALUES (:user_nick, :user_email, :user_password)');

			# Link values
			$this->db->bind(':user_nick', $param['user-nick']);
			$this->db->bind(':user_email', $param['user-email']);
			$this->db->bind(':user_password', $param['user-password']);

			# Run
			if($this->db->execute()){
				return true;
			}
			else{
				return false;
			}
		}*/
	}
 ?>