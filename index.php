<?php 
include 'connect.php';  
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>      
    <title> Form Employee Training </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/autocomplete.css" type="text/css" media="screen" charset="utf-8" />

      <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.min.js" type="text/javascript" charset="utf-8"></script>
      <script src="javascript/jquery.fcbkcomplete.js" type="text/javascript" charset="utf-8"></script>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
      <script src="javascript/disable.js"></script>   

      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="assets/home.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="assets/tabel_karyawan.css" media="screen" />
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
<body id ="test">
<div class="container">
  <div class="row">
    
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" method="POST" action="tambah_training.php" enctype="multipart/form-data">
          <fieldset>
            <legend class="text-center">Form Training</legend>
              <p> <span class="error">* Required field. </span></p>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> </form>

            <!-- Training date input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Training Date</label>
              <div class="col-md-9">
                <input id="train_date" name="train_date" type="datetime-local" placeholder="Training Date" class="form-control">
                <span class="error">* <?php echo $train_dateErr;?> </span>
              </div>
            </div>


    
            <!-- Training Code input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="train_code">Training Code</label>
              <div class="col-md-9">
                <input id="train_code" name="train_code" type="text" value='' class="auto">
                <br>
                <span class="error">* <?php echo $train_codeErr; ?> </span>
              </div>
            </div>
    
            <!-- Trainer Option Input -->

        <div class="form-group" id="text">
          <label class="col-md-3 control-label">Trainer</label>
            <div class="col-md-9">
              <input id="trainer" name="trainer" type="text" placeholder="Trainer" > </input>

            <!-- fungsi autocomplete -->
            <script type="text/javascript">
            $(document).ready(function(){                
                $("#select3").fcbkcomplete({
                    json_url: "data.txt",
                    addontab: true,                   
                    maxitems: 10,
                    input_min_size: 0,
                    height: 10,
                    cache: true,
                    newel: true,
                    select_all_text: "select",
                });
            });
            </script>
          </div>
        </div>

        <div class="form-group">
              <label class="col-md-3 control-label">External Participant</label>
              <div class="col-md-9">
                <input id="external_part" name="external_part" type="number" min="1" class="form-control">
              </div>
            </div>

          <div class="form-group">
            <label class="col-md-3 control-label" for="option">Internal Participants</label>
            <div class="col-md-9">                                                      
              <div class="table-responsive">
                <table id = "t01">
                  

                  <!-- Untuk Menampilkan data dari tabel karyawan -->
                  <?php 
                  $tabel= "SELECT nik, nama_karyawan FROM karyawan";
                  $isitabel= mysqli_query($connect, $tabel);

                  //nilai awal variabel untuk input
                  $i=1;

                  //untuk membaca dan mengambil data dalam bentuk array
                  while ($data_tabel=mysqli_fetch_assoc($isitabel)) {
                    
                      echo"<tr>";
                        echo "<td><input type=\"checkbox\" name=\"peserta[]\" value=\"".$data_tabel['nik']."\"> [".$data_tabel['nik']."] ".$data_tabel['nama_karyawan']."</td>";
                      echo "</tr>";
                    ?>

                    <?php 
                    $i++;
                  }
                  ?>
                </table>

              </div>
            </div>
          </div>        
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
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

<?php include 'footer.php'; ?> 