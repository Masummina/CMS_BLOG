<?php

$db['db_host']="localhost";
$db['db_user']="root";
$db['db_password']="";
$db['db_name']="blog";


foreach($db as $key=>$value){
	// create constant: this value can't be change;
	define(strtoupper($key),$value);

}
$dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}





?>