<?php 

include "connect.php";

		$id = $_GET['kirim_id']; 
		$delete = "UPDATE training_dtl SET TD_STATUS='D' WHERE TD_TH_ID='$id'"; 

		mysqli_query($connect, $delete);

		?>
		<script language="javascript">alert("Data has been Deactivated");</script>
		<script>document.location.href='training_detail.php';</script>

	<?php
	
mysqli_close($connect);
?>