<!DOCTYPE html>
<html>
<head>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="jquery/jquery.min.js"></script>
    <script src="jquery/bootstrap.min.js"></script>
    <style type="text/css">
      body{
        background-color:  #f0f5f5;
        /*background: transparent;*/
    }
    form, table{
        background-color: white;
        padding:20px;
        border-radius: 5px;

    }
</style>
</head>

<div class = "row"> 
    <div class = "col-lg-12">
        <h3 class = "text-primary">TAHUN AJARAN</h3>
        <hr style = "border-top:1px dotted #000;"/>


        <a href='index.php?lihat=utama/index_TahunAjaran&insert=add'class="btn btn-primary btn-sm">
            <span class = "glyphicon glyphicon-edit"></span> tambah
        </a> 
        <!--  <th colspan="5" align="left"><button><a href='index.php?insert=add'>TAMBAH DATA</a></button></th> -->
        <table class="table table-hover table-bordered" style="margin-top: 10px">
          <tr class="info" >

            <td>NO</td>
            <td>Tahun Ajaran</td>
            <td>Semester</td>
            <td>Status</td>

            <td>Aksi</td>
        </tr>
        <tbody>
            <?php $i=1?>
            <?php 
            if ($data == 0) {?>

                <tr>
                    <td colspan="5"headers="">
                        Tidak Ada Data
                    </td>
                </tr>
                <?php
            }else{
                foreach ($data as $value){ ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $value['tahunajaran'] ?></td>
                        <td><?php echo $sem = ($value['semester'] == 1) ? "ganjil" : "genap" ; ?></td>
                        <td><?php echo $status = ($value['status'] == 1) ? "aktif" : "tidak aktif" ;  ?></td>
                        <td style="text-align: center;">

                            <?php 
                            if ($status == "aktif") {
                                $btn_aktif = "";
                                $disabled = "";

                                ?>

                                <a onclick="return confirm('Apakah Tahun Ajaran ingin di non-aktifkan ?')" a href="index.php?lihat=utama/index_TahunAjaran&id_tahunajaran=<?php echo $value['id_tahunajaran']?>&nonaktif=true" class="btn btn-warning btn-sm">
                                    <span class = "glyphicon glyphicon-remove"></span> Non Aktifkan
                                </a>
                                <?php
                            } else if ($data_aktif == "kosong") {
                             ?>
                             <a onclick="return confirm('Apakah Tahun Ajaran ingin diaktifkan ?')" a href="index.php?lihat=utama/index_TahunAjaran&id_tahunajaran=<?php echo $value['id_tahunajaran']?>&aktifkan=true" class="btn btn-success btn-sm">
                                <span class = "glyphicon glyphicon-ok"></span>aktifkan
                            </a>
                            <?php
                        }else{ ?>
                            <a class="btn btn-default btn-sm">Tidak Aktif
                            </a>
                            
                            <?php
                        }

                        ?>
                        <a href="index.php?lihat=utama/index_TahunAjaran&id_tahunajaran=<?php echo $value['id_tahunajaran']?>&get=true" class="btn btn-primary btn-sm">
                            <span class = "glyphicon glyphicon-edit"></span> Edit
                        </a> 
                        <a onclick="return confirm('Apakah yakin data akan di hapus?')" a href="index.php?lihat=utama/index_TahunAjaran&id_tahunajaran=<?php echo $value['id_tahunajaran']?>&delete=true" class="btn btn-danger btn-sm">
                            <span class = "glyphicon glyphicon-trash"></span> Hapus
                        </a>
                    </td>

                </tr>
            <?php }                 
        } ?>
    </tbody>
</table>
</body>
</html>