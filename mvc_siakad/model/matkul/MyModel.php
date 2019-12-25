<?php 
class MyModel{

	private $conn = null;

	public function get_connection(){
		if (!is_null($this->conn)) {
			return $this->conn;
		}
		$this->conn = false;
		try {
			$this->conn = new PDO('mysql:host=localhost;dbname=demosiakad', 'root', '');
		} catch(PDOException $e) { 
			echo $e->getMessage();
		}

		return $this->conn;
	}

	public function getData(){

		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("SELECT * FROM mk");
		$statement->execute();
		while ($row = $statement->fetch()) {
			$hasil[] = $row;
		}

		return $hasil;

	}

	public function deleteData($idMk){
		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("DELETE FROM mk WHERE idMk='$idMk'");
		$do_delete = $statement->execute();
		return $do_delete;

	}

	public function getById($idMk){

		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("SELECT * FROM mk WHERE idMk='$idMk'");
		$statement->execute();
		while ($row = $statement->fetch()) {
			$hasil[] = $row;
		}
		return $hasil;

	}
	public function insert_mk($namaMk,$tahunAjaran, $semester){

		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("INSERT INTO mk(namaMk,tahunAjaran, semester) VALUES(?,?,?)");
		return $statement->execute(array($namaMk,$tahunAjaran, $semester));

	}

	public function update_mk($idMk,$namaMk,$tahunAjaran, $semester){

		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("UPDATE mk 
			SET namaMk='$namaMk',tahunAjaran='$tahunAjaran', semester ='$semester' WHERE idMk='$idMk'");
		return $statement->execute();

	}

	public function data_tahunajaran(){
		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("SELECT * FROM tahunajaran where status = 1");
		$statement->execute();
		while ($row = $statement->fetch()) {
			$hasil[] = $row;
		}
		if (empty($hasil)) {
			return 0;
		}else{
			return $hasil;
		}
	}


}
?>