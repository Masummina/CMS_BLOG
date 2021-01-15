<?php
	// Post insert query function

	post_insert();

	
?>
<?php
if(isset($error)){
		echo "$error";
	}

?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title" required>
	</div>

		<div class="form-group">
		  <label for="sel1">Category Title:</label>
		  <select class="form-control" id="sel1" name="category_name" required>
		  	<option value="" selected disabled hidden> 
          Select Category 
      </option> 
		  	<?php
			$query_cat_select = "SELECT * FROM categories";
			$categories_selet_all = mysqli_query($dbconnect, $query_cat_select);
				while($cate_select_row = mysqli_fetch_assoc($categories_selet_all)){
					$categories_id = $cate_select_row['category_id'].'-'.$cate_select_row['category_title'];
					$categories_title = $cate_select_row['category_title'];
					echo "<option value='{$categories_id}'>{$categories_title}</option>";
		}
		?>
		  </select>
		</div>

	<div class="form-group">
		<label for="author">Post author</label>
		<input type="text" class="form-control" name="author" required>
	</div>
	<div class="form-group">
		<label for="post_status">Post status</label>
		<select style="width: 150px;" class="form-control" id="sel1" name="post_status" required>
		  	<option value="" selected disabled hidden> 
		          Select Status 
		      </option>
		      <option value="published">Published</option>
		      <option value="draft">Draft</option>
		  </select>
	</div>
	<div class="form-group">
		<label for="post_tags">Post tags</label>
		<input type="text" class="form-control" name="post_tags" required>
	</div>
	<div class="form-group">
		<label for="post_image">Post photo</label>
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="post_content">Post content</label>
		<textarea class="form-control" name="post_content" id="posteditor" cols="30" rows="10" required></textarea>
	</div>


	<div class="form-group">
		<input type="submit" class="btn btn-primary"  name="post_submit">
	</div>
</form>