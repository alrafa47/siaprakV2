<?php
require_once 'model/login/MyModel_login.php';
class Mahasiswa{
	public $model;

	function __construct(){
		$this->model = new MyModel();
	}

	public function redirect($location){
		header('location:'.$location);
	}

	public function display_data(){
		include 'view/view_login.php';
	}
	public function login(){
		$data = $this->model->login();
		echo $data;
	}

}

?>