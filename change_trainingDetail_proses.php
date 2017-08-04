<?php
	
	include "connect.php";

	//fungsi menambahkan ke database 
	$id = $_REQUEST['update_td'];
	$update_date = $_REQUEST['update_date'];
	$update_code = $_REQUEST['update_code'];
	$update_trainer = $_REQUEST['update_trainer'];
	$update_external = $_REQUEST['update_external'];

	$sql_update = "UPDATE training_hdr
				   SET TH_DATE='$update_date', TH_EMP_TRAINER='$update_trainer', TH_EXT_PARTICIPANTS='$update_external'
				   WHERE TH_ID='$id'";

	mysqli_query($connect,$sql_update);

	$sql_delete= "DELETE FROM training_dtl
				  WHERE TD_TH_ID='$id'";
	
	mysqli_query($connect,$sql_delete);

	    foreach($_POST["update_peserta"] as $val) {		

	    //perintah SQL
		$sql_detail = "INSERT INTO training_dtl(TD_TH_ID, TD_EMPLOYEE_ID)
					   VALUES('$id', '$val')" ; 

		mysqli_query($connect,$sql_detail);
	}
	
		?>
		<script language="javascript">alert("Data has been updated");</script>
		<script>document.location.href='training_detail.php';</script>
	<?php
	
mysqli_close($connect);
?>