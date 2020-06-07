<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="./recommendation/recom.js"></script>
    <title>recommendation</title>
    <?php

    $edit_url = $curpath."showDetail/showDetail.php?id=";
    $order_url = $curpath."showDetail/orderItem.php?id=";

      $conn = mysqli_connect(
        '15.164.230.147',
        'test',
        'testtest',
        'sys',
        '3306');
      mysqli_query($conn, "set names utf8");

      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $sql = "USE db_project";
      if(mysqli_query($conn, $sql)) {
      } else {
      }
    ?>
    <style media="screen">
    table.type08 {
    	 border-collapse: collapse;
    	 text-align: left;
    	 line-height: 1.5;
    	 border-left: 1px solid #ccc;

       border-collapse: collapse;
       margin: auto;
       margin-bottom: 50px;
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
    	 table-layout: auto; width: 100%:
    	 padding: 10px;
    	 vertical-align: top;
    	 border-right: 1px solid #ccc;
    	 border-bottom: 1px solid #ccc;
       text-align: center;
    }

      .tab_wrap {
        text-align: center;
      }
      .tab_menu{
        overflow: hidden;
        margin-bottom: 20px;
        width: 100%;
      }
      button {
        background: none;
        border: none;
        outline: none;
        cursor: pointer;
      }
      .btn {
        float: left;
        width: 25%;
        height: 40px;
        transition: 0.3s all;
      }
      .btn:hover {
        color: #df0000;
      }
      .btn.on {
        border-bottom: 2px solid #df0000;
        font-weight: bold;
        color: #df0000;
      }

      .tab_box {
        display: none;
      }
      .tab_box.on {
        display: block;
      }
      .tb {
        border: 1px solid #444444;
        border-collapse: collapse;
        margin: auto;
      }
      th, td {
        border: 1px solid #444444;
        padding: 10px;
      }
      .godetail {
        cursor: pointer;
      }
      .datail {
        font-size: 20px;
      }
      .order {
        font-size: 20px;
      }

      .itemList_List {
        display : "";
      }
      .itemList_List_none{
        display : none;
        color : red;
      }


    </style>
  </head>

  <body>

    </div>

    <div class="tab_wrap">
      <div class="tab_menu">
        <button class="btn1 btn on" type="button" name="별점">
          별점 주문 수 기준
        </button>
        <button class="btn2 btn" type="button" name="별점">
          HGU Shop
        </button>
        <button class="btn3 btn" type="button" name="별점">
          User frequency
        </button>
        <button class="btn4 btn" type="button" name="별점">
          Min Price
        </button>
      </div>
      <div class="tab_box_container">
        <div class="tab_box1 tab_box on">
          <h3>평점이 4.9점 이상이고, 최근 주문수가 1000이 넘는 음식점</h3><br>
          <table class="type08">
            <tr class="itemList_List">
              <thead class="thead_light">
            <th>순서</th>
          	<th>식당 이름</th>
            <th>평점</th>
            <th>최근 주문수</th>
            <th>상세보기</th>
            <th>주문하기</th>
          </thead>
          </tr>
            <?php
            $index=1;
            $category1 = "select ri.rest_id, rn.rest_name, ri.avg_star, ri.recent_ordCnt from restaurant_info ri, restaurant_name rn where ri.recent_ordCnt > 1000 and ri.avg_star >= 4.9 and ri.rest_id = rn.rest_id ORDER BY ri.avg_star DESC, ri.recent_ordCnt DESC;
";
            $result1 = mysqli_query($conn, $category1);

            while( $row = mysqli_fetch_array( $result1 ) ) {
            ?>

              <tr>
                <td><?=$index?></td>
                <td><?=$row['rest_name']?></td>
                <td><?=$row['avg_star']?></td>
                <td><?=$row['recent_ordCnt']?></td>
                <td><button class='datail' onclick='showDetail("<?=$row['rest_id']?>")'> <i class="fas fa-info-circle"></i></button></td>
                <td><button class='order' onclick='order("<?=$row['rest_id']?>")'> <i class="fas fa-money-check-alt"></i></button></td>
              </tr>
            <?php
            $index=$index+1;
            }
            ?>

          </table>
        </div>
        <div class="tab_box2 tab_box">
          <h3>한동대학교 제휴 할인 음식점</h3><br>
          <table class="type08">
            <tr class="itemList_List">
              <thead class="thead_light">            <th>순서</th>
          	<th>식당 이름</th>
            <th>한동 제휴 혜택</th>
            <th>상세보기</th>
            <th>주문하기</th>
          </thead>
        </tr>

            <?php
            $index=1;
            $category2 = "select ri.rest_id, rn.rest_name,ri.hgu_alli from restaurant_info ri, restaurant_name rn where length(ri.hgu_alli) > 0 and ri.rest_id = rn.rest_id";
            $result2 = mysqli_query($conn, $category2);

            while( $row = mysqli_fetch_array( $result2 ) ) {
            ?>

            <tr>
              <td><?=$index?></td>
              <td><?=$row[ 'rest_name' ]?></td>
              <td><?=$row[ 'hgu_alli' ]?></td>
              <td><button class='datail' onclick='showDetail("<?=$row['rest_id']?>")'> <i class="fas fa-info-circle"></i></button></td>
              <td><button class='order' onclick='order("<?=$row['rest_id']?>")'><i class="fas fa-money-check-alt"></i></button></td>
            </tr>

            <?php
            $index=$index+1;
            }

            ?>

            </table>
        </div>

        <div class="tab_box3 tab_box">
          <h3>이용자가 가장 많이 시켜먹은 음식점 Top5</h3><br>
          <table class="type08">
            <tr class="itemList_List">
              <thead class="thead_light">
            <th>순서</th>
            <th>식당 이름</th>
            <th>이용 횟수</th>
            <th>상세보기</th>
            <th>주문하기</th>
          </thead>
        </tr>

            <?php
            $index=1;
            $category3 = "select rn.rest_id,rn.rest_name, count(record_id)  from records r, restaurant_name rn where user_id = 1 and r.rest_id = rn.rest_id group by rn.rest_name,rn.rest_id  order by count(record_id) desc limit 5";
            $result3 = mysqli_query($conn, $category3);

            while( $row = mysqli_fetch_array( $result3 ) ) {
            ?>
            <tr>
              <td><?=$index?></td>
              <td><?=$row[ 'rest_name' ]?></td>
              <td><?=$row[ 'count(record_id)' ]?></td>
              <td><button class='datail' onclick='showDetail("<?=$row['rest_id']?>")'> <i class="fas fa-info-circle"></i></button></td>
              <td><button class='order' onclick='order("<?=$row['rest_id']?>")'><i class="fas fa-money-check-alt"></i></button></td>
            </tr>
            <?php
            $index=$index+1;
            }
            ?>
          </table>
        </div>

        <div class="tab_box4 tab_box">
          <h3>최소 주문 금액 20000원 이하인 식당</h3><br>
          <table class="type08">
            <tr class="itemList_List">
              <thead class="thead_light">
              <th>순서</th>
              <th>식당 이름</th>
              <th>최소 배달 가능 금액</th>
              <th>상세보기</th>
              <th>주문하기</th>
                </thead>
            </tr>
            <?php
            $index=1;
            $category4 = "select rn.rest_id, rn.rest_name, ri.min from restaurant_info ri, restaurant_name rn where ri.min < 20000 and ri.rest_id = rn.rest_id order by min asc limit 10";
            $result4 = mysqli_query($conn, $category4);

            while( $row = mysqli_fetch_array( $result4 ) ) {
            ?>
            <tr>
              <td><?=$index?></td>
              <td><?=$row[ 'rest_name' ]?></td>
              <td><?=$row[ 'min' ]?></td>
              <td><button class='datail' onclick='showDetail("<?=$row[ 'rest_id' ]?>")'> <i class="fas fa-info-circle"></i></button></td>
              <td><button class='order' onclick='order("<?=$row[ 'rest_id' ]?>")'><i class="fas fa-money-check-alt"></i></button></td>
            </tr>
            <?php
            $index=$index+1;
            }
            ?>
          </table>
        </div>
      </div>
    </div>


    <script type="text/javascript">

      $('.btn').on('click', function(){
        $('.btn').removeClass('on');
        $(this).addClass('on');

        var idx = $('.btn').index(this);
        $('.tab_box').hide();
        $('.tab_box').eq(idx).show();
      });

      // $(document).ready(function(){
      //   var modalLayer = $("#modalLayer");
      //   var modalLink = $(".modalLink");
      //   var modalCont = $(".modalContent");
      //   // var marginLeft = madalCont.outerWidth()/2;
      //   // var marginTop = madalCont.outerHeight()/2;
      //
      //   modalLink.click(funtion(){
      //     modalLayer.fadeIn("slow");
      //     // modalCont.css({"margin-top": -marginTop, "margin-left" : -marginLeft});
      //     $(this).blur();
      //     $(".modalContent > a").focus();
      //     return false;
      //   });
      //
      //   $(".modalContent > button").click(function(){
      //     modalLayer.fadeOut("slow");
      //     madalLink.focus();
      //   });
      //
      //
      // });

      function showDetail(id){
        $( ".tab_wrap" ).text('').load("<?=$edit_url?>" + id);
      }
      function order(id){
        $( ".tab_wrap" ).text('').load("<?=$order_url?>" + id);
      }


    </script>
  </body>
</html>

<!-- $('.btn').on('click', function(){
  $('.btn').removeClass('on');
  $(this).addClass('on');
});
$('.btn1').on('click',function(){
  $('.tab_box').hide();
  $('.tab_box1').show();
});
$('.btn2').on('click',function(){
  $('.tab_box').hide();
  $('.tab_box2').show();
});
$('.btn3').on('click',function(){
  $('.tab_box').hide();
  $('.tab_box3').show();
}); -->
