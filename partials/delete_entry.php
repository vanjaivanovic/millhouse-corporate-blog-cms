<?php	
		require 'database.php';
	if(isset($_POST['postID'])) {
	 	$statement = $pdo->prepare("DELETE FROM posts WHERE postID = :postID"); 
	
		$statement->execute(array(":postID" => $_POST["postID"]));

		header("Location: ../index.php?post=deleted");
	}

?>