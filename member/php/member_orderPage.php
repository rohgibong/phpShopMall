<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/member_orderPage.css">
</head>
<body>

<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/member_orderPage_header.php";?>

    <div id="contentDiv">
      <?php include "./header/member_commonHeader.php";?>
      
      <div id="orderPageDiv">
        <div id="recentOrderTitle">
          주문내역
          <div>
            <span onClick="location.href='../../home/php/index.php'">HOME</span>
            >
            <span onClick="location.href='member_myPage.php'">MY PAGE</span>
            >
            <span onClick="location.href='member_orderPage.php'">ORDER</span>
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
              <button type="button" id="viewBtn">VIEW</button>
            </td>
          </tr>
          <?php
            $count++;
            endwhile;
          ?>
          <?php else: ?>
          <tr>
            <td id="noOrderTd">
              주문내역이 없습니다.
            </td>
          </tr>
          <?php endif; ?>
        </table>
        <div id="pageDiv">
        <?php if($pageNumber > 1) : ?>
          <span class="arrowBtn" onClick="location.href='member_orderPage.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">< 이전</span>
        <?php endif ; ?>
        
        <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
          <span id="pageSpan" onClick="location.href='member_orderPage.php?pageNumber=<?=$page ?>'">
            <?=$page ?>
          </span>
        <?php endfor; ?>
        
        <?php if($pageNumber < $pageCount) : ?>
          <span class="arrowBtn" onClick="location.href='member_orderPage.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">다음 ></span>
        <?php endif ; ?>
      </div>
    </div>

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/member_orderPage.js"></script>
</body>
</html>