<?php
	
	include "connect.php";

	//fungsi menambahkan ke database
	$jabatan = $_POST['jabatan'];

	foreach($_POST["training"] as $key=>$val)
    {		//perintah SQL
		$sql_training = "INSERT INTO mst_rule_title (MRT_MJ_CODE, MRT_MTC_CODE, MRT_ORDER) VALUES('$jabatan','$val','".$_POST["order"][$key]."')"; 
		mysqli_query($connect,$sql_training);
	}
		?>
		<script language="javascript">alert("Data has been added");</script>
			<script>document.location.href='list_jabatan.php';</script>
	<?php
	
mysqli_close($connect);
?>