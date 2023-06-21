<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/cart_list.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  
  <div id="mainDiv">
    <?php include "../../commonFile/php/header.php";?>
    <?php include "./header/cart_list_header.php";?>
    
    <div id="contentDiv">
      <h1>Cart</h1>
      <?php
        if($num != 0):
      ?>
      <form action="../../product/php/product_payment.php" method="post" id="checkout-form">
      <table id="cartTable">
        <tr>
          <th>
            <input type="checkbox" name="checkAll" id="checkAll" checked>
          </th>
          <th>상품정보</th>
          <th>수량</th>
          <th>배송비</th> 
          <th>주문금액</th>
        </tr>
        <?php
            while($count < $num):
            $count++;
            $orderPrice = $product[$count]['productPrice'] * $product[$count]['amount'];
            $totalPrice = $totalPrice + $orderPrice;
            $totalDelPrice = $totalDelPrice + $product[$count]['delPrice'];
            $allTotal = $totalPrice + $totalDelPrice;
        ?>
        <tr>
          <td id="firstTd">
            <input type="checkbox" name="checkProduct[]" id="checkProduct" class="checkboxClass" value="<?=$product[$count]['productCode']?>" checked>
          </td>
          <td id="secondTd">
            <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Main Image" id="productImg" width="90px;">
            <div id="secondTdDiv">
              <div>
                <span id="artistNameSpan">
                  <?=$product[$count]['artistName'] ?>
                </span>
                <span id="productNameSpan" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$product[$count]['productCode']?>'">
                  <?=$product[$count]['productName'] ?>
                  <?php if($product[$count]['stock'] <= 10) : ?>
                    <span id="lastStock">
                      (<?=$product[$count]['stock'] ?>개 남음)
                    </span>
                  <?php endif; ?>
                </span>
                
                <br>
                <button id="removeOneBtn" type="button" onClick="removeOne(<?=$product[$count]['productCode']?>);">삭제</button>
              </div>
            </div>
          </td>
          <td id="thirdTd">
            <button id="minusBtn" class="amountBtn" onClick="minus(<?=$product[$count]['amount']?>, <?=$product[$count]['productCode']?>, <?=$memberNo?>);">-</button>
            <input type="text" value="<?=$product[$count]['amount']?>" id="amountInput" oninput="this.value = this.value.replace(/\D/g, '');" readonly>
            <button id="plusBtn" class="amountBtn" onClick="plus(<?=$product[$count]['amount']?>, <?=$product[$count]['productCode']?>, <?=$memberNo?>);">+</button>
          </td>
          <td id="fourthTd">
            \<?php echo number_format($product[$count]['delPrice']); ?>
          </td>
          <td id="fifthTd">
            \<?php echo number_format($orderPrice); ?>
          </td>
        </tr>
        <?php 
          endwhile;
        ?>
      </table>
      </form>
      <div id="removeBtnDiv">
        <button onClick="remove();">선택상품삭제</button>
      </div>
      <div id="totalDiv">
          <div id="priceNumber">
            \ <input type="text" value="<?php echo number_format($totalPrice); ?>" id="totalPrice" readonly>
            +
            \ <input type="text" value="<?php echo number_format($totalDelPrice); ?>" id="totalDelPrice" readonly>
            =
            <span>\</span> <input type="text" value="<?php echo number_format($allTotal); ?>" id="allTotalPrice" readonly>
          </div>
          <div id="priceMent">
            <span id="ment1" class="priceMentClass">
              총 상품금액
            </span>
            <span id="ment2" class="priceMentClass">
              배송비
            </span>
            <span id="ment3" class="priceMentClass">
              결제예정금액
            </span>
          </div>
      </div>
      <div id="btnDiv">
          <button type="button" onClick="order(1);">전체상품 주문</button>
          <button type="button" onClick="order(2);">선택상품 주문</button>
          <button type="button" onClick="location.href='../../home/php/index.php'">계속 쇼핑하기</button>
      </div>
      <?php
        else :
      ?>
      <div id="emptyDiv">
        <img src="../../img/sad.png" width="50px">
        <span>앗! 장바구니가 비어 있어요!</span>
        <button onClick="location.href='../../home/php/index.php'">계속 쇼핑하기</button>
      </div>
      <?php
        endif;
      ?>
    </div>
  </div>
  <script>
    let memberNo = <?php echo $memberNo ?>;
    let totalPrice = <?php echo $totalPrice ?>;
  </script>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/cart_list.js"></script>
</body>
</html>