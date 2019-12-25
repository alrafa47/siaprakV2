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
        <h3 class = "text-primary">MATA KULIAH</h3>
        <hr style = "border-top:1px dotted #000;"/>
        <?php if ($_SESSION['level'] == "Admin") { ?>

            <a href='index.php?lihat=utama/index_matkul&insert=add'class="btn btn-primary btn-sm">
                <span class = "glyphicon glyphicon-edit"></span> tambah
            </a> 
        <?php } ?>

        <!--  <th colspan="5" align="left"><button><a href='index.php?insert=add'>TAMBAH DATA</a></button></th> -->
        <table class="table table-hover table-bordered" style="margin-top: 10px">
          <tr class="info" >

            <td>NO</td>
            <td>Id Mk</td>
            <td>Nama Mk</td>
            <td>Tahun Ajaran</td>
            <td>Semester</td>
            <?php if ($_SESSION['level'] == "Admin") { ?>
                <td>Aksi</td>
            <?php } ?>

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
                foreach ($tahunajaran as $value) {
                    $semester = $value['semester'];
                }
                foreach ($data as $value){ 
                    if ($semester == $value['semester']) {

                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $value['idMk'] ?></td>
                            <td><?php echo $value['namaMk'] ?></td>
                            <td><?php echo $value['tahunAjaran'] ?></td>
                            <td>
                                <?php echo $sem = ($value['semester'] == 1) ? "ganjil" : "genap" ; ?>
                            </td>
                            <?php if ($_SESSION['level'] == "Admin") { ?>

                             <td style="text-align: center;">
                                <a href="index.php?lihat=utama/index_matkul&idMk=<?php echo $value['idMk']?>&get=true" class="btn btn-primary btn-sm">
                                    <span class = "glyphicon glyphicon-edit"></span> Edit
                                </a> 
                                <a onclick="return confirm('Apakah yakin data akan di hapus?')" a href="index.php?lihat=utama/index_matkul&idMk=<?php echo $value['idMk']?>&delete=true" class="btn btn-danger btn-sm">
                                    <span class = "glyphicon glyphicon-trash"></span> Hapus
                                </a>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php 
                }
            } 
        }
        ?>
    </tbody>
</table>
</body>
</html>