<?php
	
	include "connect.php";

	//fungsi menambahkan ke database
	$id = $_REQUEST['update_id'];
	$update_name = $_POST['name'];
	$update_hours = $_POST['hours'];

	$sql_ubah = "UPDATE mst_training_code 
				 SET MTC_NAME ='$update_name', MTC_HOURS= '$update_hours'
				 WHERE MTC_CODE='$id'"; 
				
	mysqli_query($connect,$sql_ubah);
	
	if (mysqli_errno($connect)>0)
		die(mysqli_error($connect));
	
		?>
		<script language="javascript">alert("Successful");</script>
		<script>document.location.href='training_code.php';</script>
	<?php
	
mysqli_close($connect);
?>