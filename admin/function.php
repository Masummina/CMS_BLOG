<?php
 // category insert query

function insert_category()
{
	global $dbconnect;
	 if(isset($_POST['submitf']))
    {
	    $addcategory = $_POST['cat_title'];
	    if(empty($addcategory) ||  $addcategory == "")
	    {
	        echo "<p style='color: red;'>This field should not be empty.</p>";
	    }else {
	        $insert_query = "INSERT INTO `categories` (`category_title`) VALUES ('$addcategory')";
	        $insert_cat_sql = mysqli_query($dbconnect, $insert_query);
	        if(!$insert_cat_sql)
	        {
	            die("QUERY FAILED" . mysqli_error($dbconnect));
	        }
	        else{
	            echo "<p style='color: green;'>Category added successfully</p>";
	        }
	    }
        
    }
}
// category update query

function category_update()
{
	global $dbconnect;
	 if(isset($_GET['edit']))
	 {
        $edit_id = $_GET['edit'];
        include('include/category_update.php');
       
    }

}

// select all category or find all category function
function findAll_category()
	{
		global $dbconnect;
		$query = "SELECT * FROM categories";
	    $select_all_category = mysqli_query($dbconnect, $query);
	    while($row = mysqli_fetch_assoc($select_all_category))
	    {
	        $cat_id_row = $row['category_id'];
	        $cat_title_row = $row['category_title'];
	       
			echo "<tbody>";
		    echo "<td>{$cat_id_row}</td>";
		    echo "<td>{$cat_title_row}</td>";
		    echo  "<td>
		        <a class='btn btn-danger' href='category.php?delete={$cat_id_row}'>Delete</a>
		        <a class='btn btn-primary' href='category.php?edit={$cat_id_row}'>Edit</a>
		    </td>";
			echo "</tbody>";
		}
	}

	function delect_category(){
	global $dbconnect;
	  if(isset($_GET['delete']))
	  {
        $delete_cat = $_GET['delete'];
        $delete_query = "DELETE FROM `categories` WHERE `category_id` = $delete_cat";
        $delete_query_exec = mysqli_query($dbconnect, $delete_query);
        if($delete_query_exec)
        {
            header("location: category.php");
        }
      }
	}

// post insert query

	function post_insert(){
		global $dbconnect;
		global $error;

	if(isset($_POST['post_submit']))
	{
		$title = $_POST['title'];
		$post_category = $_POST['category_name'];
		$post_category_array = explode('-', $post_category);
		$post_category_id = $post_category_array[0];
		$post_category_name = $post_category_array[1];
		$author = $_POST['author'];
		// add image 
		$post_image = $_FILES['post_image']['name'];
		$phototmp = $_FILES['post_image']['tmp_name'];
		move_uploaded_file($phototmp, "../images/$post_image");

		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tags'];
		$post_status = $_POST['post_status'];

		// field condition check 

		if(empty($title) || $title==""){
			$error = "Invalid Your title.";

		}else if(empty($author) || $author==""){
			$error = "Invalid Your author.";
		}
		else if(empty($post_image) || $post_image==""){
			$error = "Please select an image.";
		}else if(empty($post_content) || $post_content==""){
			$error = "Please write some content.";
		}else if(empty($post_tags) || $post_content==""){
			$error = "Please add some tags.";
		}
		else if(empty($post_status) || $post_status==""){
			$error = "Please add blog status.";
		}else {
			$insert_query = "INSERT INTO `posts` (`post_category_id`, `post_title`,`category_name`, `post_author`, `post_image`, `post_content`, `post_tags`, `post_status`, `post_views_count`)";
			$insert_query .= "VALUES ('{$post_category_id}', '{$title}','{$post_category_name}', '{$author}', '{$post_image}', '{$post_content}', '{$post_tags}', '{2}', '{$post_status}')";
			$post_insert_query = mysqli_query($dbconnect, $insert_query);
			if(!$post_insert_query)
	        {
	            die("QUERY FAILED" . mysqli_error($dbconnect));
	        }
	        else{
	            echo "<p style='color: green;'>Post added successfully</p>";
	        }
		}

	}


}


   

?>