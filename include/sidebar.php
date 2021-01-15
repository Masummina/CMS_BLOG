            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="POST" action="">
                    <div class="input-group">
                    	
                    		<input type="text" name="search" placeholder="Search..." class="form-control">
	                        <span class="input-group-btn">
	                            <button class="btn btn-default" type="submit" name="submit">
	                                <span class="glyphicon glyphicon-search"></span>
	                        </button>
	                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                 <div class="well">
                    <h4>Login</h4>
                    <form method="POST" action="include/login.php">

                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="login_username" required>
                      </div>
                    <div class="input-group">
                            <input type="password" name="login_password" placeholder="password" class="form-control" required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name="login_submit">
                                    submit
                            </button>
                            </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php
                                    $query_side = "SELECT * FROM categories";
                                    $sql_sidebar = mysqli_query($dbconnect, $query_side);
                                    while($cat_count = mysqli_fetch_assoc($sql_sidebar)){
                                        $cat_id = $cat_count['category_id'];
                                        $cat_title = $cat_count['category_title'];
                                        echo "<li><a href='category.php?cat_id=$cat_id'>{$cat_title}</a></li>";
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                    <?php
                        include('widget.php');

                    ?>
            </div>