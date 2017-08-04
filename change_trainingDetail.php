<?php 
include 'connect.php'; 


      $ambil = $_GET['kirim_id']; 
      $train_detail= "SELECT TH_ID, DATE_FORMAT(TH_DATE, '%Y-%m-%dT%H:%i') AS CUSTOM_DATE,  MTC_NAME, TH_EMP_TRAINER, TH_EXT_PARTICIPANTS, nama_karyawan, MTC_CODE
                    	FROM training_hdr, training_dtl, mst_training_code, karyawan
                    	WHERE TH_ID=TD_TH_ID AND TH_TRAIN_CODE=MTC_CODE AND TD_EMPLOYEE_ID=nik AND TH_ID='$ambil' AND TD_STATUS='A'";

            $isitrain_detail= mysqli_query($connect, $train_detail);
            $data_train_detail=mysqli_fetch_assoc($isitrain_detail); 
?>

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
  ?>


<!-- Body -->
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
    
      <div class="col-md-12">
        <div class="well well-sm">
          <form class="form-horizontal" method="POST" action="change_trainingDetail_proses.php" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Form Training</legend>
                <form method="post"> </form>

            <!-- Training date input-->
          <div class="form-group">
              <label for="dtp_input1" class="col-sm-2 control-label">Training Date</label>
              <div class="col-md-9">
                <div class="input-group date form_datetime col-md-5" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" name="train_date" value="<?php echo $data_train_detail['CUSTOM_DATE']?>" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
                    <input type="hidden" id="dtp_input1" value="" />                  
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
                <input type="text" readonly value="<?php echo $data_train_detail["MTC_NAME"]?>">
                <input type=hidden name="update_code" value="<?php echo $data_train_detail["MTC_CODE"]?>"> 
              </div>
            </div>
    
            <!-- Trainer Option Input -->

        <div class="form-group" id="text">
          <label class="col-sm-2 control-label">Trainer</label>
            <div class="col-md-9">
              <input id="trainer" name="update_trainer" type="text" class="auto" value="<?php echo $data_train_detail['TH_EMP_TRAINER']?>">
          </div>
        </div>

        <div class="form-group">
              <label class="col-sm-2 control-label">External Participant</label>
              <div class="col-md-9">
                <input id="external_part" name="update_external" type="number" min="1" style="width:7em" class="form-control" value="<?php echo $data_train_detail['TH_EXT_PARTICIPANTS']?>">
              </div>
            </div>
                                                     
              <div class="table-responsive">
                <table id = "t01">
                  

                  <!-- Untuk Menampilkan data dari tabel karyawan -->
                  <?php 
                  $tabel= "SELECT * FROM karyawan 
                           LEFT JOIN(SELECT TD_TH_ID, TD_EMPLOYEE_ID, TH_ID, TH_DATE, TH_TRAIN_CODE, TH_EMP_TRAINER, TH_EXT_PARTICIPANTS FROM training_dtl, training_hdr
                           WHERE TH_ID=TD_TH_ID AND TD_TH_ID='$ambil') X ON TD_EMPLOYEE_ID=nik
                           WHERE toko='Carrefour Lebak Bulus'
                           ORDER BY nama_karyawan";

                  $isitabel= mysqli_query($connect, $tabel);

                  //nilai awal variabel untuk input
                  $i=1;

                  $total_kolom=4;
                  $kol=1;


                  //untuk membaca dan mengambil data dalam bentuk array
                  while ($data_tabel=mysqli_fetch_assoc($isitabel)) {
                    if($kol==1)                   
                      echo"<tr>";
                  
                        echo "<td><span style=\"font-size:10px\"><input type=\"checkbox\" name=\"update_peserta[]\" value=\"".$data_tabel['nik']."\" ".($data_tabel['TD_EMPLOYEE_ID']?" checked":"").">[".$data_tabel['nik']."] ".$data_tabel['nama_karyawan']."</span></td>";

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
              <div class="col-md-12 text-right">

                <input type="hidden" name="update_td" value="<?php echo $data_train_detail['TH_ID'];?>"> <button type="submit" class="btn btn-primary btn-lg" name="add">Submit</button>

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
