<?php
if(isset($_GET['post_id'])){
	$comment_post_id = $_GET['post_id'];
}
if(isset($_POST['comment_submit']))
{
	$comment_name = $_POST['comment_name'];
	$comment_email = $_POST['comment_email'];
	$comment_content = $_POST['comment_content']; 
	if(!isset($comment_name) || $comment_name =="" || strlen($comment_name) < 3){
		echo "Please fill out Your name";
	}else if(!isset($comment_email) || $comment_email =="" || strlen($comment_email) < 3){

	}else if(!isset($comment_content) || $comment_content =="" || strlen($comment_content) < 3){
		
	}else {
		$comment_insert = "INSERT INTO `comments` (`comment_post_id`, `comment_name`, `comment_email`, `comment_content`, `comment_status`) VALUES ('{$comment_post_id}', '{$comment_name}', '{$comment_email}', '{$comment_content}', 'Unapprove')";
		$comment_select_query = mysqli_query($dbconnect, $comment_insert);
		if(!$comment_select_query){
			die('QUERY FAILED' . mysqli_error($comment_select_query));
		}else{
            echo "comment insert successfully";
        }

	}
    $comment_count_query = "UPDATE `posts` SET `post_comment_count` = post_comment_count + 1 WHERE `posts`.`post_id` = $comment_post_id";
    $comment_count_connect = mysqli_query($dbconnect, $comment_count_query);
}







?>

<!-- Comments Form -->
<br>
<div class="well">
    <h4>Leave a Comment:</h4>
    <form method="post" action="">
    	<div class="form-group">
    		<label for="comment_name"></label>
    		<input type="text" name="comment_name" class="form-control" required>
    	</div>
    	<div class="form-group">
    		<label for="comment_email"></label>
    		<input type="email" name="comment_email" class="form-control" required>
    	</div>
        <div class="form-group">
            <textarea class="form-control" name="comment_content" rows="3"></textarea>
        </div>
        <button type="submit" name="comment_submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->

<?php
    // $comment_query = "SELECT comments WHERE comment_status ='approve'";
    $comment_query = "SELECT * FROM comments WHERE comment_post_id = $comment_post_id ";
    $comment_query .="AND comment_status = 'approve'";
    $comment_query .="ORDER BY comment_id DESC";
    $comment_select = mysqli_query($dbconnect, $comment_query);


    while ($comment_fetch = mysqli_fetch_array($comment_select)) {
       $author = $comment_fetch['comment_name'];
       $comment_date = $comment_fetch['comment_date'];
       $comment_content= $comment_fetch['comment_content'];
 ?>


<!-- comment start -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $author ?>
            <small><?php echo $comment_date ?></small>
        </h4>
        <p><?php echo $comment_content ?></p>
    </div>
</div>
<!-- comment end -->
<?php  }  ?>
