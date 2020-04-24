<?php
    class Book{
        private $db;

		public function __construct(){
			$this->db = new DataBase;
		}
    }