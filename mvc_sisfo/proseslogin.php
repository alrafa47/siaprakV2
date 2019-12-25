<?php

$login = new login();
/**
 * 
 */


class login
{
	public $username = "";
	public $password = "";


	private $conn = null;

	public function get_connection(){
		if (!is_null($this->conn)) {
			return $this->conn;
		}
		$this->conn = false;
		try {
			$this->conn = new PDO('mysql:host=localhost;dbname=sisprak', 'root', '');
		} catch(PDOException $e) { 
			echo $e->getMessage();
		}

		return $this->conn;
	}

	function __construct()
	{
		session_start();
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];
		$loginMhs = $this->login_mhs($this->username, $this->password);
		$loginKaryawan = $this->login_karyawan($this->username, $this->password);
		if ($loginKaryawan == 0 || empty($loginKaryawan)) {
			if ($loginMhs == 0 || empty($loginMhs)) {
				header("location:login.php?msg=1");
			}else{
				foreach ($loginMhs as $value) {
					$_SESSION['username'] = $value['nama'];
					$_SESSION['status'] = "login";
					$_SESSION['level'] = "mahasiswa";
				}
				header("location:index.php?lihat=utama/index_beranda");
			}
		}else{
			foreach ($loginKaryawan as $value) {
				$_SESSION['username'] = $value['nama'];
				$_SESSION['status'] = "login";
				$_SESSION['level'] = $value['privilege'];
			}
			header("location:index.php?lihat=utama/index_beranda");

		}

	}

	public function login_asprak(){
		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("SELECT * from mahasiswa where npm = ? AND password = ?");
		$statement->execute(array($npm ,$pass));
		while ($row = $statement->fetch()) {
			$hasil[] = $row;
		}
		if (empty($hasil)) {
			$hasil=0;
		}
		return $hasil;
	}

	public function login_mhs($npm, $pass){
		$url = "http://localhost/SIAPRAK/siakad/api/service.php?username=".$username."&password=".$password; 

			// mengirim GET request ke sistem A dan membaca respon XML dari sistem A
		$bacaxml = simplexml_load_file($url);

			// membaca data XML hasil dari respon sistem A
		foreach($bacaxml->response as $respon)
		{
  			// jika responnya TRUE maka login sukses
  			// jika FALSE maka login gagal
			if ($respon == "TRUE"){
				echo "Login Sukses";

				$_SESSION['username'] = $username;
				$_SESSION['status'] = "login";
				header("location:index.php");

			}
			else if ($respon == "FALSE"){
				header("location:login.php?msg=1");

			}
		}
	}

	public function login_karyawan($username, $pass){
		$koneksi = $this->get_connection();
		$statement = $koneksi->prepare("SELECT * from karyawan where username = ? AND password = ?");
		$statement->execute(array($username ,$pass));
		while ($row = $statement->fetch()) {
			$hasil[] = $row;
		}
		if (empty($hasil)) {
			$hasil=0;
		}
		return $hasil;

	}

}












?>