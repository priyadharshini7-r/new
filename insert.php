<?php
include_once('header.php');
if(isset($_POST['submit'])){
	
	//GET POST VARIABLES
$firstName=$_POST['firstName'];
$email=$_POST['email'];

	//THE ENCRYPTION PROCESS
$nameencrypted=encryptthis($firstName, $key);
$emailencrypted=encryptthis($email, $key);

	//DISPLAY RESULTS
echo '<div class="well">';
echo '<h2>Original Data</h2>';
echo '<p>Name: '.$firstName.'</p>';
echo '<p>Email: '.$email.'</p>';
echo '</div>';

	//INSERT INTO DATABASE
mysqli_query($con,"INSERT INTO people(`name`, `email`)
VALUES ('$nameencrypted','$emailencrypted')");

echo '<p class="lead">The name and email address have been encrypted and stored into the database</p>';
}

echo '<div class="well"><form method="post">
	<div class="form-group">
		<label for="firstName">Enter Name Here</label>
			<input type="text" class="form-control" name="firstName">
	</div>
	<div class="form-group">
		<label for="email">Enter Email Here</label>
			<input type="email" class="form-control" name="email">
	</div>
	<input type="submit" name="submit" class="btn btn-success btn-lg" value="submit">
</form></div>';
echo '</div>
	  </div>
	  <div class="col-sm-3"></div>
	  </div>';
include_once('footer.php');
?>