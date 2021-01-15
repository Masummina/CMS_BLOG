
                    <!-- comments show -->
      <table class="table table-bordered table-hover">
		<thead style="background: #777; color: #fff">
			<tr>
				<th>id</th>
				<th>Post id</th>
				<th>Author</th>
				<th>comment</th>
				<th>Email</th>
				<th>Status</th>
				<th>Date</th>
				<th>In response to</th>
				<th>Approve</th>
				<th>Unapprove</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$com_query = "SELECT * FROM comments";
		    $select_all_com = mysqli_query($dbconnect, $com_query);
		    while($row = mysqli_fetch_assoc($select_all_com))
		    {
		        $com_id = $row['comment_id'];
		        $comment_post_id = $row['comment_post_id'];
		        $comment_name = $row['comment_name'];
		        $comment_content = $row['comment_content'];
		        $comment_email = $row['comment_email'];
		        $comment_status = $row['comment_status'];
		        $comment_date = $row['comment_date'];
		        echo "<tr>";
		        echo "<td>$com_id</td>";
		        echo "<td>$comment_post_id</td>";
		        echo "<td>$comment_name</td>";
		        echo "<td>$comment_content</td>";
		        echo "<td>$comment_email</td>";
		        echo "<td>$comment_status</td>";
		        echo "<td>$comment_date</td>";

		        // select Post title Query
		        $query_comment_post_title = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
		        $comment_title_select = mysqli_query($dbconnect, $query_comment_post_title);
		        while ($row_title = mysqli_fetch_array($comment_title_select)){
		        	$comm_title_id= $row_title['post_id'];
		        	$comm_title = $row_title['post_title'];
		        	echo "<td> <a target='_blank' href='../post.php?post_id=$comm_title_id'>$comm_title</a> </td>";
		        }
		         // Post title Query End

		        echo "<td> <a href='comments.php?approve=$com_id' onclick=".'"'."return confirm('Are you sure?')".'"'.">Approve</a></td>";

		        echo "<td> <a href='comments.php?unapprove=$com_id' onclick=".'"'."return confirm('Are you sure?')".'"'.">Unapprove</a></td>";

		        echo "<td> <a href='comments.php?delete={$com_id}' onclick=".'"'."return confirm('Are you sure?')".'"'.">Delete</a></td>";
		        echo "</tr>";
		        
		    }
		    	// comment Delete query
			    if(isset($_GET['delete']))
			    {
			    	$delete_data = $_GET['delete'];
			    	$comment_delete_query = "DELETE FROM `comments` WHERE `comment_id` = {$com_id}";
			    	$delete_query_select = mysqli_query($dbconnect, $comment_delete_query);
			    	if($delete_query_select){
			    		header("location: comments.php");
			    	}	    
				 }
				 // comment approve query
				 if(isset($_GET['approve'])){
				 	$approve_id = $_GET['approve'];
				 	$comm_approve_query = "UPDATE comments SET comment_status ='approve' WHERE  comment_id = $approve_id";
				 	$comment_app_select = mysqli_query($dbconnect, $comm_approve_query);
				 	if($comment_app_select){
			    		header("location: comments.php");
			    	}
				 }
				  // comment unapprove query
				 if(isset($_GET['unapprove'])){
				 	$unapprove_id = $_GET['unapprove'];
				 	$comm_unapprove_query = "UPDATE comments SET comment_status ='unapprove' WHERE  comment_id = $unapprove_id";
				 	$comment_unapp_select = mysqli_query($dbconnect, $comm_unapprove_query);
				 	if($comment_unapp_select){
			    		header("location: comments.php");
			    	}
				 }
				 



				?>
    		</tbody>
    	</table>



                    <!-- comments end -->

