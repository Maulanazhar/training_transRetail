<?php
include "connect.php";
	if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

	$kode_jabatan = $_POST['kode_jabatan'];
	$nama_jabatan = $_POST['nama_jabatan'];

	$result =mysqli_query($connect, "UPDATE master_jabatan SET kode_jabatan ='$kode_jabatan', nama_jabatan='$nama_jabatan'");
	if($result) {
		?>
		<script language="javascript">alert("Informasi Jabatan berhasil diubah");</script>
		<script>document.location.href='jabatan.php';</script>
		<?php
	}
	else  {
		?>
		<script language="javascript">
		alert("Informasi jabatan gagal diubah, silahkan isi dengan benar");</script>
		<script>document.location.href='changejabatan.php';</script>
		<?php
	}
}
?>

