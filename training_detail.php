<?php  
include "connect.php"; ?> 

<html>
  <head>
    <title> Training List </title>
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
      <link href="css/table.css" rel="stylesheet">
      <link href="css/modal.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
      <script type="text/javascript" src="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
      <link rel="stylesheet" type="text/css" href="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />

<?php include "navbar.php"; ?>


<body>
<br>
<br>
<br>
<br>
<br>
<br>

           <form action="index.php">
              <div class="col-md-7 text-right">
                <button type="submit" class="btn btn-primary btn-lg" name="tambah_training">Add Training</button>
              </div>
            </form>

<br>
<br>

<form method="POST" action="change_trainingDetail_request.php">

  <table class="table-fill">

      <tr>
        <th><center>No</center></th>
        <th><center>Training Date</center></th>
        <th><center>Training Topic</center></th>
        <th><center>Trainer</center></th>
        <th><center>External Participants</center></th>
        <th><center>Internal Participants</center></th>
        <th><center>Action</center></th>
      </tr>

  <tbody class="table-hover">
    <?php 
    $train_detail= "SELECT TH_ID, TH_DATE,  MTC_NAME, TH_EMP_TRAINER, TH_EXT_PARTICIPANTS, COUNT(TD_EMPLOYEE_ID) TH_INT_PARTICIPANTS, nama_karyawan
                    FROM training_hdr, training_dtl, mst_training_code, karyawan
                    WHERE TH_ID=TD_TH_ID AND TH_TRAIN_CODE=MTC_CODE AND TD_EMPLOYEE_ID=nik AND TD_STATUS='A'
                    GROUP BY TH_DATE,  TH_TRAIN_CODE, TH_EMP_TRAINER";

    $isitrain_detail= mysqli_query($connect, $train_detail);

    //nilai awal variabel untuk input
    $i=1;
    
    //untuk membaca dan mengambil data dalam bentuk array
    while ($data_train_detail=mysqli_fetch_assoc($isitrain_detail)) {
                    
    echo"<tr>";
    echo "<td><center>".$i."</center></td>";
    echo "<td><center>".$data_train_detail['TH_DATE']."</center></td>";
    echo "<td><center>".$data_train_detail['MTC_NAME']."</center></td>";
    echo "<td><center>".$data_train_detail['TH_EMP_TRAINER']."</center></td>";
    echo "<td><center>".$data_train_detail['TH_EXT_PARTICIPANTS']."</center></td>";
    echo "<td><center>".$data_train_detail['TH_INT_PARTICIPANTS']."</center></td>";
    echo "<td><center>" ?>

        <i class="material-icons button edit" id="myBtn"><a href="pageview_training_detail.php?kirim_id=<?php echo $data_train_detail['TH_ID']; ?>">pageview</a></i>

        <input type="hidden" name="update_id"> <i class="material-icons button edit" value="<?php echo $data_train_detail['TH_ID'];?>"> <a href="change_trainingDetail.php?kirim_id=<?php echo $data_train_detail['TH_ID'];?>" name="edit"> edit</a></i>

        <input type="hidden" name="remove_id"> <i class="material-icons button delete" value="<?php echo $data_train_detail['TH_ID'];?>" > <a href="delete_trainDetail.php?kirim_id=<?php echo $data_train_detail['TH_ID'];?>" name="delete">delete</a></i>
    <?php
    "</center></td>";
    echo "</tr>";
    ?>


    <!-- The Modal Popup -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Training Detail</h2>
    </div>
    <div class="modal-body">
      <!-- SQL untuk Popup -->
          <?php
            $id = $_REQUEST['kirim_id'];
            $popup= "SELECT TH_ID, TH_DATE,  MTC_NAME, TH_EMP_TRAINER, TH_EXT_PARTICIPANTS, CONCAT('[',TD_EMPLOYEE_ID,']',nama_karyawan) karyawan
                     FROM training_hdr, training_dtl, mst_training_code, karyawan
                     WHERE TH_ID=TD_TH_ID AND TH_TRAIN_CODE=MTC_CODE AND TD_EMPLOYEE_ID=nik AND TD_STATUS='A' AND TH_ID='$id'";

                     $isi_popup= mysqli_query($connect, $popup);
                     while($data_popup=mysqli_fetch_assoc($isi_popup)){
            
      echo "<p>".$data_popup['MTC_NAME']."</p>";
      echo "<p>".$data_popup['TH_EMP_TRAINER']."</p>";
      echo "<p>".$data_popup['TH_EXT_PARTICIPANTS']."</p>";

      while($data_popup=mysqli_fetch_assoc($isi_popup)){
      echo "<p>".$data_popup['karyawan']."</p>"; }
      } ?>
      
    </div>
  </div>

</div>

<!-- Script Popup -->
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    <?php 
      $i++;
    } ?>
  </tbody>
</table>

</body>

</head>
</html>
