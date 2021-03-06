<?php  
include "connect.php"; ?> 


      <!-- Bootstrap CSS -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>      
    <title> Master Rule of Title </title>
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
          <form class="form-horizontal" method="POST" action="tambah_jabatan.php" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Master Rule of Title </legend>
            
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Title Name</label>
                <div class="col-md-9">
                  <select name="jabatan" required>
                  <option value=''>Pilih Jabatan</option>
                <?php 
                    $tambah_jabatan = "SELECT * FROM mst_jabatan";
                    $sql_tambah_jabatan= mysqli_query($connect, $tambah_jabatan);
                    while ($data_sql=mysqli_fetch_assoc($sql_tambah_jabatan)) {

                    echo "<option value='".$data_sql['MJ_CODE']."'>".$data_sql['MJ_NAME']."</option>";
                   }

                    ?> 
                  </select>         
              </div>
            </div>

             <div class="form-group">
            <label class="col-md-3 control-label" for="option">Training</label>
            <div class="col-md-9">                                                      
              <div class="table-responsive">
                <table id = "t01">
                  

                  <!-- Untuk Menampilkan data dari tabel training code -->
                  <?php 
                  $code= "SELECT MTC_CODE, MTC_NAME, MTC_STATUS FROM mst_training_code WHERE MTC_STATUS='A' ORDER BY MTC_CODE";
                  $isicode= mysqli_query($connect, $code);

                  //nilai awal variabel untuk input
                  $i=1;

                  //untuk membaca dan mengambil data dalam bentuk array
                  while ($data_code=mysqli_fetch_assoc($isicode)) {
                    
                      echo"<tr>";
                        echo "<td> <input type=\"number\" id=\"".$data_code['MTC_CODE']."\" disabled name=\"order[]\" style=\"width: 4em\" min='1' required> <input type=\"checkbox\" id=\"".$data_code['MTC_NAME']."\" name=\"training[]\" required value=\"".$data_code['MTC_CODE']."\"> ".$data_code['MTC_NAME']."</td>";
                      echo "</tr>";
                    ?>

                      <script>
                        document.getElementById("<?php echo $data_code['MTC_NAME']; ?>").onchange = function() {
                        document.getElementById("<?php echo $data_code['MTC_CODE']; ?>").disabled = !this.checked;
                    };
                      </script>

                    <?php 
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
                <button type="submit" class="btn btn-primary btn-lg" name="tambah_code">Submit</button>
              </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
