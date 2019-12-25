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
<body> 

    <div class = "row"> 
        <div class = "col-lg-12">
            <h3 class = "text-primary">Kartu Rencana Studi</h3>
            <hr style = "border-top:1px dotted #000;"/>
            <?php 
            if ($_SESSION['keaktifan'] == "Aktif") {
                ?>
                <a href='index.php?lihat=utama/index_krs&insert=add'class="btn btn-primary btn-sm">
                    <span class = "glyphicon glyphicon-edit"></span> tambah
                </a> 
                <!--  <th colspan="5" align="left"><button><a href='index.php?insert=add'>TAMBAH DATA</a></button></th> -->
                <table class="table table-hover table-bordered" style="margin-top: 10px">
                  <tr class="info" >

                    <td>NO</td>
<!--                     <td>Id Krs</td>
 -->                    <td>NPM</td>
                    <td>Tahun Ajaran</td>
                    <td>Aksi</td>
                </tr>
                <tbody>
                    <?php $i=1?>
                    <?php 
                    if ($data == 0) {?>
                        <tr>
                            <td colspan="5" >TIDAK ADA DATA</td>
                        </tr>
                    <?php }
                    else {
                        foreach ($data as $value){ ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <!-- <td><?php echo $value['idKrs'] ?></td> -->
                                <td><?php echo $value['npm'] ?></td>
                                <td><?php echo $value['tahunAjaran'] ?></td>
                                <td style="text-align: center;">
                                    <a href="index.php?lihat=utama/index_detailkrs&idKrs=<?php echo $value['idKrs']?>" class="btn btn-success btn-sm">
                                        <span class = "glyphicon glyphicon-edit"></span> isi KRs
                                    </a>
                                    <a href="index.php?lihat=utama/index_krs&idKrs=<?php echo $value['idKrs']?>&get=true" class="btn btn-primary btn-sm">
                                        <span class = "glyphicon glyphicon-edit"></span> Edit
                                    </a> 
                                    <a onclick="return confirm('Apakah yakin data akan di hapus?')" a href="index.php?lihat=utama/index_krs&idKrs=<?php echo $value['idKrs']?>&delete=true" class="btn btn-danger btn-sm">
                                        <span class = "glyphicon glyphicon-trash"></span> Hapus
                                    </a>
                                </td>

                            </tr>


                            <?php 
                        }
                    } ?>
                </tbody>
            </table>
            <?php
        }else{
            echo "<h1>Status Anda Non Aktif,Tidak bisa Melakukan Pengisian KRS</h1>";
        }
        ?>  
    </body>
    </html>