<?php
include('include/admin_header.php');
include('function.php');
?>
    <div id="wrapper">
        <!-- Navigation -->
  <?php
    include('include/admin_navigation.php');
  ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Author</small>
                        </h1>
                        <div class="post-data">
                        	<?php
                        		if(isset($_GET['source']))
                        		{
                        			$source = $_GET['source'];
                        		}else{
                        			$source ="";
                        		}
                        		switch ($source) {
                        			case 'user_edit':
                        				include 'include/user_edit.php';
                        				break;
                        			case 'add_user';
                        				include 'include/add_user.php';
                        				break;
                        			
                        			default:
                        				include 'view_all_user.php';
                        				break;
                        		}
                        		// include 'include/view_all_post.php';

                        	?>

                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
include('include/admin_footer.php');

?>
