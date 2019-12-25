<?php
$login = new login();
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
			$this->conn = new PDO('mysql:host=localhost;dbname=demosiakad', 'root', '');
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
					$_SESSION['id'] = $value['npm'];
					$_SESSION['username'] = $value['nama'];
					$_SESSION['status'] = "login";
					$_SESSION['level'] = "mahasiswa";
					$_SESSION['keaktifan'] = $value['status'];
				}
				header("location:index.php?lihat=utama/index_beranda");
			}
		}else{
			foreach ($loginKaryawan as $value) {
				$_SESSION['id'] = $value['id_karyawan'];
				$_SESSION['username'] = $value['nama'];
				$_SESSION['status'] = "login";
				$_SESSION['level'] = $value['privilege'];
				$_SESSION['keaktifan'] = "Aktif";

			}
			header("location:index.php?lihat=utama/index_beranda");

		}

	}

	public function login_mhs($npm, $pass){
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