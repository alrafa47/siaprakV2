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

	// public function deleteData($id_tahunajaran){
	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("DELETE FROM tahunajaran WHERE id_tahunajaran='$id_tahunajaran'");
	// 	$do_delete = $statement->execute();
	// 	return $do_delete;

	// }

	// public function getById($id_tahunajaran){

	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("SELECT * FROM tahunajaran WHERE id_tahunajaran='$id_tahunajaran'");
	// 	$statement->execute();
	// 	while ($row = $statement->fetch()) {
	// 		$hasil[] = $row;
	// 	}
	// 	return $hasil;

	// }
	// public function insert_tahunajaran($tahunajaran,$semester){

	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("INSERT INTO tahunajaran(tahunajaran,semester) VALUES(?,?)");
	// 	return $statement->execute(array($tahunajaran,$semester));

	// }

	// public function update_tahunajaran($id_tahunajaran,$tahunajaran,$semester){

	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("UPDATE tahunajaran 
	// 		SET tahunajaran='$tahunajaran',semester='$semester' WHERE id_tahunajaran='$id_tahunajaran'");
	// 	return $statement->execute();

	// }

	// public function aktifkan_tahunajaran($id_tahunajaran){
	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("UPDATE `tahunajaran` SET `status` = '1' WHERE `tahunajaran`.`id_tahunajaran` = '$id_tahunajaran' ");
	// 	$aktifkan = $statement->execute();
	// 	return $aktifkan;
	// }
	// public function nonaktif_tahunajaran($id_tahunajaran){
	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("UPDATE `tahunajaran` SET `status` = '0' WHERE `tahunajaran`.`id_tahunajaran` = '$id_tahunajaran' ");
	// 	$aktifkan = $statement->execute();
	// 	return $aktifkan;
	// }
	// public function cek_aktifTA(){
	// 	$koneksi = $this->get_connection();
	// 	$statement = $koneksi->prepare("SELECT * FROM tahunajaran where status=1" );
	// 	$statement->execute();
	// 	while ($row = $statement->fetch()) {
	// 		$hasil[] = $row;
	// 	}
	// 	if (empty($hasil)) {
	// 		return "kosong";
	// 	}else{
	// 		return "ada";
	// 	}
	// }

}
?>