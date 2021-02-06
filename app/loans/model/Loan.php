<?php 
class Loan{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

        
        public function addLoan($param){
            $this->db->query("INSERT INTO loan (loan_delivery_date, loan_return_date, user_dni, book_id,loan_status) 
                            VALUES (:loan_delivery_date,:loan_return_date,:user_dni,:book_id,:loan_status)");

			$this->db->bind(':book_id', $param['book-id']);
            $this->db->bind(':user_dni', $param['user-dni']);
            $this->db->bind(':loan_delivery_date', $param['loan-datetime']);
            $this->db->bind(':loan_return_date', $param['loan-finish-datetime']);
            $this->db->bind(':loan_status',$param['loan-status']);
			$this->db->execute();
				return 'exito';

        }
        public function getLoans(){
			$this->db->query('SELECT L.loan_id, L.loan_delivery_date, L.loan_return_date, L.loan_status,B.book_title,U.user_name ,U.user_lastname,UT.user_type_desc 
							  FROM   Loan L,user U,Book B, user_type UT
							  WHERE  U.user_dni=L.user_dni
                  AND     B.book_id=L.book_id
                  AND UT.user_type_id=U.user_type_id
                 ORDER BY L.loan_delivery_date desc
                               limit 5');

			$response = $this->db->getRecords();
			return $response;
		}


    public function getLoanDni($dni){
			$this->db->query('SELECT L.loan_id, L.loan_delivery_date, L.loan_return_date, L.loan_status,B.book_title,L.user_dni,U.user_name,ut.user_type_desc,U.user_lastname
      FROM   Loan L,book B,user U, user_type ut
        WHERE L.user_dni LIKE "%" :user_dni"%"
                     and B.book_id=L.book_id
                     and U.user_dni=L.user_dni
                     AND ut.user_type_id=U.user_type_id
                           order by  L.loan_delivery_date desc   ');
                       $this->db->bind(':user_dni', $dni);         

      $response = $this->db->getRecords();
      $result=array();
      $result=$response;
			return $result;
		}



    }
    ?>