<?php

session_start();

if($_SESSION['is_logged'] == 'YES') {

  $_SESSION['is_logged'] = 'NO';
  unset($_SESSION['myName']);
  unset($_SESSION['myEmail']);
  unset($_SESSION['myPassword']);
  unset($_SESSION['myOrdCnt']);

  echo "<script>alert('로그아웃 되었습니다.')</script>";
  echo "<script>location.href='/handong/login/login.php';</script>";
} else {
  echo "fail";
}

?>
