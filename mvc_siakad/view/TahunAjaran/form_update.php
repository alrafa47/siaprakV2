<!DOCTYPE html>
<html>
<head>
</head>
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="jquery/jquery.min.js"></script>
<script src="jquery/bootstrap.min.js"></script>
</head>
<body>
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

</body>
<div class = "row"> 
  <div class = "col-lg-12">
    <h2><p align="center">EDIT DATA</p></h2>
    <hr style = "border-top:1px dotted #000;"/>

    <div class = "row"> 
      <div class = "col-lg-4"></div>
      <div class = "row"> 
        <div class = "col-lg-4">
          <form method="post" action="index.php?lihat=utama/index_TahunAjaran&update=true">
            <div class="form-group">

              <?php foreach ($data as $value) {?>
                <input type="hidden" name="id_tahunajaran" value="<?php echo $value['id_tahunajaran'] ?>" class="form-control" readonly> 
              </div>
              <div class="form-group">
                <label>Tahun Ajaran</label>
                <input type="text" name="tahunajaran" value="<?php echo $value['tahunajaran'] ?>" class="form-control" >
              </div>
              <div class="form-group">
                <label>Semester</label><br>
                <?php 
                if ($value['semester'] == 1) {
                  $ganjil = "checked";
                  $genap = "";
                } else {
                  $ganjil = "";
                  $genap = "checked";

                }

                ?>
                <input type="radio" name="semester" value="1" <?= $ganjil?>><label>ganjil</label>
                <input type="radio" name="semester" value="0" <?= $genap?>><label>genap</label>
              </div>

            <?php } ?>

            <div class = "form-group">
              <button name = "submit" value="EDIT" id="edit" class = "btn btn-success">
                <span class = "glyphicon glyphicon-floppy-disk"></span> 
                EDIT
              </button>
            </div>
          </form>
        </div><!-- .col-lg-6 -->
        <div class = "col-lg-3"></div>
      </div><!-- .row -->

   <!--  <input type="submit" name="submit" value="EDIT" id="edit">
  </tr>
  </table>
</div> -->
</body>
</html>