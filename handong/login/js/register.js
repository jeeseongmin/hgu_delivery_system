$(document).ready(function(){
  //alert("start");
});
function registerCheck() {
  var rname = document.getElementById("rname");
  var rpassword = document.getElementById("rpassword");
  var rpasswordCheck = document.getElementById("rpasswordCheck");
  var remail = document.getElementById("remail");
  var rtel1 = document.getElementById("rtel1");
  var rtel2 = document.getElementById("rtel2");
  var rtel3 = document.getElementById("rtel3");
  var rcard1 = document.getElementById("rcard1");
  var rcard2 = document.getElementById("rcard2");
  var rcard3 = document.getElementById("rcard3");
  var rcard4 = document.getElementById("rcard4");

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
  return true;
  // window.location.reload();
}

function register(){
  // if(registerCheck()) {
  // if(true) {
    alert("체크 시작!");
    $.ajax({
      // url: '<?=$register_url?>',
      url : '',
      method: "POST",
      data: {
        rname : $('#rname').val(),
        remail : $('#remail').val(),
        rpassword : $('#rpasswrod').val(),
        rtel1 : $('#rtel1').val(),
        rtel2 : $('#rtel2').val(),
        rtel3 : $('#rtel3').val(),
        rcard1 : $('#rcard1').val(),
        rcard2 : $('#rcard2').val(),
        rcard3 : $('#rcard3').val(),
        rcard4 : $('#rcard4').val(),
      },
      success: function(data) {
        // alert("회원가입되었습니다.<br> 로그인하세요.");
        // window.location.reload();
      }
    });
  // }
  // else return false;
  //alert("<?=$list_url?>");
  return false;
}
