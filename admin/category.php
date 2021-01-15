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
                        <div class="col-xs-6">
                            <!-- insert category query -->

                            <!-- category insert function -->
                                <?php
                                    insert_category();
                                ?>

                            <!-- insert category query -->

                        	<form method="post" action="">
                        		<div class="form-group">
                        			<label for="cat_title">Add category</label>
                        			<input type="text" name="cat_title" class="form-control">
                        		</div>
                        		<div class="form-group">
                        			<input type="submit" value="add category" name="submitf" class="btn btn-primary">
                        		</div>
                        	</form>

                            <!-- update category function  -->
                            <?php category_update(); ?>

                        </div>
                        <div class="col-xs-6">
                        	<table class="table table-bordered table-hover">
                        		<thead class="thead-light">
                        			<tr>
                        				<th>ID</th>
                        				<th>Category</th>
                                        <th>Action</th>
                        			</tr>
                        		</thead>

                                <!-- //  select category function -->
                                <?php findAll_category(); ?>

                                <!-- // delect category function -->
                                <?php delect_category(); ?>

                        	</table>
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
