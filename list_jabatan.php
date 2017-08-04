  <?php  
include "connect.php"; ?> 

<html>
  <head>
    <title> List Jabatan </title>
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
  </head>

<?php include "navbar.php"; ?>

<body>
<br>
<br>
<br>
<br>
<br>
<br>

            <!-- Form Tambah Jabatan -->
            <form action="jabatan.php">
              <div class="col-md-7 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="tambah_training">Add Rule Title</button>
              </div>
            </form>

<br>
<br>
  <!-- Tabel Jabatan -->
  <table class="table-fill">
      <tr>
        <th>No</th>
        <th>Title Name</th>
        <th>Count of Training</th>
        <th>Action</th>
      </tr>
    </thead>

  <tbody class="table-hover">
    <?php

    $jabatan= "SELECT MRT_MJ_CODE, MJ_NAME, COUNT(MRT_MJ_CODE) MRT_COUNT
               FROM mst_jabatan, mst_rule_title
               WHERE MRT_MJ_CODE=MJ_CODE
               GROUP BY MRT_MJ_CODE";

    $isijabatan= mysqli_query($connect, $jabatan);

    //nilai awal variabel untuk input
    $i=1;
    
    //untuk membaca dan mengambil data dalam bentuk array
    while ($data_jabatan=mysqli_fetch_assoc($isijabatan)) {
                    
    echo"<tr>";
    echo "<td><center>".$i."</center></td>";
    echo "<td><center>".$data_jabatan['MJ_NAME']."</center></td>";
    echo "<td><center>".$data_jabatan['MRT_COUNT']."</center></td>";
    echo "<td><center>" ?>

        <!-- Edit Form -->
        <input type="hidden" name="edit_id" value='<?php echo $data_jabatan['MRT_MJ_CODE'];?>'> <i class="material-icons button edit"> <a href="change_jabatan.php?kirim_id=<?php echo $data_jabatan['MRT_MJ_CODE'];?>" name="edit">edit</a></i>

        <input type="hidden" name="remove_id" value='<?php echo $data_jabatan['MRT_MJ_CODE'];?>'> <i class="material-icons button delete"> <a href="delete_jabatan.php?kirim_id=<?php echo $data_jabatan['MRT_MJ_CODE'];?>" name="delete">delete</a></i>

    <?php
    "</center></td>";
    echo "</tr>";
    ?>

    <?php 
      $i++;
    } ?>
    </form>
  </tbody>
</table>