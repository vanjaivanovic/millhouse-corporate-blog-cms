<?php
    require_once 'database.php';
    /*
    The limit variable sets the amount of posts for each page.
    */
    $limit = 5;
    /*
    If $_GET is not set the script will assume that the page number is 1. 
    */
    if(isset($_GET["page"])) {
        $page  = $_GET["page"]; 
    } else { 
        $page=1; 
    }
    /*
    The SQL-statement is initiated. Only 5 entries per page. 
    */
    $start_from = ($page-1) * $limit;  
    /*
    All posts are selected.
    */
    $statement = $pdo->prepare("SELECT * FROM posts order by postID DESC LIMIT $start_from, $limit"); 
    $statement->execute(); 
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>