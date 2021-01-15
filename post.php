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
        if(isset($_GET['post_id'])){
            $single_post_id = $_GET['post_id'];
        }

        if(isset($_POST['submit'])){
                $search = $_POST['search'];
                echo $search;
                $query = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$search%'";
                $select_query = mysqli_query($dbconnect, $query);

                } else{
                    $query = "SELECT * FROM posts WHERE post_id = {$single_post_id}";
                    $select_query = mysqli_query($dbconnect, $query);
                }   

            while($row = mysqli_fetch_array($select_query))
            {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

                ?>


                    <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href=""><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>


<!-- post while function close -->
<?php }  ?>

<!-- blog comment -->

<hr>
<?php
    include('include/post_comments.php');

?>

      

<!-- blog comment End-->




               

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
