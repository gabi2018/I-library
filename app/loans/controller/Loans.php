<?php
    class Loans extends Controller{
        private $loanModel;
        private $bookModel;
        
        public function __construct(){
            parent::__construct();
            $this->loanModel= $this->model('Loan');
            $this->bookModel=$this->model('Book','books');
        }
        public function index(){

            $loans = $this->loanModel->getLoans();
			$param = [ 'loan' => $loans ];
            $this->view('index',$param);
            
        }

		public function create(){
            $param=[
                'date-current'=>$this->dateTimeServer(),
                'date-finish-loan'=>$this->loanDateTime(),
            ];

            $this->view('create',$param);
        }

        public function search(){
            if(isset($_POST['search'])){
				$param = $_POST['search'];
				$loans = $this->loanModel->getLoanDni($param);
				foreach ($loans as  $loan) {
                  echo " 
								<tr >
								<td>$loan->user_name $loan->user_lastname</td>
								<td>$loan->book_title</td>
								<td>$loan->loan_delivery_date</td>
								<td>$loan->loan_return_date</td>
								<td>$loan->loan_status</td>
								<td>$loan->user_type_desc</td>
                                </tr>
                                ";
					
				}
			}


        }


		public function store(){

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['loan-register'])){
                if(isset($_POST['user_dni']) && isset($_POST['book_id'])&& isset($_POST['datetime_loan'])
                &&isset($_POST['datetime_finish_loan'])) {
                    $loanStatus='en curso';
                    $status_book='4';
                    date_default_timezone_set("America/Argentina/Buenos_Aires");
					$param = [
						'user-dni' 	=> trim($_POST['user_dni']),
						'book-id' => trim($_POST['book_id']),
						'loan-datetime' 	=> trim($_POST['datetime_loan']." ".date('H:i:00')),
                        'loan-finish-datetime'      => trim($_POST['datetime_finish_loan']." ".date('H:i:00')),
                        'loan-status'    => $loanStatus,
						'book-status-id'=>$status_book,
					];
                    
					if($this->loanModel->addLoan($param)){
                         
                        $this->bookModel->updateStatusbook($param);
                       
                       
                        
                      redirect('loans/create');
                        echo"<br>exit NDNDNo<br>";
					}
					else{
						die("FATAL ERROR");
					}
				}
			}
		}	

            
        
        //funcion con la fecha actual del servidor
        public function dateTimeServer(){
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $fecha = date("d-m-Y");
            
            return $fecha;
        }
        //funcion con la fecha programada para 7 dias de devolucion del prestamo
        public function loanDateTime(){
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $fecha = date("d-m-Y");
          $fechaPrestamo7Dias = date("d-m-Y",strtotime($fecha."+ 1 week")); 

            return $fechaPrestamo7Dias;
        }
		public function show(){

        }

		public function edit(){
            $this->view('edit');
        }

		public function Control(){}

        public function delete(){}
        
    }
?>