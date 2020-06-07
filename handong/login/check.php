<?php
session_start();

require_once('../inc/global.php');
require_once('../inc/config.php');

$p_email = $_POST['userid'];
$p_pw = $_POST['userpw'];

$sql = "USE db_project";
if(mysqli_query($conn, $sql)) {
  echo "";
} else {
  echo "fail";
}

$sql2 = "SELECT * FROM user WHERE email='$p_email' AND user_pw=PASSWORD('$p_pw')";

$result = mysqli_query($conn, $sql2);

$_SESSION["is_logged"] = "NO";
$_SESSION["myId"] = NULL;
$_SESSION["myName"] = NULL;
$_SESSION["myEmail"] = NULL;
$_SESSION["myPassword"] = NULL;
$_SESSION["myOrdCnt"] = NULL;

if(mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION["is_logged"] = "YES";
  $_SESSION["myId"] = $row["user_id"];
  $_SESSION["myName"] = $row["user_name"];
  $_SESSION["myEmail"] = $row["email"];
  $_SESSION["myPassword"] = $row["user_pw"];
  $_SESSION["myOrdCnt"] = $row["ord_count"];

  echo "<script>alert('로그인 되었습니다.');</script>";
  echo "<script>location.href='/handong/index.php';</script>";
}

else {
    echo "<script>alert('정보를 다시 입력하세요.');</script>";
    echo "<script>location.href='login.php';</script>";
}

?>
