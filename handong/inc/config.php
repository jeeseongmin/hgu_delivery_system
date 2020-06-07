<?php
  $conn = mysqli_connect(
  	'15.164.230.147',
  	'test',
  	'testtest',
  	'sys',
  	'3306');
    mysqli_query($conn, "set names utf8");

  if (mysqli_connect_errno()) {
  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "USE db_project";
  mysqli_query($conn, $sql);
  //$sql = "SELECT VERSION()";
  //$result = mysqli_query($conn, $sql);
  //$row = mysqli_fetch_array($result);
  //define("ADMIN_URL", "http://".$_SERVER['HTTP_HOST']."/project/index.php");
  define("ADMIN_URL", "http://15.164.230.147/handong/index.php");

?>
