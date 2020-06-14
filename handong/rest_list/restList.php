<?php
  define('__ROOT__', dirname(dirname(__FILE__)));
  //require_once(__ROOT__.'/inc/top.php');
  //require_once(__ROOT__.'/inc/functions.php');
  $register_url = $curpath."login/registerCheck.php";
  $list_url = $curpath."rest_list/fetch_rest_list.php";
?>
<!-- 검색 항목 :  가게명, 카테고리명, -->
<h4 class="h2">Restaurant List</h4>
  <div class="listWrapper">
  			<div id="list_search_box">
  				<form id="itemListSearchForm" onsubmit="return false">
            <select class='itemListSearchInput ListSearchInput ListSearchInputMiddle' name='searchCol' id='category_select'>
              <option value='' selected>카테고리</option>
              <option value='pizza'>피자</option>
              <option value='asian food'>아시안, 양식</option>
              <option value='tang'>찜,탕</option>
              <option value='chicken'>치킨</option>
              <option value='jokbal'>족발, 보쌈</option>
              <option value='dosirak'>도시락</option>
              <option value='bunsik'>분식</option>
              <option value='donkkas'>돈까스, 회, 일식</option>
              <option value='chineses food'>중식</option>
              <option value='korean food'>한식</option>
              <option value='cafe'>카페</option>
              <option value='fast food'>패스트푸드</option>

            </select>&nbsp;
            <select class='itemListSearchInput ListSearchInput ListSearchInputMiddle' name='searchCol' id='search_select'>
  						<option value='' selected>검색항목</option>
              <option value='rname'>가게명</option>
              <option value='region'>배달 지역</option>
  					</select>&nbsp;
  					<input class='itemListSearchInput ListSearchInput' type='text' name='searchValue' id='search_input' placeholder="검색어 입력">

  					<input type="button" class="searchbutton ListSearch" id="ListSearch" onclick="getList(-1)" value="검색" name="itemListSearch" onkeyup="enterkey()">
  				</form>

  				<!--excel down button-->
  				<div class="blank"></div>

  			</div><!--list_search_box-->

  			<!-- fetch_subitem_list ajax -->
  			<form action="" name="form1" method="post">
  				<input type="hidden" name="id">
  				<input type="hidden" name="semester">
  			</form>
          <div id="table_responsive" class="table_responsive"></div>
</div>
  <script>
  function enterkey() {
    if (window.event.keyCode == 13) {             // 엔터키가 눌렸을 때 실행할 내용
             getList(-1)
           }
         }

    <?php require_once('../rest_list/js/restList.js') ?>
  </script>
