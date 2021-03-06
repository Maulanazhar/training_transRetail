<?php 
include 'connect.php';  
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Training Employee</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href=" css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href=" css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- CSS Halaman -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <style> .error {color: #ea0e0e;} </style>
  </head>


<?php include 'navbar.php';

  //mendefinisikan variabel
  $train_dateErr = $train_codeErr = "";
  $train_date = $train_code = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //train date error message
    if (empty($_POST["train_date"])) {
      $train_dateErr = "Training Date is Required";
    }
    else {
      $train_date = test_input($_POST["train_date"]);
    }

    //train code error message
    if(empty($_POST["train_code"])) {
      $train_codeErr = "Training Code is Required";
    }
    else {
      $train_code = test_input($_POST["train_code"]);
    }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  }

  ?>


<!-- Body -->
<body>
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

    
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="well form-horizontal" method="POST" action="tambah_formProses.php" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Form Training</legend>
               <p> <span class="error">* Required field. </span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> </form>

            <!-- Training date input-->
            <div class="form-group">
              <label for="dtp_input1" class="col-sm-2 control-label">Training Date</label>
              <div class="col-md-9">
                <div class="input-group date form_datetime col-md-5" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" name="train_date" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                    <input type="hidden" id="dtp_input1" value="" />                  
                <span class="error">* <?php echo $train_dateErr;?> </span>
              </div>
            </div>
                    <!--Script Untuk datetime -->
                      <script type="text/javascript">
              $('.form_datetime').datetimepicker({
                  //language:  'id',
                  weekStart: 1,
                  todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 2,
              forceParse: 0,
                  showMeridian: 1
              });
            $('.form_date').datetimepicker({
                  language:  'id',
                  weekStart: 1,
                  todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 2,
              minView: 2,
              forceParse: 0
              });
            $('.form_time').datetimepicker({
                  language:  'id',
                  weekStart: 1,
                  todayBtn:  1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 1,
              minView: 0,
              maxView: 1,
              forceParse: 0
              });
          </script>


            <!-- Training Code Autocomplete input-->
            <div class="form-group">
              <label class="col-sm-2 control-label" for="train_code">Training Code</label>
              <div class="col-md-9">
                  <select name="train_code">
                  <option value=''>Pilih Training Code</option>
                <?php 
                    $train_code = "SELECT * FROM mst_training_code where MTC_STATUS='A'";
                    $sql_train_code= mysqli_query($connect, $train_code);
                    while ($data_sql=mysqli_fetch_assoc($sql_train_code)) {

                    echo "<option value='".$data_sql['MTC_CODE']."'>".$data_sql['MTC_NAME']."</option>";
                   }

                    ?> 
                  </select> 
                <span class="error">* <?php echo $train_codeErr; ?> </span>
              </div>
            </div>
    
            <!-- Trainer Option Input -->

        <div class="form-group" id="text">
          <label class="col-sm-2 control-label">Trainer</label>
            <div class="col-md-9">
              <input id="trainer" name="trainer" type="text" placeholder="Trainer" class="auto" required>
          </div>
        </div>

        <div class="form-group">
              <label class="col-sm-2 control-label">External Participant</label>
              <div class="col-md-9">
                <input id="external_part" name="external_part" type="number" min="1" style="width:7em" class="form-control" required>
              </div>
        </div>

                                                      
                <div class="table-responsive">
                  <table id="t01">
                  

                  <!-- Untuk Menampilkan data dari tabel karyawan -->
                  <?php 
                  $tabel= "SELECT nik, nama_karyawan FROM karyawan ORDER BY nama_karyawan";
                  $isitabel= mysqli_query($connect, $tabel);

                  //nilai awal variabel untuk input
                  $total_kolom=4;
                  $kol=1;


                  //untuk membaca dan mengambil data dalam bentuk array
                  while ($data_tabel=mysqli_fetch_assoc($isitabel)) {
                    if($kol==1)                   
                      echo"<tr>";
                        
                        echo "<td><span style=\"font-size:8pt\"><input type=\"checkbox\" name=\"peserta[]\" value=\"".$data_tabel['nik']."\">[".$data_tabel['nik']."] ".$data_tabel['nama_karyawan']."</span></td>";
                        
                    if($kol%$total_kolom==0){
                      echo "</tr>"; 
                      $kol=0;
                    }
                    $kol++;
    
                    ?>

                    <?php 
                  }
                  ?>
                </table>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-10 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="add">Submit</button>
              </div>
            </div>

          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>
