	<?php

	$emailErr="not valid";

if(isset($_POST['email']) == true && empty($_POST['email']) == false) {
	$email= $_POST['email'];
	if(filter_var ($email, FILTER_VALIDATE_EMAIL) == true){
		echo 'valid email';
	} else {
		echo 'not valid';
	}
}
?>