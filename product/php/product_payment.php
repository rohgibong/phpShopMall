<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/product_payment.css">
</head>
<body>
  
  <div id="mainDiv">
    <?php include "../../commonFile/php/header.php";?>
    <?php include "./header/product_payment_header.php";?>
    
    <div id="contentDiv">
      <div id="subTitleDiv">
          <h1>Order</h1>
      </div>
      <span id="orderTitle">주문내역</span>
      <span id="orderSubMent">* 상품의 옵션 및 수량 변경은 상품상세 또는 장바구니에서 가능합니다.</span>
      <table id="orderTable">
        <tr>
          <th class="orderTh">이미지</th>
          <th class="orderTh">상품정보</th>
          <th class="orderTh">판매가</th>
          <th class="orderTh">수량</th>
          <th class="orderTh">배송비</th>
          <th class="orderTh">합계</th>
        </tr>
        <?php
          while($count < $num): 
          $pricePlus = $pricePlus + $product[$count]['totalPrice'];
          $delPlus = $delPlus + $product[$count]['delPrice'];
        ?>
        <tr>
          <td id="firstTd" class="orderTd">
            <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Title Image" width="100px;">
          </td>
          <td id="secondTd" class="orderTd">
           <div id="secondTdDiv">
              <div>
                <span id="artistNameSpan" onClick="location.href='product_detail.php?productCode=<?=$product[$count]['productCode']?>'">
                  <?=$product[$count]['artistName'] ?>
                </span>
                <span id="productNameSpan" onClick="location.href='product_detail.php?productCode=<?=$product[$count]['productCode']?>'">
                  <?=$product[$count]['productName'] ?>
                </span>
              </div>
            </div>
          </td>
          <td id="thirdTd" class="orderTd">
            \<?php echo number_format($product[$count]['productPrice']); ?>
          </td>
          <td id="fourthTd" class="orderTd">
            <?=$product[$count]['amount'] ?>
          </td>
          <td id="fifthTd" class="orderTd">
            \<?php echo number_format($product[$count]['delPrice']); ?>
          </td>
          <td id="sixthTd" class="orderTd">
            \<?php echo number_format($product[$count]['totalPrice']); ?>
          </td>
        </tr>
        <input type="hidden" name="productCodes[]" value="<?=$product[$count]['productCode']?>">
        <input type="hidden" name="amounts[]" value="<?=$product[$count]['amount']?>">
        <?php 
          $count++;
          endwhile;
        ?>
        <tr>
          <td colspan="6" id="totalTd" class="orderTd">
            <div id="totalDiv">
              <span> 
                상품합계 &nbsp; \<?php echo number_format($pricePlus); ?>
              </span>
              +
              <span>
                배송비 &nbsp; \<?php echo number_format($delPlus); ?>
              </span>
              =
              <span>
                총 합계
              </span>
              <span id="totalPriceSpan">
                \<?php echo number_format($pricePlus+$delPlus); ?>
              </span>
            </div>
          </td>
        </tr>
      </table>
      
      <div id="delInfoDiv">
        <span id="delInfoTitle">배송 정보</span>
        <table id="delInfoTable">
          <tr>
            <td class="delInfoName">받으시는 분</td>
            <td class="delInfoTd"><?=$name ?></td>
          </tr>
          <tr>
            <td id="addressName" rowspan="3">주소</td>
            <td class="delInfoTd"><?=$address1 ?></td>
          </tr>
          <tr>
            <td class="delInfoTd"><?=$address2 ?></td>
          </tr>
          <tr>
            <td class="delInfoTd"><?=$address3 ?> <?=$address4 ?></td>
          </tr>
          <tr>
            <td class="delInfoName">연락처</td>
            <td class="delInfoTd"><?=$phone1 ?>-<?=$phone2 ?>-<?=$phone3 ?></td>
          </tr>
          <tr>
            <td class="delInfoName">배송메시지</td>
            <td class="delInfoTd">
              <textarea name="delTextArea" id="delTextArea" cols="50" rows="5" placeholder="ex)부재 시 문 앞에 놓아주세요."></textarea>
            </td>
          </tr>
        </table>
      </div>

      <div id="payDiv">
        <span>결제 정보</span>
        <table>
          <tr>
            <th class="payTh">총 상품가격</th>
            <td class="payTd">\<?php echo number_format($pricePlus); ?></td>
          </tr>
          <tr>
            <th class="payTh">배송비</th>
            <td class="payTd">\<?php echo number_format($delPlus); ?></td>
          </tr>
          <tr>
            <th class="payTh">사용 포인트</th>
            <td class="payTd">
              <input type="text">
            </td>
          </tr>
          <tr>
            <th class="payTh">총 결제금액</th>
            <td class="payTd">0원</td>
          </tr>
          <tr>
            <th class="payTh">결제방법</th>
            <td id="radioTd">
              <input type="radio" checked> 계좌이체
              <input type="radio"> 신용/체크카드
              <input type="radio"> 법인카드
              <input type="radio"> 휴대폰결제
              <input type="radio"> 무통장입금(가상계좌)
            </td>
          </tr>
        </table>
      </div>
      
    <div id="btnDiv">
      <button type="button" id="payBtn" onClick="orderItem();">결제하기</button>
    </div>
</div>

<script src="../../commonFile/js/header.js"></script>
<script src="../js/product_payment.js"></script>
</body>
</html>