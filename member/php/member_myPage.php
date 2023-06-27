<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/member_myPage.css">
</head>
<body>

<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/member_myPage_header.php";?>

    <div id="contentDiv">
      <?php include "./header/member_commonHeader.php";?>
      <div id="sideDiv">
          <div id="sideTitleDiv" onClick="location.href='member_myPage.php'">
              MY PAGE
          </div>
          <div id="sideContentDiv">
              <div onClick="location.href='member_orderPage.php'">
                주문내역
              </div>
              <div onClick="location.href='member_wishList.php'">
                위시리스트
              </div>
              <div onClick="location.href='member_pwCheck.php'">
                회원정보 수정
              </div>
          </div>
      </div>
      <div id="myPageDiv">
        <div id="recentOrderTitle">
          최근 주문상품
          <div onClick="location.href='member_orderPage.php'">
            더보기 >
          </div>
        </div>
        <table id="orderTable">
          <?php if($num > 0):?>
          <tr>
            <th>
              주문일자
            </th>
            <th>
              주문정보
            </th>
            <th>
              결제금액
            </th>
            <th>
              주문상세
            </th>
          </tr>
          <?php
            while($count < $num):
              if($num > 5){
                $num = 5;
              }
            $orderPrice = $product[$count]['orderPrice'] + $product[$count]['delPrice']
          ?>
          <tr>
            <td id="orderTableFirst" class="tdClass">
              <?=$product[$count]['orderDate'] ?>
            </td>
            <td id="orderTableSecond" class="tdClass" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$product[$count]['productCode'] ?>'">
              <?=$product[$count]['productName'] ?>
            </td>
            <td class="tdClass">
              \<?php echo number_format($orderPrice); ?>
            </td>
            <td class="tdClass">
              <button type="button" id="viewBtn" onClick="location.href='member_orderDetail.php?orderNo=<?=$product[$count]['orderNo'] ?>'">VIEW</button>
            </td>
          </tr>
          <?php
            $count++;
            endwhile;
          ?>
          <?php else: ?>
          <tr>
            <td id="noOrderTd">
              최근 주문 내역이 없습니다.
            </td>
          </tr>
          <?php endif; ?>
        </table>
        <div id="wishTitle">
          위시리스트
          <div onClick="location.href='member_wishList.php'">
            더보기 >
          </div>
        </div>
        <table id="wishTable">
          <?php if($num2 > 0):?>
          <tr>
          <?php
            while($count2 < $num2):
          ?>
            <td class="wishItemsTd" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$wish[$count2]['productCode'] ?>'">
              <img src="data:image/<?=$wish[$count2]['titleImgType'] ?>;base64,<?php echo base64_encode($wish[$count2]['titleImg']); ?>" alt="Title Image" id="productImg" width="130px;">
              <div id="wishItemsDiv">
                <div id="nameDiv">
                  <span id="wishSpan1"><?=$wish[$count2]['artistName']?></span>
                  <span id="wishSpan2"><?=$wish[$count2]['productName']?></span>
                </div>
                <div id="priceDiv">
                  <span id="wishSpan3">\<?php echo number_format($wish[$count2]['productPrice']); ?></span>
                </div>
              </div>
            </td>
          <?php
            $count2++;
            endwhile;
          ?>
          <?php
            while($count2 < 5):
          ?>
          <td class="emptywishItemsTd">
          </td>
          <?php
            $count2++;
            endwhile;
          ?>
          </tr>
          <?php else: ?>
          <tr>
            <td id="noOrderTd">
              위시리스트 내역이 없습니다.
            </td>
          </tr>
          <?php endif; ?>
        </table>
      </div>
    </div>

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/member_myPage.js"></script>
</body>
</html>