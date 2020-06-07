
function showDetail(id){
  $( ".menu" ).text('').load("<?=$edit_url?>" + id); //
}

// $edit_url = "shwoDetail.php?id=";
// 배달 메뉴 있는 곳에서 내용을 대체할 div(menu)
// $row = mysqli_fetch_assoc($result)에서
// $restId = $row['rest_id'];
//<button class='listbutton edit' title="수정" onclick='showDetail("<?=$restId?>")'>&nbsp;<i class="fas fa-edit" ></i>&nbsp;</button>&nbsp;
