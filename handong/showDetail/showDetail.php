<?php
	$isDB = true;
  require_once('../inc/config.php');
	$prev_page = "http://15.164.230.147/handong/index.php";

	$id=$_GET['id'];
?>
<html>
<style>

.page_nav {
	margin: 0 auto;
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
	 width: 350px;
	 padding: 10px;
	 vertical-align: top;
	 border-right: 1px solid #ccc;
	 border-bottom: 1px solid #ccc;
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

</style>
<script>

</script>
</html>


    <h4><i class="fas fa-edit"></i>&nbsp;&nbsp;식당 세부사항 보기</h4>
    <hr/>
		  <div class="listWrapper">
				<div class="table_responsive">
				  <table class="type08">
						<h3> 식당 세부사항 </h3>
					  <thead class="thead_light">
							<tr class="itemList List" style="color:white">
					      <th>카테고리 번호&nbsp;</th>
							  <th>최근 주문 횟수&nbsp;</th>
							  <th>한동 제휴 샵&nbsp;</th>
							  <th>평균 별점&nbsp;</th>
						  </tr>
						</thead>
				  	<tbody>
<?php
  $sql = "SELECT * FROM restaurant_info where rest_id = $id";
	//echo $sql; //디버깅 모드일 때, sql문 출력

	$result = mysqli_query($conn,$sql);
	if($item = $result->fetch_assoc()){
?>
		          <tr>
							  <td><?=$item['category_id']?></td>
							  <td><?=$item['recent_ordCnt']?></td>
								<td><?php if(empty($row['hgu_alli'])) echo "X"; else echo $row["hgu"]; ?></td>
								<td><?=$item['avg_star']?></td>
							</tr>
<?php
} // if문
?>
					  </tbody>
					</table> <!-- table 정리 -->

					<table class="type08">
					<h3> 식당 메뉴 </h3>
					<thead class="thead_light">
						<tr class='mileageList'>
							<th>번호&nbsp;</th>
							<th>메뉴 이름&nbsp;</th>
							<th>가격&nbsp;</th>
						</tr>
					</thead>

					<tbody>
<?php
  $sql = "SELECT * FROM menu_list where rest_id = $id";

  $result = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result);
  if ($rowcount > 0) {
		while($row = mysqli_fetch_assoc($result)) {
?>
		          <tr class='mileageList List'>
							  <td><?=$rowcount?></td>
							  <td><?=$row['menu_name']?></td>
								<td><?=$row['price']?></td>
							</tr>
<?php
		$rowcount--;
		} //while문
  }
  else echo "0 results";
?>
					</tbody>
				</table> <!-- table 정리 -->

<?php
  $sql = "SELECT * FROM restaurant_coupon  where rest_id = $id";
  $result = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result);
  if ($rowcount > 0) {
?>
					<table class="type08">
					<h3> 식당 쿠폰 </h3>
					<thead class="thead_light">
						<tr class='mileageList'>
							<th>번호&nbsp;</th>
							<th>쿠폰 할인 금액&nbsp;</th>
							<th>최소 금액&nbsp;</th>
							<th>설명 &nbsp;</th>
						</tr>
					</thead>
<?php
  }
?>
					<tbody>
<?php
  $sql = "SELECT * FROM restaurant_coupon  where rest_id = $id";
  $result = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result);
  if ($rowcount > 0) {
		while($row = mysqli_fetch_assoc($result)) {
?>
		          <tr class='mileageList List'>
							  <td><?=$rowcount?></td>
							  <td><?=$row['discount_amt']?></td>
								<td><?=$row['min_price']?></td>
								<td><?=$row['description']?></td>
							</tr>
<?php
		$rowcount--;
		} //while문
  }
?>
					</tbody>
				</table> <!-- table 정리 -->

				<table class="type08">
				<h3> 식당 리뷰 </h3>
					<thead class="thead_light">
						<tr class='mileageList'>
							<th>번호&nbsp;</th>
							<th>메뉴 이름&nbsp;</th>
							<th>리뷰 &nbsp;</th>
						</tr>
					</thead>

					<tbody>
<?php
  $sql = "SELECT * FROM restaurant_review where rest_id = $id";

  $result = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result);
  if ($rowcount > 0) {
		while($row = mysqli_fetch_assoc($result)) {
?>
		          <tr class='mileageList List'>
							  <td><?=$rowcount?></td>
							  <td><?=$row['ord_menu']?></td>
								<td 	style ='width: auto;' ><?=$row['review']?></td>
							</tr>
<?php
		$rowcount--;
		} //while문
  }
  else echo "0 results";
?>
					</tbody>
				</table> <!-- table 정리 -->

			</div><!--table_responsive-->

		    <div class="buttonBox">
					<form name="form_prev" method="post" action="<?=$prev_page?>">
		        <input type="hidden" name="step" value="1" >
		        <button type="submit" class="newButton" id="prev_button" ><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;목록으로</button>
		      </form>
		    </div>
		  </div><!--listWrapper-->
