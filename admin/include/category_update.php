 <form method="post" action="">
                    <div class="form-group">
                        <label for="cat_title_update">Update category</label>

            <?php

            if(isset($_GET['edit']))
            {
                $edit_id = $_GET['edit'];
                $update_select_sql = "SELECT * FROM `categories` WHERE `category_id`= $edit_id";
                $update_sql_connt = mysqli_query($dbconnect, $update_select_sql);
                while($row = mysqli_fetch_assoc($update_sql_connt))
                {
                            $update_value = $row['category_title'];
                            $update_id = $row['category_id'];
            ?>

            <input type="text" value="<?php if(isset($update_value)){echo $update_value;}?>" name="cat_title_update" class="form-control">

            <?php } } ?>
                <?php

                    
               
                // ;

                    if(isset($_POST['submit_update'])){
                        $cat_title_update = $_POST['cat_title_update'];
                        $update_query = "UPDATE `categories` SET `category_title` = '$cat_title_update' WHERE `category_id` = {$update_id}";
                        $update_query_connc = mysqli_query($dbconnect, $update_query);
                         
                        if(!$update_query_connc){
                            die("QUERY FAILED" . mysqli_error($dbconnect));
                        }else{
                            header("location: category.php");
                        }

                    }

                ?>


                        
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit_update" value="update" class="btn btn-primary">
                    </div>
                </form>