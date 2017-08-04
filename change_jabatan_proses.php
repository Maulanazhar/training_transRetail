<?php
	
	include "connect.php";

	$id = $_REQUEST['jabatan'];

	$sql_delete= "DELETE FROM mst_rule_title
				  WHERE MRT_MJ_CODE='$id'";

	mysqli_query($connect, $sql_delete);

	foreach($_POST["training"] as $key=>$val){

	$sql_ubah = "INSERT INTO mst_rule_title (MRT_MJ_CODE, MRT_MTC_CODE, MRT_ORDER)
				 VALUES ('$id','$val', '".$_POST["order"][$key]."')"; 
			
	mysqli_query($connect,$sql_ubah);
		}

		?>
		<script language="javascript">alert("Data has been updated");</script>
		<script>document.location.href='list_jabatan.php';</script>
	<?php
	
mysqli_close($connect);
?>