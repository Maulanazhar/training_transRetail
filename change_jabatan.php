<?php  
include "connect.php"; ?> 


      <!-- Bootstrap CSS -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>      
    <title> Edit Rule of Title </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

      <link rel="stylesheet" type="text/css" href="assets/tabel_karyawan.css" media="screen" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <?php include "navbar.php"; ?>

<body id ="test">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
  <div class="row">
    
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" method="POST" action="change_jabatan_proses.php" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Master Rule of Title </legend>

              <?php
            $ambil = $_GET['kirim_id']; 
            $jabatan= "SELECT MTC_CODE, MRT_MTC_CODE, MTC_NAME, MRT_ORDER, MRT_MJ_CODE, MJ_NAME, MRT_ID FROM MST_TRAINING_CODE
                       LEFT JOIN (SELECT MRT_MJ_CODE, MJ_NAME ,MRT_MTC_CODE, MRT_ORDER, MRT_ID FROM mst_rule_title, mst_jabatan
                       WHERE MRT_MJ_CODE= MJ_CODE AND MRT_MJ_CODE='$ambil') X ON MRT_MTC_CODE=MTC_CODE 
                       WHERE MTC_STATUS='A'
                       ORDER BY MTC_CODE";

            $isijabatan= mysqli_query($connect, $jabatan);
            $data_jabatan=mysqli_fetch_assoc($isijabatan);
             ?>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Title Name</label>
                <div class="col-md-9">
                  <input type="text" readonly value="<?php echo $data_jabatan["MJ_NAME"]?>">
                  <input type=hidden name="jabatan" value="<?php echo $data_jabatan["MRT_MJ_CODE"]?>">         
              </div>
            </div>

             <div class="form-group">
            <label class="col-md-3 control-label" for="option">Training</label>
            <div class="col-md-9">                                                      
              <div class="table-responsive">
                <table id = "t01">
                  <!-- Untuk Menampilkan data dari tabel training code -->
                  <?php 
                  //nilai awal variabel untuk input
                  $i=1;

                  //untuk membaca dan mengambil data dalam bentuk array
                  while ($data_jabatan) {
                    
                      echo"<tr>";
                        echo "<td> <input type=\"number\" id=\"O_".$data_jabatan['MTC_CODE']."\" name=\"order[]\" style=\"width: 4em\" min='1' value=\"".$data_jabatan['MRT_ORDER']."\"".($data_jabatan['MRT_MTC_CODE']?" ":"disabled").">";
                        echo "<input type=\"checkbox\" id=\"C_".$data_jabatan['MTC_CODE']."\" name=\"training[]\" value=\"".$data_jabatan['MTC_CODE']."\"".($data_jabatan['MRT_MTC_CODE']?" checked":"")."> [".$data_jabatan['MTC_CODE']."] ".$data_jabatan['MTC_NAME']."</td>";
                      echo "</tr>";
                    ?>

                      <script>
                        document.getElementById("<?php echo "C_".$data_jabatan['MTC_CODE']; ?>").onchange = function() {
                        document.getElementById("<?php echo "O_".$data_jabatan['MTC_CODE']; ?>").disabled = !this.checked;
                        };
                      </script>

                    <?php 
                    $data_jabatan=mysqli_fetch_assoc($isijabatan);
                    $i++;
                  }
                  ?>
                </table>

              </div>
            </div>
          </div>      
        </fieldset>

        <!-- Button Submit -->
            <div class="form-group">
              <div class="col-md-8 text-right">
                <button type="submit" class="btn btn-primary btn-lg"> Submit </button>
              </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
