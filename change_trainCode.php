<?php 
include 'connect.php';    
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>      
    <title> Form Edit Training Code </title>
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

    <!-- CSS Halaman -->
    <link rel="stylesheet" type="text/css" href="assets/tabel_karyawan.css" media="screen" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

      <style> .error {color: #ea0e0e;} </style>
  </head>

  <?php include 'navbar.php'; ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<body id ="test">
<div class="container">
  <div class="row">
    
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form method="POST" action="change_trainCode_proses.php">

          <fieldset>
            <legend class="text-center">Form Training Code</legend>
            
            <?php
            $ambil = $_GET['kirim_id']; 
            $train_code= "SELECT * FROM mst_training_code WHERE MTC_CODE='$ambil'";
            $isitrain_code= mysqli_query($connect, $train_code);
            $data_train_code=mysqli_fetch_assoc($isitrain_code); ?>

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Code</label>
              <div class="col-md-9">
                <input id="code" name="code" type="text" readonly="readonly" required class="auto" value="<?php echo $data_train_code['MTC_CODE']?>">                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="train_code">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" class="auto" required value="<?php echo $data_train_code['MTC_NAME']?>">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="train_code">Hours</label>
              <div class="col-md-9">
                <input id="hours" name="hours" type="number" required min="1" style="width: 4em" value="<?php echo $data_train_code['MTC_HOURS']?>">
              </div>
            </div> 



            <div class="form-group">
              <div class="col-md-9 text-right">
                <input type="hidden" name="update_id" value="<?php echo $data_train_code['MTC_CODE'];?>"><button type="submit" class="btn btn-primary btn-lg" name="edit">Edit</button>
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
