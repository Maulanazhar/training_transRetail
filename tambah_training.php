<?php
	
	include "connect.php";

	//fungsi menambahkan ke database
	$date = $_POST['train_date'];
	$code = $_POST['train_code'];
	$trainer = $_POST['trainer'];
	$ext_part = $_POST['external_part'];	

	$sql_header = "INSERT INTO training_hdr(TH_DATE, TH_TRAIN_CODE, TH_EMP_TRAINER, TH_EXT_PARTICIPANTS) VALUES('$date', '$code', '$trainer', '$ext_part')"; 
	mysqli_query($connect,$sql_header);
	
	if (mysqli_errno($connect)>0)
		die(mysqli_error($connect));
	
	$id=mysqli_insert_id($connect);

    foreach($_POST["peserta"] as $val)
    {		//perintah SQL
		$sql_detail = "INSERT INTO training_dtl(TD_TH_ID, TD_EMPLOYEE_ID) VALUES('$id', '$val')"; 
		mysqli_query($connect,$sql_detail);
	}
	
		?>
		<script language="javascript">alert("Successful");</script>
			<script>document.location.href='index.php';</script>
	<?php
	
mysqli_close($connect);
?>