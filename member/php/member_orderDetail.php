<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/member_orderDetail.css">
</head>
<body>

<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/member_orderDetail_header.php";?>

    <div id="contentDiv">
      <h3>주문 상세</h3>
      <div id="orderDetailDiv">
        <!-- <?=$productName ?>
        <?=$delDate ?>
        <?=$currentDate ?> -->
        <table id="orderTable">
          <tr>
            <th class="orderTh">이미지</th>
            <th class="orderTh">상품정보</th>
            <th class="orderTh">판매가</th>
            <th class="orderTh">수량</th>
            <th class="orderTh">배송비</th>
            <th class="orderTh">합계</th>
          </tr>
          <tr>
            <td id="firstTd" class="orderTd">
              <img src="data:image/<?=$titleImgType ?>;base64,<?php echo base64_encode($titleImg); ?>" alt="Title Image" width="100px;">
            </td>
            <td id="secondTd" class="orderTd">
            <div id="secondTdDiv">
                <div>
                  <span id="artistNameSpan" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$productCode ?>'">
                    <?=$artistName ?>
                  </span>
                  <span id="productNameSpan" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$productCode ?>'">
                    <?=$productName ?>
                  </span>
                </div>
              </div>
            </td>
            <td id="thirdTd" class="orderTd">
              \<?php echo number_format($productPrice); ?>
            </td>
            <td id="fourthTd" class="orderTd">
              <?=$amount ?>
            </td>
            <td id="fifthTd" class="orderTd">
              \<?php echo number_format($delPrice); ?>
            </td>
            <td id="sixthTd" class="orderTd">
              \<?php echo number_format($totalPrice+$delPrice); ?>
            </td>
          </tr>
          <tr>
            <td>dd</td>
          </tr>
        </table>
      </div>
    </div>

</div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/member_orderDetail.js"></script>
</body>
</html>