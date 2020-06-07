<!-- 마일리지 세부항목 리스트 표에 표시되는 내용 -->
<?php
	$isDB = true;
	require_once('../inc/global.php');

	$isSearch = $_POST['search_ok'];
	$search_select = $_POST['search_select'];
	$search_input = $_POST['search_input'];
	$cate_select = $_POST['category_select'];
	$edit_url = $curpath."showDetail/showDetail.php?id=";
	$order_url = $curpath."showDetail/orderItem.php?id=";
	// @Paging
	$page = $_POST['page'];
	//print $isSearch;
	//print $search_select;
	//print $search_input;
	if(!$page)
		$page = 1;
	else
		$page = (int)$page;
	 $limit = 10;

	 // $count_sql = "SELECT count(*) AS cnt FROM restaurant_info AS ri";
	 //
		// $result1 = mysqli_query($conn, $count_sql);
		// $row = mysqli_fetch_array($result1);
		// //print $row['cnt'];
		// $cnt = ceil($row['cnt']/10)*10;
		// 168개
	$sql = "SELECT ri.rest_id as id, rn.rest_name as rname, rp.phone as phone, cate.category_name as cname, ri.avg_star as star, ri.avg_time as dtime, ri.region as region, ri.delPay as dpay, ri.businessHour as hour, ri.hgu_alli as hgu, ri.likeNum as like_num
	FROM restaurant_info AS ri
	INNER JOIN restaurant_name as rn on ri.rest_id = rn.rest_id
	INNER JOIN restaurant_phone as rp on ri.rest_id = rp.rest_id
	INNER JOIN category as cate on ri.category_id = cate.category_id";

	$strCate = "";
	if($cate_select == "pizza") {
		$strCate = " cate.category_name= '피자' ";
	}
	else if($cate_select == "asian food") {
		$strCate = " cate.category_name= '아시안, 양식' ";
	}
	else if($cate_select == "tang") {
		$strCate = " cate.category_name= '찜,탕' ";
	}
	else if($cate_select == "chicken") {
		$strCate = " cate.category_name= '치킨' ";
	}
	else if($cate_select == "jokbal") {
		$strCate = " cate.category_name= '족발, 보쌈' ";
	}
	else if($cate_select == "dosirak") {
		$strCate = " cate.category_name= '도시락' ";
	}
	else if($cate_select == "bunsik") {
		$strCate = " cate.category_name= '분식' ";
	}
	else if($cate_select == "donkkas") {
		$strCate = " cate.category_name= '돈까스, 회, 일식' ";
	}
	else if($cate_select == "chineses food") {
		$strCate = " cate.category_name= '중식' ";
	}
	else if($cate_select == "korean food") {
		$strCate = " cate.category_name= '한식' ";
	}
	else if($cate_select == "cafe") {
		$strCate = " cate.category_name= '카페' ";
	}
	else if($cate_select == "fast food") {
		$strCate = " cate.category_name= '패스트푸드' ";
	}
	 $strWhere = "";
	if($search_select == "rname") {
	 	// 가게명 or 카테고리명 or 동네명
	 	 if($search_input) $strWhere .= " rn.rest_name LIKE '%".$search_input."%' ";
	}
	else if($search_select == "cname") {
		if($search_input) $strWhere .= " cate.category_name LIKE '%".$search_input."%' ";
	}
	else if($search_select == "region") {
		if($search_input) $strWhere .= " ri.region LIKE '%".$search_input."%' ";
	}
	if(!($strWhere == "") && !($strCate == "")) $sql .= " where ".$strWhere. " and ".$strCate;
	else if(!(empty($strCate))) {
		$sql .= " where ".$strCate;
	}
	else if(!(empty($strWhere))) {
		$sql .= " where ".$strWhere;

	}

	//print $sql;
	$count_sql = "SELECT count(*) as cnt from "."(".$sql.")".CNT;
	//$count_sql = "SELECT count(*) AS cnt FROM restaurant_info AS ri";
	$result1 = mysqli_query($conn, $count_sql);
	$row_cnt = mysqli_fetch_array($result1);
	//print $row['cnt'];
	$cnt = ceil($row_cnt['cnt']/10)*10;
	//print $count_sql;
	$sql .=" Limit ".(($page - 1)*$limit).",". $limit;
//	print $cnt;
  $result = mysqli_query($conn, $sql);
	//print $sql;
?>
<input type="hidden" name="sortitem" value="">
<table class="type08">
  <thead class="thead_light">
    <tr class="itemList List">
    <th>번호</th>
    <th>가게명&nbsp;&nbsp;
    </th>
    <th>연락처&nbsp;&nbsp;
    </th>
    <th>카테고리명&nbsp;&nbsp;
    </th>
    <th>평균 별점&nbsp;&nbsp;
    </th>
    <th>배달 시간&nbsp;&nbsp;
    </th>
    <!-- <th>배달 지역&nbsp;&nbsp;
    </th> -->
		<th>최소금액&nbsp;&nbsp;
    </th>
		<!-- <th>영업 시간&nbsp;&nbsp;
		</th> -->
		<th>한동 제휴&nbsp;&nbsp;
		</th>
    <th>추천 수</th>
		<th>상세 보기</th>
		<th>주문하기</th>
   </tr>
  </thead>
  <tbody>
<?php
    $num = $cnt - ($page-1) * $limit; //번호는 역순으로 보이도록
    if($cnt != 0){
      while($row = mysqli_fetch_assoc($result)) {
				$restId = $row['id'];
// rname, phone, cname, star, dtime, region, dpay, hour, hgu, like_num
?>
        <tr id='itemList_data".$num."' class='itemList List'>
        	<td class='iL_col1' style="font-weight:bold;"><?=$row["id"]?></td>
        	<td class='iL_col2'><?=$row["rname"]?></td>
        	<td class='iL_col6'><?=$row["phone"]?></td>
        	<td class='iL_col3'><?=$row["cname"]?></td>
        	<td class='iL_col4'><?=$row["star"]?></td>
        	<td class='iL_col5'><?php
					if(strpos($row["dtime"], "분")!== false)
						echo $row["dtime"];
					else echo $row["dtime"]."분";
					?>
						</td>
					<!-- <td class='iL_col6'><?=$row["region"]?></td> -->
					<td class='iL_col7'><?=$row["dpay"]?></td>
					<!-- <td class='iL_col8'><?=$row["hour"]?></td> -->
					<td class='iL_col9'><?php if(empty($row['hgu'])) echo "X"; else echo $row["hgu"]; ?></td>
					<td class='iL_col10'><?=$row["like_num"]?></td>
					<td class='i:_col11'><button id='icon' class='datail' onclick='showDetail("<?=$restId?>")'> <i class="fas fa-info-circle" style=></i></button></td>
					<td class='i:_col12'><button id="icon" class='order' onclick='order("<?=$restId?>")'><i class="fas fa-money-check-alt"></i></button></td>
      	</tr>
<?php
        $num--;
        }
      }
			else {
?>
<script>
	$(".ifcheck").html("검색 결과가 없습니다.");


</script>
	<?php
}
	 ?>
  </tbody>
</table>
<p class="ifcheck" style="margin-left:450px; font-weight:bold;"></p>

<div class="page_nav" style="margin-left:400px;">
<?php
	//@Paging
	require('../inc/paging.php');
?>
</div>
<html>
<style>

.page_nav {
	margin: 0 auto;
}

#icon{
	background: none;
	border: none;
	outline: none;
	cursor: pointer;
}

table.type08 {
	 border-collapse: collapse;
	 text-align: left;
	 line-height: 1.5;
	 border-left: 1px solid #ccc;
	 margin: 20px 10px;
}

table.type08 thead th {
	 padding: 10px;
	 color: white;
	 border-top: 1px solid #ccc;
	 border-right: 1px solid #ccc;
	 border-bottom: 2px solid grey;
	 background: grey;
	 text-align: center;

}
table.type08 tbody th {
	 width: 150px;
	 padding: 10px;
	 vertical-align: top;
	 border-right: 1px solid #ccc;
	 border-bottom: 1px solid #ccc;
	 background: #ececec;
}
table.type08 td {
	 padding: 10px;
	 vertical-align: top;
	 border-right: 1px solid #ccc;
	 border-bottom: 1px solid #ccc;
	 text-align: center;
}

.restList{
	list-style:none;
	float:left;
	display:inline;
}
.paging {
	display: inline-block;
}
.restList .paging{
	text-align: center;
}
.restList .paging a {
	float:left;
	padding:4px;
	margin-right:3px;
	width:30px;
	color:#000;
	font:bold 12px tahoma;
	border:1px solid #eee;
	text-align:center;
	text-decoration:none;
}
.restList .paging a:hover, .restList .paging a:focus, .restList .paging .current{
	color:#fff;
	border:1px solid #f40;
	background-color:#f40;
}

.datail {
	font-size: 20px;
}
.order {
	font-size: 20px;
}


</style>
<script>

function showDetail(id){
$( ".listWrapper" ).text('').load("<?=$edit_url?>" + id);
}
function order(id){
$( ".listWrapper" ).text('').load("<?=$order_url?>" + id);
}
</script>
</html>
