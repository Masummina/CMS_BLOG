<table class="table table-bordered table-hover">
		<thead style="background: #777; color: #fff">
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Category</th>
				<th>Author</th>
				<th>Cat id</th>
				<th>Date</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Comment count</th>
				<th>Post status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query = "SELECT * FROM posts";
		    $select_all_posts = mysqli_query($dbconnect, $query);
		    while($row = mysqli_fetch_assoc($select_all_posts))
		    {
		        $post_id = $row['post_id'];
		        $post_category_id = $row['post_category_id'];
		        $post_category_name = $row['category_name'];
		        $post_title = $row['post_title'];
		        $post_author = $row['post_author'];
		        $post_date = $row['post_date'];
		        $post_image = $row['post_image'];
		        $post_tags = $row['post_tags'];
		        $post_comment_count = $row['post_comment_count'];
		        $post_status = $row['post_status'];
		        // $post_views_count = $row['post_views_count'];
		        echo "<tr>";
		        echo "<td>$post_id</td>";
		        echo "<td>$post_title</td>";
		        echo "<td>$post_category_name</td>";
		        echo "<td>$post_author</td>";
		        echo "<td>$post_category_id</td>";
		        echo "<td>$post_date</td>";
		        echo "<td> <img style='max-width:40px;' src='../images/$post_image'></td>";
		        echo "<td>$post_tags</td>";
		        echo "<td>$post_comment_count</td>";
		        echo "<td>$post_status</td>";
		        echo "<td> <a href='posts.php?delete={$post_id}' onclick=".'"'."return confirm('Are you sure?')".'"'.">Delete</a> / <a class='btn btn-success' href='?source=edit_post&edit={$post_id}' onclick=".'"'."return confirm('Are you sure?')".'"'.">Edit</a></td>";
		        echo "</tr>";
		        
		    }
	    if(isset($_GET['delete']))
	    {
	    	$delete_data = $_GET['delete'];
	    	$post_delete_query = "DELETE FROM `posts` WHERE `post_id` = {$delete_data}";
	    	$delete_query_select = mysqli_query($dbconnect, $post_delete_query);
	    	if($delete_query_select){
	    		header("location: posts.php");
	    	}

	    }

		    
 
       

		?>
                        		</tbody>
                        	</table>
