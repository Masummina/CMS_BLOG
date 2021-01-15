<?
echo "rrr.";
die();
?>
<form action="" method="post" enctype="multipart/form-data">
	<?php
	if(isset($_GET['edit'])){
		$edit = $_GET['edit'];
	

	$update_select_sql = "SELECT * FROM `posts` WHERE `post_id`= $edit";
	$edit_connt_sql = mysqli_query($dbconnect, $update_select_sql);
	while($row_edit = mysqli_fetch_assoc($edit_connt_sql)){
		//  	print_r($row_edit);
		$post_category_id = $row_edit['post_category_id'];
		$post_title = $row_edit['post_title'];
		$post_author = $row_edit['post_author'];
		$post_author = $row_edit['post_author'];
		$post_image = $row_edit['post_image'];
		$post_content = $row_edit['post_content'];
		$post_tags = $row_edit['post_tags'];
		$post_status = $row_edit['post_status'];
?>


	<?php
		if(isset($_POST['post_update'])){
			$edit = $_GET['edit'];
			$post_title_update = $_POST['title_update'];
			$post_category_update = $_POST['category_update'];
			$post_author_update = $_POST['author_update'];
			$post_status_update = $_POST['status_update'];
			$post_tags_update = $_POST['tags_update'];
			$post_image_update = $_FILES['image_update']['name'];
			$phototmp = $_FILES['image_update']['tmp_name'];
			move_uploaded_file($phototmp, "../images/$post_image_update");
				if(empty($post_image_update)){
					$update_image_sql = "SELECT * FROM `posts` WHERE `post_id`= $edit";
					$image_update_select = mysqli_query($dbconnect, $update_image_sql);
					while($row_img = mysqli_fetch_assoc($image_update_select))
					{
						$post_image_update = $row_img['post_image'];
					}
				}

			$post_content_update = $_POST['content_update'];

			$post_update_query2 = "UPDATE `posts` SET `post_title` = '{$post_title_update}', `post_author` = '{$post_author_update}', `post_image` = '{$post_image_update}', `post_content` = '{$post_content_update}', `post_tags` = '{$post_tags_update}', `post_status` = '{$post_status_update}' WHERE `posts`.`post_id` = $edit";
				$update_select_query2 = mysqli_query($dbconnect, $post_update_query2);
				if(!$update_select_query2){
					die("CONNECTION ERROR". mysqli_connect_error(update_select_query2));
				}else{
					header('location: ../admin/posts.php');
				}


		}


	?>
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" value="<?php echo $post_title ?>" name="title_update">
	</div>
		<div class="form-group">
		  <label for="sel1">Category Title:</label>
		  <select class="form-control" id="sel1" name="category_update" required>
		  	<!-- <option value="" selected disabled hidden> 
          Select Category 
      </option>  -->
		  	<?php
			$query_cat_select = "SELECT * FROM categories";
			$categories_selet_all = mysqli_query($dbconnect, $query_cat_select);
				while($cate_select_row = mysqli_fetch_assoc($categories_selet_all)){
					$categories_id = $cate_select_row['category_id'];
					$categories_title = $cate_select_row['category_title'];
					$select = '';
					if ($post_category_id==$categories_id) {
						$select = 'selected';
					}
					echo "<option value='{$categories_id}' {$select}>{$categories_title}</option>";
				}
		?>
		  </select>
		</div>
	<div class="form-group">
		<label for="author">Post author</label>
		<input type="text" class="form-control" value="<?php echo $post_author ?>" name="author_update">
	</div>
	<div class="form-group">
		<label for="post_status">Post status</label>
	

<select style="width: 150px;" class="form-control" id="sel1" name="status_update" required>
		<option value="0">Select Status</option>
<option value="published" <?php if($post_status=="published") echo 'selected="selected"'; ?> >Published</option>
<option value="draft" <?php if($post_status=="draft") echo 'selected="selected"'; ?> >Draft</option>


		  </select>



	</div>
	<div class="form-group">
		<label for="post_tags">Post tags</label>
		<input type="text" class="form-control" value="<?php echo $post_tags ?>" name="tags_update" required>
	</div>
	<div class="form-group">
		<label for="post_image">Post photo</label>
		<input type="file" value="<?php echo $post_image ?>" name="image_update">
		<img style="max-width: 200px; height: auto; padding: 10px;" src="../images/<?php echo $post_image ?>" required>
	</div>
	<div class="form-group">
		<label for="post_content">Post content</label>
		<textarea class="form-control"  name="content_update" id="postupdate" cols="30" rows="10"><?php echo $post_content ?></textarea>
	</div>


	<div class="form-group">
		<input type="submit" class="btn btn-primary"  name="post_update">
	</div>
	<?php 
		}
		}

	?>
</form>
