<?php  
include "connect.php"; ?> 

<html>
  <head>
    <title> Training Code  </title>

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

      <!-- CSS and JS -->
      <link rel="stylesheet" type="text/css" href="css/table.css" media="screen" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php include "navbar.php"; ?>

<!-- Form Tambah Training Code -->
<body>
<br> <br>
<br> <br>
<br> <br>

            <form action="training_code2.php">
              <div class="col-md-7 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="tambah_training">Add Training Code</button>
              </div>
            </form>
<br>
<br>


  <!-- Tabel Training Code -->
  <table class="table-fill">
    <thead>
      <tr>
        <th><center>No</center></th>
        <th><center>Training Code</center></th>
        <th><center>Training Name</center></th>
        <th><center>Hours</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>


  <tbody class="table-hover">
    <?php

    $train_code= "SELECT * FROM mst_training_code WHERE MTC_STATUS='A'";
    $isitrain_code= mysqli_query($connect, $train_code);

    //nilai awal variabel untuk input
    $i=1;
    
    //untuk membaca dan mengambil data dalam bentuk array
    while ($data_train_code=mysqli_fetch_assoc($isitrain_code)) {
                    
    echo"<tr>";
    echo "<td><center>".$i."</center></td>";
    echo "<td><center>".$data_train_code['MTC_CODE']."</center></td>";
    echo "<td><center>".$data_train_code['MTC_NAME']."</center></td>";
    echo "<td><center>".$data_train_code['MTC_HOURS']."</center></td>";
    echo "<td><center>" ?>

        <!-- Edit Form -->
        <i class="material-icons button edit"><a href="change_trainCode.php?kirim_id=<?php echo $data_train_code['MTC_CODE'];?>" name="edit"> edit</a></i>

        <input type="hidden" name="remove_id" value="<?php echo $data_train_code['MTC_CODE'];?>"> <i class="material-icons button delete" value="<?php echo $data_train_code['MTC_CODE'];?>" > <a href="delete_trainCode.php?kirim_id=<?php echo $data_train_code['MTC_CODE'];?>" name="delete">delete</a></i>

    <?php
    "</center></td>";
    echo "</tr>";
    ?>

    <?php 
      $i++;
    } ?>

    </tbody>
  </form>
</table>
</form>

<br>
<br>
<br>

</body>


</head>
</html>

