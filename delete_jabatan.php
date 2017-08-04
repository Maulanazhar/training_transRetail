<?php
	
	include "connect.php";

	//fungsi menambahkan ke database
	$delete = $_REQUEST['kirim_id'];


	$sql_delete= "DELETE FROM mst_rule_title
				  WHERE MRT_MJ_CODE='$delete'";

	mysqli_query($connect,$sql_delete);
	
	if (mysqli_errno($connect)>0)
		die(mysqli_error($connect));

		?>
		<script language="javascript">alert("Data has been removed");</script>
		<script>document.location.href='list_jabatan.php';</script>
	<?php
	
mysqli_close($connect);
?>