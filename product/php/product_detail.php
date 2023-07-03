<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/product_detail.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/product_detail_header.php";?>

  <div id="contentDiv">
      <div id="imgDiv">
        <?php if($soldOut == 'O'): ?>
          <img src="data:image/<?=$mainImgType ?>;base64,<?php echo base64_encode($mainImg); ?>" alt="Main Image" width="500px;" id="soldOutImgId">
        <?php else: ?>
          <img src="data:image/<?=$mainImgType ?>;base64,<?php echo base64_encode($mainImg); ?>" alt="Main Image" width="500px;">
        <?php endif; ?>
      </div>
      <div id="orderDiv">
        <button>품절</button>
        <button id="btn1">수정</button>
          <div id="orderContentDiv">
            <span id="artistNameId"><?=$artistName ?></span>
            <div id="productNameDiv">
              <span id="detailNameId"><?=$detailName ?></span>
            </div>
            <?php if($soldOut == 'O'): ?>
              <span id="productPriceId">SOLD OUT</span>
            <?php else: ?>
              <span id="productPriceId">\ <?php echo number_format($productPrice); ?></span>
            <?php endif; ?>
            <span id="pointId">적립금 1% (<?=$point ?> P)</span>
            <span id="delDateId"><?=$delDate[1] ?>월 <?=$delDate[2] ?>일 배송예정</span>
            <span id="delPriceId">배송비 \<?php echo number_format($delPrice); ?></span>
            <div id="amountDiv">
              <span id="productNameId">
                <?=$productName ?>
              </span>
              <?php if($stock <= 10) : ?>
              <span id="lastStock">
                (<?=$stock ?>개 남음)
              </span>
              <?php endif; ?>
              <div id="momdifyAmount">
                <button id="minusBtn" class="amountBtn">-</button>
                <input type="text" value="1" id="amountInput" oninput="this.value = this.value.replace(/\D/g, '');">
                <button id="plusBtn" class="amountBtn">+</button>
              </div>
              <div id="totalPriceDiv">
              \<input type="text" value="<?php echo number_format($productPrice); ?>" id="totalPrice" readonly>
              </div>
            </div>
            <span id="totalMent">TOTAL</span>
            <div id="allTotalDiv">
              \<input type="text" value="<?php echo number_format($productPrice); ?>" id="allTotal" readonly>
            </div><br>
            <div id="btnDiv">
              <?php if($soldOut == 'O'): ?>
                <button id="buyBtn">BUY NOW</button><br>
              <?php else: ?>
                <button id="buyBtn" onClick="buy();">BUY NOW</button><br>
              <?php endif; ?>
              <input type="checkbox" id="popup">
              <label for="popup">
                <div id="wishBtn" onClick="addWish();">
                  <img src="../../img/heart.png" alt="wishImg" width="30px" id="wishImg">
                </div>
              </label>
              <div>
                <div>
                  <label for="popup" id="closeLabel">
                    <img src="../../img/cancel.png" alt="" width="20px">
                  </label>
                  <img src="../../img/redheart.png" alt="" width="50px" id="wishImgFloat">
                  <div id="wishMentFloatDiv">
                    <span>
                      선택하신 상품을 관심상품에 담았습니다. <br>
                      지금 관심상품을 확인하시겠습니까?
                    </span>
                  </div>
                  <label for="popup" id="continueLabel">
                    <div>
                      쇼핑 계속하기
                    </div>
                  </label>
                  <div id="goWishBtn" onClick="location.href='../../member/php/member_wishList.php'">관심상품 확인</div>
                </div>
                <label for="popup"></label>
              </div>
              <input type="checkbox" id="addCartLabel">
              <?php if($soldOut == 'O'): ?>
                <label for="noAdd">
                  <div id="addCartBtn" onClick="addCart();">ADD CART</div>
                </label>
              <?php else: ?>
                <label for="addCartLabel">
                  <div id="addCartBtn" onClick="addCart();">ADD CART</div>
                </label>
              <?php endif; ?>
              <div>
                <div>
                  <label for="addCartLabel" id="closeLabel">
                    <img src="../../img/cancel.png" alt="" width="20px">
                  </label>
                  <img src="../../img/cart.png" alt="" width="50px" id="wishImgFloat">
                  <div id="wishMentFloatDiv">
                    <span>
                      장바구니에 상품이 정상적으로 담겼습니다.
                    </span>
                  </div>
                  <label for="addCartLabel" id="continueLabel">
                    <div>
                      쇼핑 계속하기
                    </div>
                  </label>
                  <div id="goWishBtn" onClick="location.href='../../cart/php/cart_list.php'">장바구니 이동</div>
                </div>
                <label for="addCartLabel"></label>
              </div>
            </div>
          </div>
      </div>
      <div id="detailImgDiv">
        <img src="data:image/<?=$contentImgType ?>;base64,<?php echo base64_encode($contentImg); ?>" alt="Content Image" width="800px;" id="detailImgId">
      </div>
  </div>
</div>

  <form id="buyForm" method="post" action="product_payment.php">
    <input type="hidden" id="memberNoData" name="memberNoData">
    <input type="hidden" id="productCodeData" name="productCodeData">
    <input type="hidden" id="amountData" name="amountData">
  </form>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/product_detail.js"></script>
</body>
</html>