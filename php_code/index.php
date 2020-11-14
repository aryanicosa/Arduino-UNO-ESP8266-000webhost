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

<script>
$(document).ready(function(){
	$("#nilaiSensor").load('nilaiSensor.php');
	
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd',
		startDate: '0d'
	});
});

</script>

<div class="container">
  <h2>Kalibrasi Sensor - Home</h2>
  <p><a href="last-input.php"><button class="btn btn-info">LAST SUBMIT</button></a> &nbsp;<span class="text-danger"><?php if(isset($_GET['error']) && $_GET['error'] == 1) { echo "input tidak boleh kosong"; } ?></span></p>
  
  <form action="action.php" method="post">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
			  <label for="usr">Nama:</label>
			  <input type="text" class="form-control" id="nama" name="nama">
			</div>
			<div class="form-group">
			  <label for="pwd">Tempat Kalibrasi:</label>
			  <input type="text" class="form-control" id="tempat_kalibrasi" name="tempat_kalibrasi">
			</div>
			<div class="form-group">
			  <label for="pwd">Merk/Type:</label>
			  <input type="text" class="form-control" id="merk" name="merk">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			  <label for="usr">Tanggal:</label>
			  <input type="text" class="form-control datepicker" id="tanggal" name="tanggal">
			</div>
			<div class="form-group">
			  <label for="pwd">Nama Alat:</label>
			  <input type="text" class="form-control" id="nama_alat" name="nama_alat">
			</div>
			<div class="form-group">
			  <label for="pwd">Nomor Seri:</label>
			  <input type="text" class="form-control" id="seri" name="seri">
			</div>
		</div>
	</div>
	
	<div class="row" id="nilaiSensor">
		
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="KIRIM">
			</div>
		</div>
	</div>
  </form>
</div>

</body>
</html>
