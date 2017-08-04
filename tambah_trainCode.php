<?php
	
	include "connect.php";

	//fungsi menambahkan ke database
	$code = $_POST['code'];
	$name = $_POST['name'];
	$hours = $_POST['hours'];

	$sql_trainingCode = "INSERT INTO mst_training_code(MTC_CODE, MTC_NAME, MTC_HOURS) VALUES('$code', '$name', '$hours')"; 
	mysqli_query($connect,$sql_trainingCode);
	
	if (mysqli_errno($connect)>0)
		die(mysqli_error($connect));
	
		?>
		<script language="javascript">alert("Successful");</script>
			 <script>document.location.href='training_code.php';</script>
	<?php
	
mysqli_close($connect);
?>