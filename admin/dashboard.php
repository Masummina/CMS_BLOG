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
                            <small> <?php
                            if(isset($_SESSION['user_firstname'])){
                                echo $_SESSION['user_firstname'];

                            }
                            
                            ?></small>
                        </h1>
                        <div class="post-data">
                        	
                        	<?php

                        	include 'include/dashboard.php';

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
