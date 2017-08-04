<?php 
include 'connect.php';  
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Form Edit Training Code</title>
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
<br>

<body id ="test">
<div class="container">
  <div class="row">
    
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">

          <fieldset>
            <legend class="text-center">Form Training Code</legend>
              <form class="form-horizontal" method="POST" action="tambah_trainCode.php" enctype="multipart/form-data">

            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Code</label>
              <div class="col-md-9">
                <input id="code" name="code" type="text" class="auto" required>                
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="train_code">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" class="auto" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label" for="train_code">Hours</label>
              <div class="col-md-9">
                <input id="hours" name="hours" type="number" min="1" class="auto" required>
              </div>
            </div> 



            <div class="form-group">
              <div class="col-md-7 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="edit">Add</button>
              </div>
            </div>

            </fieldset>
      </div>
    </div>
  </div>
</div>       

</body>

</html>    
