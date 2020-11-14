<?php
	require_once ("config.php");

	$nama=$_POST["nama"];
	$tempat_kalibrasi=$_POST["tempat_kalibrasi"];
	$merk=$_POST["merk"];
	$tanggal=$_POST["tanggal"];
	$nama_alat=$_POST["nama_alat"];
	$seri=$_POST["seri"];
	$T1=$_POST["T1"];
	$T2=$_POST["T2"];
	$T3=$_POST["T3"];
	$T4=$_POST["T4"];
	$T5=$_POST["T5"];
	$T6=$_POST["T6"];

	if ($nama == '' || $tanggal == '' || $tempat_kalibrasi == '' || $nama_alat == '' || $merk == '' || $seri == '') {
		echo	'<script>';
		echo	'document.location = "index.php?error=1";';
		echo	'</script>';
	} else {
		//masukkan data ke database
		mysqli_query ($conn, "INSERT INTO data (nama, tempat_kalibrasi, merk, tanggal, nama_alat, seri, T1, T2, T3, T4, T5, T6) VALUES ('$nama', '$tempat_kalibrasi', '$merk', '$tanggal', '$nama_alat', '$seri', '$T1', '$T2', '$T3', '$T4', '$T5', '$T6') ");
	} 

	mysqli_close($conn);
?>

	<script>
		document.location = "last-input.php";
	</script>
