<?php 
class Loan{
		private $db;

		public function __construct(){
			$this->db = new DataBase;
		}

        
        public function addLoan($param){
            $this->db->query("INSERT INTO loan (loan_delivery_date, loan_return_date, user_dni, book_id) 
                            VALUES (:loan_delivery_date,:loan_return_date,:user_dni,:book_id)");

			$this->db->bind(':book_id', $param['book_id']);
            $this->db->bind(':user_id', $param['user_id']);
            $this->db->bind(':loan_delivery_date', $param['fecha_creacion ']);
            $this->db->bind(':loan_return_date', $param['fecha_devolucion']);

			$this->db->execute();
				return 'exito';

        }
    }
    ?>