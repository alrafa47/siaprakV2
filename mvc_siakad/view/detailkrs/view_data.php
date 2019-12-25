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
<?php 
    $idkrs = $_GET['idKrs'];
 ?>

<div class = "row"> 
    <div class = "col-lg-12">
        <h3 class = "text-primary">Detail KRS</h3>
        <hr style = "border-top:1px dotted #000;"/>
        <a href="index.php?lihat=utama/index_detailkrs&insert=add&idKrs= <?php echo $idkrs; ?> "class="btn btn-primary btn-sm">
            <span class = "glyphicon glyphicon-edit"></span> tambah
        </a> 
        <table class="table table-hover table-bordered" style="margin-top: 10px">
          <tr class="info" >

            <td>NO</td>
            <td>id Krs</td>
            <td>Mata Kuliah</td>
            <td>uts</td>
            <td>uas</td>
            <td>praktikum</td>
            <td>tugas</td>
            <td>Aksi</td>
        </tr>
        <tbody>
            <?php $i=1?>
            <?php 
            if ($data == 0) {?>
                <tr>
                    <td colspan="8" >TIDAK ADA DATA</td>
                </tr>
            <?php }
            else {
             foreach ($data as $value){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $value['idKrs'] ?></td>
                    <td><?php echo $value['namaMk'] ?></td>
                    <td><?php echo $value['uts'] ?></td>
                    <td><?php echo $value['uas'] ?></td>
                    <td><?php echo $value['praktikum'] ?></td>
                    <td><?php echo $value['tugas'] ?></td>
                    <!-- <td p align="center" bgcolor="#FFFFFF">
                        <a href="index.php?nim=<?php echo $value['npm']?>&get=true">Edit</a>
                       <a href="index.php?nim=<?php echo $value['npm']?>&delete=true">Delete</a>
                   </td> -->
                   <td style="text-align: center;">
                    <a href="index.php?lihat=utama/index_detailkrs&idDetilKrs=<?php echo $value['idDetilKrs']?>&get=true" class="btn btn-primary btn-sm">
                        <span class = "glyphicon glyphicon-edit"></span> Edit
                    </a> 
                    <a onclick="return confirm('Apakah yakin data akan di hapus?')" a href="index.php?lihat=utama/index_detailkrs&idDetilKrs=<?php echo $value['idDetilKrs']?>&idKrs=<?php echo $value['idKrs'] ?>&delete=true" class="btn btn-danger btn-sm">
                        <span class = "glyphicon glyphicon-trash"></span> Hapus
                    </a>
                </td>
            </tr>
            <?php 
        } 
    }?>
</tbody>
</table>
</body>
</html>