<?php 
	
	//koneksi
	require 'config.php';
    
	//baca nilai sensor
	$nilai1 = $_POST["T1"];
	$nilai2 = $_POST["T2"];
	$nilai3 = $_POST["T3"];
	$nilai4 = $_POST["T4"];
	$nilai5 = $_POST["T5"];
	$nilai6 = $_POST["T6"];

	//masukkan database
	mysqli_query ($conn, "INSERT INTO inputdatasensor (T1, T2, T3, T4, T5, T6) VALUES ('$nilai1', '$nilai2', '$nilai3', '$nilai4', '$nilai5', '$nilai6') ");


?>

<!DOCTYPE html>
<html>
<head>
	<title>input ok</title>
</head>
<body>
    <?php
    echo $nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $nilai6;
    ?>
</body>
</html>