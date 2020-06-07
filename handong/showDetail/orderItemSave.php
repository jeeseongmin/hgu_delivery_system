<!-- 수정하기 js - 수정 완료시 발생 -->
<?php
	header('Content-Type: text/html; charset=utf-8');
	$isDB = true;
	require_once('../inc/global.php');
  $prev_page = "http://15.164.230.147/handong/showDetail/main.php";
	//
	function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

	$postId = test_input($_POST['id']);

	$rest_id = test_input($_POST['rest_id']);
	$user_id = test_input($_POST['user_id']);
	$card_num = test_input($_POST['card_num']);
	$request = test_input($_POST['request']);
	$menu_name = test_input($_POST['menu1']);
	$ord_date	= test_input(date("Y-m-d H:i:s",time()));

		$sql = "INSERT INTO records(rest_id, user_id, card_num, request, ord_date)
						VALUES('$rest_id', '$user_id', '$card_num', '$request', '$ord_date' )";


		mysqli_set_charset($conn, "utf8");
    if(mysqli_query($conn, $sql))
			$msg = '주문되었습니다.';
		else
			$msg = '실패하였습니다.';

		$sql = "SELECT record_id from records where ord_date = '$ord_date'";

		$result = mysqli_query($conn, $sql);
		if (!$result){
			die('Error: ' . mysqli_error($conn));
		}
		$row = mysqli_fetch_row($result);
		$record_id = test_input($row[0]);

		$sql = "SELECT menu_id from menu_list where menu_name = '$menu_name'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($result);
		$menu_id = test_input($row[0]);

		$sql = "INSERT INTO records_menu(record_id, menu_id)
						VALUES('$record_id', '$menu_id')";


    if(mysqli_query($conn, $sql))
			$msg = '주문되었습니다.';
		else
			$msg = '주문 실패하였습니다.';
?>

<form name="form1" method="post" action="<?=$prev_page?>">
	<input type="hidden" name="step" value="1">
</form>
<script>
	 alert("<?=$msg?>");
	 document.form1.submit();
</script>
