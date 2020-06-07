<?php
	$isDB = true;
	require_once('../inc/top.php');

	$id=$_GET['id'];
	$editSave_url = $curpath."showDetail/orderItemSave.php";

	function menuList($id, $conn){

		$str = '<select name= "menu1" id= "menu1">';
		$sql ='SELECT * FROM menu_list where rest_id = ';
		$sql.=$id;
		$result = mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$str .= '<option value="'.$row['menu_name'].'"';
				$str .= ">".$row['menu_name']."</option>\n";
			}//while
		}//if
		$str .= "</select>";
	  echo $str;
	}

	function cardList($user_id, $conn){
		// user_id를 받아줘야댐
		$str = '<select name= "card_num" id= "card_num">';

		$sql ='SELECT * FROM user_card where user_id = 1' ;
		//$sql.=$user_id;
		$result = mysqli_query($conn, $sql);
		if (!$result){
			die('Error: ' . mysqli_error($conn));
		}
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$str .= '<option value="'.$row['card_num'].'"';
				$str .= ">".$row['card_num']."</option>\n";
			}//while
		}//if
		$str .= "</select>";
		echo $str;
	}
?>

		<div class="totalWrapper">
			<div class="submitWrapper">
				<h4><i class="fas fa-edit"></i>&nbsp;&nbsp; 주문하기</h4>
				<hr/>
<?php
  $prev_page = "http://15.164.230.147/handong/showDetail/main.php";

	$sql ="SELECT * FROM restaurant_info WHERE rest_id = '$id'";
	$result = mysqli_query($conn,$sql);
	if (!$result){
		die('Error: ' . mysqli_error($conn));
	}
	if($item = $result->fetch_assoc()){
?>
				<div class="newWrapper">
					<form action="<?=$editSave_url?>" method="post">

            <input type='hidden' name='rest_id' value='<?=$id?>'>
						<input type='hidden' name='user_id' value='1'>
            <!--  user_id    <input type='hidden' name='user_id' value=''> -->
            <span class='newDesc'>메뉴 :&nbsp;&nbsp;</span>
						<?php menuList($id, $conn); ?>

            <span class='newDesc'> 결제 카드 번호 :&nbsp;&nbsp;</span>
						<?php cardList($id, $conn); ?>

            <span class="newDesc">요청사항: &nbsp;&nbsp;</span>
            <input type="text" id="request" name="request" value="요청 사항"><br><br>

            <input type="submit" class="newButton" id="newSubmit" value="주문하기">

          </form>

					<form name="form_prev" method="post" action="<?=$prev_page?>">
						<input type="hidden" name="step" value="1" >
						<button type="submit" class="newButton" id="prev_button" ><i class="fas fa-arrow-alt-circle-left"></i>&nbsp;목록으로</button>
					</form>
				</div><!--newWrapper-->
<?php
	}
?>
			</div><!--submitWrapper-->
		</div><!--totalWrapper-->
	</body>
</html>
