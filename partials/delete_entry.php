<?php	
    /*
    This will delete a particular post through the POST-postID.
    */
    require_once 'database.php';
    if(isset($_POST['postID'])) {
        $statement = $pdo->prepare("DELETE FROM posts WHERE postID = :postID"); 
        $statement->execute(array(":postID" => $_POST["postID"]));
        header("Location: ../profile_deletepost.php?post=deleted");
}
?>