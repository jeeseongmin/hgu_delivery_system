<!-- 메인메뉴의 [마일리지 카테고리] 선택시 발생하는 메인 페이지 -->
<?php
header('Content-Type: text/html; charset=utf-8');

	$isDB = true;
	define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(__ROOT__.'/inc/top.php');

	$edit_url = $curpath."showDetail/showDetail.php?id=";
	$order_url = $curpath."showDetail/orderItem.php?id=";
?>

<script>
function showDetail(id){
  $( ".listWrapper" ).text('').load("<?=$edit_url?>" + id);
}
function order(id){
  $( ".listWrapper" ).text('').load("<?=$order_url?>" + id);
}
</script>

		<form action="" name="form1" method="post">
			<input type="hidden" name="id">
		</form>

		<h3> 식당 리스트</h3><br/>
		<div class="list_button_size">
		  <div class="listWrapper">
				<div class="table_responsive">
				  <table class="table table_bordered">
				  	<tbody>
<?php

  $sql = "SELECT * FROM restaurant_info";
	//echo $sql; //디버깅 모드일 때, sql문 출력

  $result = mysqli_query($conn, $sql);
  $rowcount = mysqli_num_rows($result);
  if ($rowcount > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$restId = $row['rest_id'];
?>
		          <tr class='mileageList List'>
							  <td><?=$rowcount?></td>
							  <td><?=$row['rest_id']?></td>
							  <td><?=$row['recent_ordCnt']?></td>
							  <td>
                  <button class='listbutton edit' onclick='showDetail("<?=$restId?>")'>&nbsp;<i class="fas fa-info"></i>&nbsp;</button>&nbsp;
									<button class='listbutton edit' onclick='order("<?=$restId?>")'>&nbsp;<i class="far fa-clipboard"></i>&nbsp;</button>&nbsp;
								</td>
							</tr>
<?php
		$rowcount--;
		} //while문
  }
  else echo "0 results";
?>
					  </tbody>
					</table>
				</div><!--table_responsive-->
		  </div><!--listWrapper-->
		</div>
	</body>
</html>
