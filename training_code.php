<?php  
include "connect.php"; ?> 

<html>
  <head>
    <title> Training Code List </title>
      <!-- Bootstrap CSS -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <!-- CSS and JS -->
      <link rel="stylesheet" type="text/css" href="assets/table.css" media="screen" />
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php include "navbar.php"; ?>


<body>
  <table>
    <thead>
      <tr>
        <th colspan="6">List Training Code</th>
      </tr>

      <tr>
        <th>No</th>
        <th>Training Code</th>
        <th>Nama</th>
        <th>Durasi</th>
        <th>Action</th>
      </tr>
    </thead>

  <tbody>
    <?php 
    $train_code= "SELECT * FROM mst_training_code";
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
        <i class="material-icons button edit">edit</i>
        <i class="material-icons button delete">delete</i>
    <?php
    "</center></td>";
    echo "</tr>";
    ?>

    <?php 
      $i++;
    } ?>
  </tbody>
</table>

</body>

</head>
</html>

<?php include "footer.php"; ?>