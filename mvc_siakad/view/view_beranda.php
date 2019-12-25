<div class="jumbotron">
	<br>
	<br>
	<p align="center"><img src="unikama 1.png" width="90%"></p>
	<br>
	<br>
	<p align="center">
		<b>Haloo,  <?php echo $_SESSION['level']." : ".$_SESSION['username']; ?></b></br>
		<b>Selamat Datang Di Sistem Informasi Akademik </br>
		Universitas Kanjuruhan malang</br>
		<?php 
		if ($data == 0) {
			?>
			Maaf tahun ajaran baru belum aktif
			<?php
		} else {
			foreach ($data as $value) {
				$semester = ($value['semester'] == 0) ? "genap" : "ganjil" ;
				echo "Tahun Ajaran ".$value['tahunajaran']. " Semester ". $semester;
			}
		}
		if ($_SESSION['level'] == "mahasiswa") {
			if ($_SESSION['keaktifan'] == "Tidak Aktif") {
				echo "</br> Status Anda Non-Aktif, Silahkan bayar kemudian Hubungi admin";
			}
		}
		echo "";
		?>

	</b>
</p>

</div>