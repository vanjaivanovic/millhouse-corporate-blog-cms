<?php	
    /*
    This will delete a comment from a particular post through postID.
    */
    require_once 'database.php';
	if(isset($_POST['postID'])) {
	 	$statement = $pdo->prepare("DELETE FROM comments WHERE postID = :postID"); 
		$statement->execute(array(":postID" => $_POST["postID"]));
		header("Location: ../profile_deletecomment.php?post=deleted");
	}

?>