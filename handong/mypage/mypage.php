<?php
  session_start();
  require_once('../inc/global.php');
  require_once('../inc/config.php');
  $id = $_SESSION['myId'];
  $index = 0;

  $sql = "USE db_project";
  mysqli_query($conn, $sql);

  /*
  $sql = "SELECT * FROM records AS R
    INNER JOIN records_menu AS M ON R.record_id=M.record_id
    LEFT JOIN menu_list AS L ON M.menu_id=L.menu_id
    LEFT JOIN restaurant_name AS N ON L.rest_id=N.rest_id
    WHERE R.user_id='$id'
    ORDER BY R.ord_date DESC";
  */
  $sql = "SELECT * FROM records AS R
    INNER JOIN records_menu AS M ON R.record_id=M.record_id
    LEFT JOIN menu_list AS L ON M.menu_id=L.menu_id
    LEFT JOIN restaurant_name AS N ON L.rest_id=N.rest_id
    LEFT JOIN restaurant_info AS I ON N.rest_id=I.rest_id
    WHERE R.user_id='$id'
    ORDER BY R.ord_date DESC";
  $sql2 = "SELECT ord_count FROM user WHERE user_id='$id'";

  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql2);

?>

<style>

  body {
    background-color: #E4E4E4;
  }

  .myPage {
    line-height: 30px;
  }

  .myInfo {
    position: relative;
    display: block;
    margin: 5px;
    padding: 15px;
    width: 95%;
    background-color: white;
  }

  .myOrders {
    position: relative;
    display: inline-block;
    margin: 5px;
    padding: 15px;
    width: 95%;
    background-color: white;
  }

  #details {
    text-align: center;
  }
  .detail {
    text-align: center;
  }

  .modal_open {
    border: none;
    border-radius: 4px;
    width: 40px;
    height: 30px;
  }

  .modal {
    display: none;
    position: fixed;
    vertical-align: center;
    width:100%;
    height:100%;
    z-index:1;

  }

  .modal h2 {
    margin:0;
  }

  .modal button {
    display:inline-block;
    width:100px;
    margin-left:calc(100% - 100px - 10px);
  }

  .modal .modal_content {
    width:300px;

    margin-left:calc(47.5%);
    margin-top:calc(10%);
    padding:20px 10px;
    background:#fff;
    border:2px solid #666;
    border-radius: 8px;
  }

  .modal .modal_layer {
    position: absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0, 0, 0, 0.5);
    z-index:-1;
  }

  table {
    border-collapse: collapse;
    width: 80%;
  }


  .line {
    border-top: 1px solid #DCDCDC;
  }

  th {
    text-align: left;
    padding-left: 10px;
  }

  td {
    padding-left: 10px;
  }

</style>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="myPage">
  <div class="myInfo">
    <h2>기본 정보</h2><hr/><br/>
    <!--
    <div class="name">이름: <?=$_SESSION["myName"]?>&nbsp;</div>
    <div class="email">이메일: <?=$_SESSION["myEmail"]?></div>
    <div class="total">주문 횟수: <?=$_SESSION["myOrdCnt"]?></div> -->
<?php
  $results = mysqli_fetch_assoc($result2);
  $count = $results["ord_count"];
?>
    <table cellpadding="2" style="width:auto">
      <tr>
        <td>이름:</td>
        <td><?=$_SESSION["myName"]?></td>
      </tr>
      <tr>
        <td>이메일:</td>
        <td><?=$_SESSION["myEmail"]?></td>
      </tr>
      <tr>
        <td>주문 횟수:</td>
        <td><?=$count?></td>
      </tr>
    </table>
  </div>
  <div class="modal" id="modal_<?=$index?>" style="display:none;">
      <div class="modal_content">
          <h2>주문 내역</h2><hr/>
          <p id="m_rest_name"></p>
          <p id="m_menu_name"></p>
          <p id="m_menu_price"></p>
          <p id="m_menu_delpay"></p>
          <p id="m_order_date"></p>
          <p id="m_used_card"></p>
          <button type="button" id="modal_close_btn">닫기</button>
      </div>
      <div class="modal_layer"></div>
  </div>
  <div class="myOrders">
    <h2>최근 주문 내역</h2><hr/><br/>
    <div class="recentOrders">
      <table cellpadding="7">
        <th>주문 날짜</th>
        <th>주문 식당</th>
        <th>주문 메뉴</th>
        <th class="detail">자세히 보기</th>
<?php
      $prerest = "";
      while($row = mysqli_fetch_assoc($result)) {
        $date = substr($row['ord_date'], 0, 10);

        echo "<tr><td class='line'>".$date."</td><td class='line'>".$row['rest_name']."</td><td class='line'>".$row['menu_name']."</td><td id='details' class='line'><button class='modal_open' id='open_".$index."'><i class='fa fa-calendar-plus-o' aria-hidden='true'></i></button></td></tr>"; ?>
<script>
  var open = "#open_N";
  var modal = ".modal";
  var close = "#modal_close_btn";

  open = open.replace("N", <?=$index?>);

  $(open).click(function(){
    var menu = "<?=$row['menu_name']?>";
    var price = Number("<?=$row['price']?>");
    var delPay = Number("<?=$row['delPay']?>");
    var pricewc = price.toLocaleString();
    var delPaywc = delPay.toLocaleString();
    var cardNum = "<?=$row['card_num']?>";
    var cArray = cardNum.split("-");
    var cResult = cArray[0] + "-" + cArray[1] + "-****-" + cArray[3];
    $(modal).attr("style", "display:block");
    document.getElementById("m_rest_name").innerHTML = "<b>주문 식당:</b> &nbsp;&nbsp;" + "<?=$row['rest_name']?>";
    document.getElementById("m_menu_name").innerHTML = "<b>주문 메뉴:</b> &nbsp;&nbsp;" + menu;
    document.getElementById("m_menu_price").innerHTML = "<b>메뉴 가격:</b> &nbsp;&nbsp;" + pricewc + "원";
    document.getElementById("m_menu_delpay").innerHTML = "<b>배달 비용:</b> &nbsp;&nbsp;" + delPaywc + "원";
    document.getElementById("m_order_date").innerHTML = "<b>주문 날짜:</b> &nbsp;&nbsp;" + "<?=$row['ord_date']?>";
    document.getElementById("m_used_card").innerHTML = "<b>결제 수단:</b> &nbsp;&nbsp;" + cResult;
  });

  $(close).click(function(){
    $(modal).attr("style", "display:none");
  });
</script>
<?php
        $index += 1;

      }?>
    </table>
    </div>
  </div>
</div>
</body>
