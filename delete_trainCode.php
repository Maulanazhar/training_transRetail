<?php 

include "connect.php";

		$id = $_GET['kirim_id']; 
		$delete = "UPDATE mst_training_code SET MTC_STATUS='D' WHERE MTC_CODE='$id'"; 

		mysqli_query($connect, $delete);

		?>
		<script language="javascript">alert("Data has been Deactivated");</script>
		<script>document.location.href='training_code.php';</script>

	<?php
	
mysqli_close($connect);
?>