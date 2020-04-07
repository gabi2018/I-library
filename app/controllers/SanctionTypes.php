<?php 
	class SanctionTypes extends Controller{
		private $sanctionTypeModel;

		public function __construct(){
			$this->sanctionTypeModel = $this->model('SanctionType');
		}

		public function index(){
			$sanctiontypes = $this->sanctionTypeModel->getSanctionTypes();
			$param = [
				'sanctiontypes' => $sanctiontypes
			];
			$this->view('sanctiontypes/index', $param);
		}

		public function create(){
			$this->view('sanctiontypes/create');
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sanctiontype-register'])){
				if (isset($_POST['sanctiontype-measure'])) {
					$param = [
						'sanctiontype-measure' => trim($_POST['sanctiontype-measure'])
					];

					if($this->sanctionTypeModel->addSanctionType($param)){
						redirect('sanctionTypes/index');
					}
					else{
						die("FATAL ERROR");
					}
				}
			}
		}

		public function show(){
		}

		public function edit($id){ 
			$sanctiontype = $this->sanctionTypeModel->getSanctionType($id);
			$param = [
				'sanctiontype' => $sanctiontype
			];
			$this->view('sanctiontypes/edit', $param);
		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sanctiontype-update'])){
				if (isset($_POST['sanctiontype-measure'])) {
					$param = [
						'sanctiontype-id'	=> trim($_POST['sanctiontype-id']),
						'sanctiontype-measure' => trim($_POST['sanctiontype-measure'])
					];

					if($this->sanctionTypeModel->editSanctionType($param)){
						redirect('sanctionTypes/index');
					}
					else{
						die("FATAL ERROR");
					}
				}
			}
		}

		public function delete(){}
	}
?>