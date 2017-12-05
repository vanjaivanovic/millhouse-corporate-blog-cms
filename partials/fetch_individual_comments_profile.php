<?php 
$limit = 5;  
if(isset($_GET["page"])) {
	$page  = $_GET["page"]; 
} else { 
	$page=1; 
};  
$start_from = ($page-1) * $limit;  
$statement = $pdo->prepare("SELECT * FROM comments where userID = :userID ORDER BY postID DESC LIMIT $start_from, $limit");   
$statement->execute(array(
	":userID" => $_SESSION["user"]["userID"]
)); 
$indivudual_comment_profile = $statement->fetchAll(PDO::FETCH_ASSOC);
?>