$(document).ready(function(){
	var page = "<?=$get_url?>".split("/");
  var path = window.location.pathname;
	selectedMenu(page[page.length-1]);
	$(".baedalContent").load("<?=$get_url?>");
});

function listUp() {
  selectedMenu('restList.php');
  $(".baedalContent").load("<?=$restlist_url?>", function() {
		//alert("success");
	});
	//alert("success");
}

function recommendationUp() {
	// index.php 이름 바꾸면 좋을듯?
	selectedMenu('recom.php');
	$(".baedalContent").load("<?=$recommendation_url?>", function() {
		//alert("success");
	});
}

function mypageUp() {
	selectedMenu('mypage.php');
	$(".baedalContent").load("<?=$mypage_url?>", function() {
		//alert("success");
	});
}
function appinfoUp() {
	selectedMenu('appinfo.php');
	$(".baedalContent").load("<?=$appinfo_url?>", function() {
		//alert("success");
	});
}

function selectedMenu(page){
  //alert('select check');
	//var currentItem = document.getElementsByClassName('studentTitle');
	if(page == 'restList.php'){
		$('#menu1').attr('class','nav-link active');
		$('#menu2').attr('class','nav-link');
		$('#menu3').attr('class','nav-link');
		$('#menu4').attr('class','nav-link')
	}
	if(page == 'recom.php'){
		$('#menu1').attr('class','nav-link');
		$('#menu2').attr('class','nav-link active');
		$('#menu3').attr('class','nav-link');
		$('#menu4').attr('class','nav-link')
	}
	if(page == 'mypage.php') {
		$('#menu1').attr('class','nav-link');
		$('#menu2').attr('class','nav-link');
		$('#menu3').attr('class','nav-link active');
		$('#menu4').attr('class','nav-link')
	}
	if(page == 'appinfo.php') {
		$('#menu1').attr('class','nav-link');
		$('#menu2').attr('class','nav-link');
		$('#menu3').attr('class','nav-link');
		$('#menu4').attr('class','nav-link active')
	}
	if(page == 'myInfo.php' || page == 'changePassword.php' || page =="newPassword.php"){
		$('#menu1').attr('class','nav-link active');
		$('#menu2').attr('class','nav-link');
		$('#menu3').attr('class','nav-link');
	}

}

</script>
