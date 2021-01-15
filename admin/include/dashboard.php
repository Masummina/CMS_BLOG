       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>
                  	

                  	<?php
					    	$posts_query = "SELECT * FROM posts";
					    	$posts_select = mysqli_query($dbconnect, $posts_query);
					    	$posts_count = mysqli_num_rows($posts_select);
					    	echo $posts_count;
					    ?>
                  </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
                     	<?php
					    	$comments_query = "SELECT * FROM comments";
					    	$comments_select = mysqli_query($dbconnect, $comments_query);
					    	$comments_count = mysqli_num_rows($comments_select);
					    	echo $comments_count;
					    ?>

                     </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>
                    	<?php
					    	$users_query = "SELECT * FROM users";
					    	$users_select = mysqli_query($dbconnect, $users_query);
					    	$users_count = mysqli_num_rows($users_select);
					    	echo $users_count;
					    ?>

                    </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>    
                        	<?php

						 	$date = date("Y/m/d");

							$month = date('F'.'Y', strtotime($date));

						    ?>
							<?php
						    	$category_query = "SELECT * FROM categories";
						    	$categoey_select = mysqli_query($dbconnect, $category_query);
						    	$category_count = mysqli_num_rows($categoey_select);
						    	echo $category_count;
						    ?>
    	
    </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="../admin/category.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                
<?php
	$comment_unapprove = "SELECT * FROM comments WHERE comment_status = 'unapprove'";
	$comment_unapprove_select = mysqli_query($dbconnect, $comment_unapprove);
	$unap_comment = mysqli_num_rows($comment_unapprove_select);

	$post_draft = "SELECT * FROM posts WHERE post_status = 'draft'";
	$post_draft_select = mysqli_query($dbconnect, $post_draft);
	$post_draft_count = mysqli_num_rows($post_draft_select);

	$user_subscriber = "SELECT * FROM users WHERE user_role = 'subscriber'";
	$user_subscriber_select = mysqli_query($dbconnect, $user_subscriber);
	$user_subscriber_count = mysqli_num_rows($user_subscriber_select);


?>


                <!-- /.row -->
<!-- Google chart start: -->
<div class="row">
	<div id="chart_div" style="width: auto; height: 500px;"></div>
	 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);
        function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
        	['Name', 'Value'],
        	<?php
	        	$chart_name = ['Post', 'Draft Post', 'Users', 'subscriber', 'Categories', 'Comments', 'Unapprove Comt'];
	      		$chart_value = [$posts_count, $post_draft_count, $users_count, $user_subscriber_count,  $category_count, $comments_count, $unap_comment];
	      		for($i = 0; $i < 7; $i++){
	      			echo "['{$chart_name[$i]}'" . "," . "{$chart_value[$i]}],";
	      		}
	      		




        	?>







          // ['Month', 'Bolivia', 'Ecuador', 'Madagascar', 'Papua New Guinea', 'Rwanda', 'Average'],
          // ['2004/05',  165,      938,         522,             998,           450,      614.6],
          // ['2005/06',  135,      1120,        599,             1268,          288,      682],
          // ['2006/07',  157,      1167,        587,             807,           397,      623],
          // ['2007/08',  139,      1110,        615,             968,           215,      609.4],
          // ['2008/09',  136,      691,         629,             1026,          366,      569.6]

          // ['Posts', 55],
        ]);









		  var options = {
		      title : 'Monthly Coffee Production by Country',
		      vAxis: {title: 'Cups'},
		      hAxis: {title: 'Month'},
		      seriesType: 'bars',
		      series: {5: {type: 'line'}}        
		  };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</div>