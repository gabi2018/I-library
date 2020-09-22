<?php 
	class Sectors extends Controller{
		private $sectorModel;

		public function __construct(){
			$this->sectorModel = $this->model('Sector');
			 
		}

		public function index(){
			$sectors = $this->sectorModel->getSectors();
			$param = ['sectors' => $sectors];
			$this->view('sectors/index', $param);
		}

		public function create(){ 
			$this->view('sectors/create');
		}

		public function store(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sector-register'])){
				if (isset($_POST['sector-name'])) {
					$param = [
						'sector-name' => trim($_POST['sector-name'])
					];

					if($this->sectorModel->addSector($param)){
						redirect('sectors/index');
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
			$sector = $this->sectorModel->getSector($id);
			$param = [
				'sector' => $sector
			];
			$this->view('sectors/edit', $param);
		}

		public function update(){
			if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['sector-update'])){
				if (isset($_POST['sector-name'])) {
					$param = [
						'sector-id'	  => trim($_POST['sector-id']),
						'sector-name' => trim($_POST['sector-name'])
					];
					
					if($this->sectorModel->editSector($param)){
						redirect('sectors/index');
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