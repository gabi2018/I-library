<?php 
	class AuthorType{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
        }

        public function getAuthorTypes(){
            $this->db->query('SELECT * FROM author_type');
			$result = $this->db->getRecords(); 
			$response = array(); 
			foreach ($result as $key => $value) {
				$response[$value->author_type_id] = $value->author_type_identifier;
			}
			return $response;
        }
    }
?>