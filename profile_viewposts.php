<?php
    require_once 'partials/session_start.php';
    //This page will only appear if the user is logged in. If not logged in, he/she will be re-directed.
    if(isset($_SESSION['user'])) {
        require 'partials/database.php';
        require 'partials/head_profile.php';
        require 'partials/fetch_entries.php';
        require 'partials/functions.php';
?>
<div id="content" class="container">
    <div class="row">
        <div class="col-sm-12">      
            <div class="card_header">
                <h2>View all posts</h2>    
            </div>
            <div class="card_content">
                <!-- The fetch_entries partial will retreive and loop all posts on the website. -->
                <?php 
                    foreach($posts as $post) { 
                ?>
                <div class="recent_loop all_posts row">
                    <div class="col-sm-7 col-md-9">
                        <h3><?= $post['title'] ?></h3>
                        <span class="span_light"><?= $post['time'] ?></span>
                        <?= $post['content'] ?>
                    </div>
                    <div class="col-sm-5 col-md-3"> 
                        <form action="comment.php" method="get">
                            <input type="hidden" value="<?= $post['postID'] ?>" name="postID"/>
                            <input type="submit" value="show post" class="btn btn-primary btn_card"/>
                        </form>
                        <!-- All logged in users can view the entries, but only a user with the username "admin" can delete them. For everyone else, the option won't appear. This is done by comparison -->
                        <?php
                            if($_SESSION["user"]["username"] == $post['name'] or $_SESSION["user"]["username"] == "admin") {
                        ?> 
                        <form action="partials/delete_entry.php" method="post">
                            <input type="hidden" value="<?=$post["postID"] ?>" name="postID"/>
                            <input type="submit" value="delete" class="btn btn-primary btn_card"/>
                        </form>
                        <form action="profile_editpost.php" method="post">
                            <input type="hidden" value="<?= $post["postID"] ?>" name="postID"/>
                            <input type="submit" value="edit" class="btn btn-primary btn_card"/>
                        </form>
                        <div class="clear"></div>
                        <?php } ?>
                    </div> 
                </div><!--end recent loop-->

                <?php } ?>
            </div>
        </div>
    </div>
    <!--  A function is initiated to gather the post amount. Then our pagination is required. -->
    <?php
       	$total_records = postamount();
        require 'partials/pagination_pages.php';
    ?>
</div>  

<?php
  require 'partials/footer_profile.php';
  }
  else {
	header('Location: landing.php?logged_in=false');
  }
?>