<?php
  session_start();
  require_once('../inc/config.php');
  require_once('../inc/top.php');
  $register_url = $curpath."login/registerCheck.php";
  $list_url = $curpath."rest_list/fetch_rest_list.php";

  $id = $_SESSION['myId'];
  $index = 0;

  $sql = "USE db_project";
  mysqli_query($conn, $sql);

  /*
  $sql = "SELECT * FROM records AS R
    INNER JOIN records_menu AS M ON R.record_id=M.record_id
    LEFT JOIN menu_list AS L ON M.menu_id=L.menu_id
    LEFT JOIN restaurant_name AS N ON L.rest_id=N.rest_id
    WHERE R.user_id='$id'
    ORDER BY R.ord_date DESC";
  */
  // $sql = "SELECT * FROM records AS R
  //   INNER JOIN records_menu AS M ON R.record_id=M.record_id
  //   LEFT JOIN menu_list AS L ON M.menu_id=L.menu_id
  //   LEFT JOIN restaurant_name AS N ON L.rest_id=N.rest_id
  //   LEFT JOIN restaurant_info AS I ON N.rest_id=I.rest_id
  //   WHERE R.user_id='$id'
  //   ORDER BY R.ord_date DESC";
  // $sql2 = "SELECT ord_count FROM user WHERE user_id='$id'";
  //
  // $result = mysqli_query($conn, $sql);
  // $result2 = mysqli_query($conn, $sql2);

?>

<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <style>
      .wrap2 {
        margin-top:200px;
        margin-left:300px;

      }
      .wrap2 .wrap3 {
        height:200px;
        line-height:200px;
      }
      </style>

  <title>회원 가입</title>
 </head>
 <body id>
   <div class="wrap2">
     <div class="wrap3">
     <form name="write_form_member" action="registerCheck.php" method="post">
       <table width="940" style="padding:5px 0 5px 0; ">
          <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
          <tr>
             <th> 이름</th>
             <td><input type="text" placeholder="ex) 홍길동" name="rname"></td>
          </tr>
           <tr>
             <th>아이디</th>
             <td>
             <input type="text" placeholder="ex) xxxxx@handong.edu" name='remail'>
             </td>
           </tr>
           <tr>
             <th>비밀번호</th>
             <td><input type="password" placeholder="123456" name="rpassword"> 영문/숫자포함 6자 이상</td>
           </tr>
           <tr>
             <th>비밀번호 확인</th>
             <td><input type="password" placeholder="위와 동일" name="rpasswordCheck"></td>
           </tr>
            <tr>
              <th>핸드폰 번호</th>
               <td><input type="text"name="rtel1"> -
                   <input type="text" name="rtel2"> -
                   <input type="text" name="rtel3">
               </td>
              </tr>
              <tr>
                 <th> 은행</th>
                 <td><input type="text" placeholder="ex) 기업은행" name="rcard_type"></td>
              </tr>
              <tr>
              <th>카드 번호 등록</th>
                <td><input type="text" name="rcard1"> -
                    <input type="text" name="rcard2" title="카드번호" > -
                    <input type="text" name="rcard3"> -
                    <input type="text" name="rcard4">
                 </td>
             </tr>
               <tr height="2" bgcolor="#FFC8C3"><td colspan="2"></td></tr>
               <tr>
                 <td colspan="2" align="center">
                   <input type="submit" value="회원가입">
                   <input type="reset" value="취소">

                </td>
               </tr>
               </table>
              </td>
              </tr>
              </form>
            </div>
   </div>

 </body>
</html>
<script>
function enterkey() {
  if (window.event.keyCode == 13) {             // 엔터키가 눌렸을 때 실행할 내용
           getList(-1)
         }
}
function registerCheck() {
  alert("1234");
  var rname = <?=$rname?>;
  var rpassword = <?=$rpassword?>;
  var rpasswordCheck = <?=$rpasswordCheck?>;
  var remail = <?=$remail?>;
  var rtel1 = <?=$rtel1?>;
  var rtel2 = <?=$rtel2?>;
  var rtel3 = <?=$rtel3?>;
  var rcard1 = <?=$rcard1?>;
  var rcard2 = <?=$rcard2?>;
  var rcard3 = <?=$rcard3?>;
  var rcard4 = <?=$rcard4?>;
  var rcard_type = <?=$rcard_type?>;

  if(rname.value == "") {
    alert("이름을 입력하세요");
    rname.focus;
    return false;
  }
  if(remail.value == "") {
    alert("아이디를 입력하세요");
    remail.focus;
    return false;
  }
  if(rpassword.value == "") {
    alert("패스워드를 입력하세요");
    rpassword.focus;
    return false;
  }
  if(rpassword.value != rpasswordCheck.value) {
    alert("패스워드가 일치하지 않습니다.");
    rpassword.focus();
    return false;
  }
  if(rtel1.value == "" || rtel2.value== "" || rtel3.value=="") {
    alert("번호를 입력하세요");
    rtel1.focus;
    return false;
  }
  if(rcard1.value == "" || rcard2.value == "" || rcard3.value == "" ||rcard4.value=="") {
    alert("카드를 입력하세요");
    rcard1.focus;
    return false;
  }
  if(rcard_type.value == "") {
    alert("은행을 입력하세요");
    rcard_type.focus;
    return false;
  }
  return true;
  // window.location.reload();
}

  <?php require_once('js/register.js') ?>
</script>
