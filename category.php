<?php
    include('include/header.php');
?>


 <!-- Navigation -->
<?php
    include('include/navigation.php');

?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
        <?php
        if(isset($_GET['cat_id'])){
            $cat_id = $_GET['cat_id'];
        }

        if(isset($_POST['submit'])){
                $search = $_POST['search'];
                echo $search;
                $query = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search%'";
                $select_query = mysqli_query($dbconnect, $query);

                } else {
                    $query = "SELECT * FROM posts WHERE post_category_id = {$cat_id}";
                    $select_query = mysqli_query($dbconnect, $query);
                }   

            while($row = mysqli_fetch_assoc($select_query))
            {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,100);

                ?>


                    <h2>
                    <a href="post.php?post_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>














<!-- post while function close -->
<?php }  ?>



               

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php

                include('include/sidebar.php');

            ?>

        </div>
        <!-- /.row -->

        <hr>

<?php
    include('include/footer.php');


?>
