<?php
session_start();

require_once('../inc/global.php');
require_once('../inc/config.php');

$rname = $_POST['rname'];
$remail = $_POST['remail'];
$rpassword = $_POST['rpassword'];
$rpasswordCheck = $_POST['rpasswordCheck'];
$rtel1 = $_POST['rtel1'];
$rtel2 = $_POST['rtel2'];
$rtel3 = $_POST['rtel3'];
$rcard1 = $_POST['rcard1'];
$rcard2 = $_POST['rcard2'];
$rcard3 = $_POST['rcard3'];
$rcard4 = $_POST['rcard4'];
$rcard_type= $_POST['rcard_type'];

if($rname == "") {
  echo "<script>alert('이름을 입력하세요.');</script>";
  echo "<script>location.href='register.php';</script>";
}
else if($remail =="") {
  echo "<script>alert('아이디를 입력하세요.');</script>";
  echo "<script>location.href='register.php';</script>";
}
else if($rpassword=="") {
  echo "<script>alert('패스워드를 입력하세요.');</script>";
  echo "<script>location.href='register.php';</script>";
}
else if($rpassword!=$rpasswordCheck) {
  echo "<script>alert('패스워드가 일치하지 않습니다.');</script>";
  echo "<script>location.href='register.php';</script>";
}
else if($rtel1=="" || $rtel2=="" || $rtel3=="" || $rcard1=="") {
  echo "<script>alert('핸드폰 정보를 입력하세요.');</script>";
  echo "<script>location.href='register.php';</script>";
}
else if($rcard1=="" || $rcard2=="" || $rcard3=="" || $rcard4=="") {
  echo "<script>alert('카드 정보를 입력하세요.');</script>";
  echo "<script>location.href='register.php';</script>";
}
else if($rcard_type=="") {
  echo "<script>alert('은행 정보를 다시 입력하세요.');</script>";
  echo "<script>location.href='register.php';</script>";
}

//
// INSERT INTO user (user_name, user_pw, email, ord_count) VALUES ($rname, $rpassword, $remail, 0);
//
// select user_id from user where user_name= $rname;
// - 해서 얻어낸 user_id에
//
// INSERT INTO user_phone (user_id, phone) VALUES (user_id, $rtel1-$rtel2-$rtel3);
//
// INSERT INTO user_card (card_num, card_type, user_id) VALUES ($rcard1-$rcard2-$rcard3-$rcard4, $rcard_type, user_id);

$sql = "USE db_project";
if(mysqli_query($conn, $sql)) {
  echo "";
} else {
  echo "fail";
}


$sql1 = "INSERT INTO user (user_name, user_pw, email, ord_count) VALUES ('$rname', PASSWORD('$rpassword'), '$remail', 0)";
$result1 = mysqli_query($conn, $sql1);
//
// $sql2 = "SELECT user_id from user where user_name='$rname'";
// $result2 = mysqli_query($conn, $sql2);
// $row_id = mysqli_fetch_array($result2);
//
// $user_id = $row_id['user_id'];
//
// $phone = $rtel1."-".$rtel2."-".$rtel3;
//
// $sql3 = "INSERT INTO user_phone (user_id, phone) VALUES ('$user_id', '$phone')";
// $result3 = mysqli_query($conn, $sql3);
// $card = $rcard1."-".$rcard2."-".$rcard3."-".$rcard4;
//
// $sql4 = "INSERT INTO user_card (card_num, card_type, user_id) VALUES ('$card', '$rcard_type', '$user_id')";
// $result3 = mysqli_query($conn, $sql4);

echo "<script>alert('회원가입 되었습니다.로그인하세요.');</script>";
echo "<script>location.href='/handong/login/login.php';</script>";



?>
