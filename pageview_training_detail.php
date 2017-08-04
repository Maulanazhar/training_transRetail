<?php  
include "connect.php"; ?> 

<html>
  <head>
    <title> Training List </title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

      <!-- CSS and JS -->
      <link href="css/detail.css" rel="stylesheet">
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
			<?php
            $id = $_REQUEST['kirim_id'];
            $popup= "SELECT TH_ID, DATE_FORMAT(TH_DATE, '%Y-%m-%d [%H:%i]') AS CUSTOM_DATE, MTC_NAME, TH_EMP_TRAINER, TH_EXT_PARTICIPANTS, CONCAT('[',TD_EMPLOYEE_ID,']',nama_karyawan) karyawan
                     FROM training_hdr, training_dtl, mst_training_code, karyawan
                     WHERE TH_ID=TD_TH_ID AND TH_TRAIN_CODE=MTC_CODE AND TD_EMPLOYEE_ID=nik AND TD_STATUS='A' AND TH_ID='$id'";

                     $isi_popup= mysqli_query($connect, $popup);
                     $data_popup=mysqli_fetch_assoc($isi_popup);
                     ?>

	  <h1>Form Training Detail</h1>
  
  <form action="training_detail.php">
	    <h1><center>Training Detail</center></h1>
	    
    <div class="contentform">

    	<div class="leftcontact">

          <div class="form-group">
              <p>Training Date</p>
              <span class="icon-case"></span>
                <input type="text" readonly value="<?php echo $data_popup["CUSTOM_DATE"]?>"/>
             </div> 

			     <div class="form-group">
			        <p>Training Topic</p>
			        <span class="icon-case"></span>
				        <input type="text" readonly value="<?php echo $data_popup["MTC_NAME"]?>"/>
       			 </div> 

            <div class="form-group">
            	<p>Trainer</p>
            	<span class="icon-case"></i></span>
					<input type="text"  readonly value="<?php echo $data_popup["TH_EMP_TRAINER"]?>"/>
			</div>

			<div class="form-group">
				<p>External Participants</p>	
					<span class="icon-case"></span>
                <input type="text"  readonly value="<?php echo $data_popup["TH_EXT_PARTICIPANTS"]?>"/>
			</div>


		</div>

		<div class="rightcontact">	

			<div class="form-group">
				<p>Internal Participants</p>

					<table>
						<?php
						while($data_popup){

							echo "<tr>";
      						echo "<td><span style=\"font-size:9pt\">".$data_popup['karyawan']."</span></td>";
      						echo "</tr>";
      						
      					$data_popup=mysqli_fetch_assoc($isi_popup);
      					} 
      					
      				?>
					</table>
			</div>	

			
		</div>
	</div>
<button type="submit" class="bouton-contact">Back</button>
	
</form>	

  
</body>
</html>
