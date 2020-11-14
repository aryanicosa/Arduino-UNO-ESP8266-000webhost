<?php
	require 'config.php';

	$result = mysqli_query ($conn, "SELECT * FROM data ORDER BY id DESC LIMIT 1");
	
	$row = mysqli_fetch_assoc($result);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Kalibrasi Sensor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Kalibrasi Sensor - Last Input</h2>
  <p><a href="index.php"><button class="btn btn-info">HOME</button></a></p>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <label for="usr">Nama:</label>
			  <input type="text" class="form-control" id="nama" name="nama" value="<?=$row['nama']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">`Tempat Kalibrasi:</label>
			  <input type="text" class="form-control" id="tempat_kalibrasi" name="tempat_kalibrasi" value="<?=$row['tempat_kalibrasi']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">Merk/Type:</label>
			  <input type="text" class="form-control" id="merk" name="merk" value="<?=$row['merk']; ?>" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			  <label for="usr">Tanggal:</label>
			  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="<?=$row['tanggal']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">Nama Alat:</label>
			  <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="<?=$row['nama_alat']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">Nomor Seri:</label>
			  <input type="text" class="form-control" id="seri" name="seri" value="<?=$row['seri']; ?>" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <label for="usr">T1:</label>
			  <input type="text" class="form-control" id="T1" name="T1" value="<?=$row['T1']; ?>&deg;C" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">T2:</label>
			  <input type="text" class="form-control" id="T2" name="T2" value="<?=$row['T2']; ?>&deg;C" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">T3</label>
			  <input type="text" class="form-control" id="T3" name="T3" value="<?=$row['T3']; ?>&deg;C" readonly>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			  <label for="usr">T4:</label>
			  <input type="text" class="form-control" id="T4" name="T4" value="<?=$row['T4']; ?>&deg;C" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">T5:</label>
			  <input type="text" class="form-control" id="T5" name="T5" value="<?=$row['T5']; ?>&deg;C" readonly>
			</div>
			<div class="form-group">
			  <label for="pwd">T6:</label>
			  <input type="text" class="form-control" id="T6" name="T6" value="<?=$row['T6']; ?>&deg;C" readonly>
			</div>
<!--
			<div class="form-group">
			  <label for="pwd">Last Update:</label>
			  <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?=$row['tanggal']; ?>" readonly>
			</div>
-->
		</div>
	</div>
</div>
