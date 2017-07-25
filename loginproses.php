<?php
	
	include 'connect.php';
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$result = mysqli_query($connect, "SELECT * FROM admin WHERE email='$email' and password='$password'");
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	if($row){
		$_SESSION['id'] = $row['nik'];
		?>
			<script> language="javascript"alert("logging Successful")</script>
			<script>document.location.href='index.php';</script>
		<?php
	}
	else{
	?>
			<script> language="javascript"alert("logging Unsuccessful") </script>
			<script> document.location.href='login.php';</script>
	<?php }
		mysqli_close($connect);
?>