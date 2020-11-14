<?php
	require 'config.php';

	$result=mysqli_query($conn, "SELECT * FROM inputdatasensor ORDER BY id DESC LIMIT 1");
	
	$row = mysqli_fetch_assoc($result);
?>

<div class="col-md-6">
	<div class="form-group">
	  <label for="usr">T1:</label>
	  <input type="text" class="form-control" id="T1" name="T1" value="<?=$row['T1']; ?>&deg;C" readonly > 
	  <input type="hidden" id="T1" name="T1" value="<?=$row['T1']; ?>"> 
	</div>
	<div class="form-group">
	  <label for="pwd">T2:</label>
	  <input type="text" class="form-control" id="t2" name="t2" value="<?=$row['T2']; ?>&deg;C" readonly>
	  <input type="hidden" id="T2" name="T2" value="<?=$row['T2']; ?>">  
	</div>
	<div class="form-group">
	  <label for="pwd">T3</label>
	  <input type="text" class="form-control" id="T3" name="T3" value="<?=$row['T3']; ?>&deg;C" readonly>
	  <input type="hidden" id="T3" name="T3" value="<?=$row['T3']; ?>"> 
	</div>
</div>
<div class="col-md-6">
	<div class="form-group">
	  <label for="usr">T4:</label>
	  <input type="text" class="form-control" id="T4" name="T4" value="<?=$row['T4']; ?>&deg;C" readonly>
	  <input type="hidden" id="T4" name="T4" value="<?=$row['T4']; ?>"> 
	</div>
	<div class="form-group">
	  <label for="pwd">T5:</label>
	  <input type="text" class="form-control" id="T5" name="T5" value="<?=$row['T5']; ?>&deg;C" readonly>
	  <input type="hidden" id="T5" name="T5" value="<?=$row['T5']; ?>"> 
	</div>
	<div class="form-group">
	  <label for="pwd">T6:</label>
	  <input type="text" class="form-control" id="T6" name="T6" value="<?=$row['T6']; ?>&deg;C" readonly>
	  <input type="hidden" id="T6" name="T6" value="<?=$row['T6']; ?>"> 
	</div>
</div>
