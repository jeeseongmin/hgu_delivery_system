<!--
로그인 시에
ID : 21500706@handong.edu
password : 123456
으로 접속하시면 됩니다.
 -->
<meta charset="UTF-8">
<!--<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="475479122726-ufn1uc0vumt2mdq9365jnjlsr3bd6dfp.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<style>
  body {
    background-image: url('food.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }

  .login {
  	width: 100%;
  	margin: 10% 0;
  	text-align:center;
  }
  .loginWrapper {
  	margin: auto;
  	padding: 2%;
  	display: inline-block;
  	min-width: 350px;
    background-color: white;
  	border: 3px solid #EAEAEA;
    border-radius: 8px;
  }

  .footer {
    position: absolute;
    display: inline-block;
    left: 0;
    right: 0;
    bottom : 0;
    max-width: 100%;
    height: 10%;
    padding-right: 20px;
    padding-bottom: 10px;
    text-align: right;
    background-color: lightgray;
    border: 3px solid #EAEAEA;
    font-size: 10pt;
  }
  .logo {
    float: left;
    background-image: url("logo.jpg");
    background-size: cover;
    width: 330px;
    height: 110%;
  }

  /*
  .loginButton {
    width: 80px;
    height: 30px;
    background-color: #FAF4C0;
    border: none;
    border-radius: 8px;
  }
  */
</style>

<body>
<div class="login">
  <div class="loginWrapper">
    <h3 class="loginDesc">HGU Delivery</h3><hr/>
    <!--<div class="g-signin2" data-onsuccess="onSignIn" style="margin-left:14.5%;margin-top:10%;" data-width="250"></div><br/>-->
    <div class="loginInputWrapper">
      <form name="login" id="login" action="check.php" method="post">
        <input type="text" name="userid" id="userid" style="height:25px;" placeholder="이메일" required><br/><br/>
        <input type="password" name="userpw" id="userpw" style="height:25px;" placeholder="비밀번호" required><br/><br/>
        <input type="submit" value="로그인" class="loginButton" id="loginSubmit"><br/><hr/><br/>
        <button type="button" onclick="location.href='register.php'" id="register">회원가입</button>
      </form>
    </div><!--loginInputWrapper-->
  </div><!--loginWrapper-->
</div><!--login-->
<div class="footer">
  <div class="logo">
  </div>
  <p>이영환 <a href="mailto:21500515@handong.edu">21500515@handong.edu</a>&nbsp;&nbsp;지성민 <a href="mailto:21500706@handong.edu">21500706@handong.edu</a></p>
  <p>김예찬 <a href="mailto:21600120@handong.edu">21600120@handong.edu</a>&nbsp;&nbsp;최승아 <a href="mailto:21800731@handong.edu">21800731@handong.edu</a></p>
</div>
</body>
<script>
function register() {
  alert("회원가입 ");
}
</script>
