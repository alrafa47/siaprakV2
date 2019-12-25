<?php
	require_once 'model/TahunAjaran/MyModel.php';
	class Mahasiswa{

		public $model;

		function __construct(){
			$this->model = new MyModel();
		}

		public function redirect($location){
			header('location:'.$location);
		}

		public function display_data(){
			$data = $this->model->getData();
			$data_aktif = $this->model->cek_aktifTA();
			include 'view/TahunAjaran/view_data.php';

		}

		public function insert_data(){
			include 'view/TahunAjaran/form_insert.php';
		}

		public function do_insert(){

			if (isset($_POST['simpan'])) {
				$tahunajaran	= $_POST['tahunajaran'];
				$semester	= $_POST['semester'];
				
				$save = $this->model->insert_tahunajaran($tahunajaran,$semester);
				if ($save == true) {
					echo "<script>alert('Data berhasil ditambahkan');location='index.php?lihat=utama/index_TahunAjaran'</script>";
				}else{
					echo "<script>alert('Data gagal ditambah');location='index.php?lihat=utama/index_TahunAjaran'</script>";
				}
			}

		}

		public function delete_data(){

			$id_tahunajaran = $_GET['id_tahunajaran'];
			$this->model->deleteData($id_tahunajaran);
			$this->redirect('index.php?lihat=utama/index_TahunAjaran');

		}

		public function get_update_data(){
			$id_tahunajaran = $_GET['id_tahunajaran'];
			$data = $this->model->getById($id_tahunajaran);
			include 'view/TahunAjaran/form_update.php';
		}

		public function do_update(){

			if (isset($_POST['submit'])) {
				$id_tahunajaran	  = $_POST['id_tahunajaran'];
				$tahunajaran	  = $_POST['tahunajaran'];
				$semester= $_POST['semester'];
				

				$update = $this->model->update_tahunajaran($id_tahunajaran,$tahunajaran,$semester);
				if ($update == true) {
					echo "<script>alert('Data berhasil diupdate');location='index.php?lihat=utama/index_TahunAjaran'</script>";
				}else{
					echo "<script>alert('Data gagal diupdate);location='index.php?lihat=utama/index_TahunAjaran'</script>";
				}
			}
	
		}

		public function aktifkan_tahunajaran(){
			$id_tahunajaran = $_GET['id_tahunajaran'];
			$data = $this->model->aktifkan_tahunajaran($id_tahunajaran);
			$this->redirect('index.php?lihat=utama/index_TahunAjaran');

		}

		public function nonaktif_tahunajaran(){
			$id_tahunajaran = $_GET['id_tahunajaran'];
			$data = $this->model->nonaktif_tahunajaran($id_tahunajaran);
			$this->redirect('index.php?lihat=utama/index_TahunAjaran');
			
		}

	}

 ?>