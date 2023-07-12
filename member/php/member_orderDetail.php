<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/member_orderDetail.css">
</head>
<body>

<div id="mainDiv">
  <?php include "./header/member_orderDetail_header.php";?>

    <div id="contentDiv">
      <h3>주문 정보 <span>회원님의 주문 내역을 상세 조회하실 수 있습니다.</span></h3>
      <hr>
      <span><span>[<?=$name ?>]</span> 님께서 <?=$orderYear ?>년 <?=$orderMonth ?>월 <?=$orderDay ?>일에 주문하신 내역입니다.</span>
      <div id="orderDetailDiv">

        <span>주문자정보</span>
        <table class="orderTable">
          <tr>
            <th class="tableThStyle">주문번호</th>
            <td class="tableTdStyle"><?=$orderNo ?></td>
            <th class="tableThStyle">주문일자</th>
            <td><?=$orderDate ?></td>
          </tr>
          <tr>
            <th class="tableThStyle">주문자</th>
            <td><?=$name ?></td>
            <th class="tableThStyle">결제상태</th>
            <td>
              결제완료
              :
                <?php if($payMethod == "account"): ?>
                  계좌이체
                <?php elseif($payMethod == "card"): ?>
                  신용/체크카드
                <?php elseif($payMethod == "business"): ?>
                  법인카드
                <?php elseif($payMethod == "phone"): ?>
                  휴대폰결제
                <?php elseif($payMethod == "noAccount"): ?>
                  무통장입금(가상계좌)
                <?php endif; ?>
            </td>
          </tr>
        </table>

        <span>배송지정보</span>
        <table class="orderTable">
          <tr>
            <th class="tableThStyle">수취인</th>
            <td class="tableTdStyle"><?=$name ?></td>
            <th class="tableThStyle">연락처</th>
            <td><?=$phone1 ?>-<?=$phone2 ?>-<?=$phone3 ?></td>
          </tr>
          <tr>
            <th class="tableThStyle">주소</th>
            <td colspan="3" class="tableTdStyle2">[<?=$address1 ?>] <?=$address2 ?> <?=$address3 ?> <?=$address4 ?></td>
          </tr>
          <tr>
            <th class="tableThStyle">배송메세지</th>
            <td colspan="3" class="tableTdStyle2"><?=$delMessage ?></td>
          </tr>
        </table>

        <span>주문상품정보</span>
        <table class="orderTable">
          <tr>
            <th colspan="2" class="tableThStyle2">주문상품정보</th>
            <th class="tableThStyle2">수량</th>
            <th class="tableThStyle2">가격</th>
            <th class="tableThStyle2">배송비</th>
            <th class="tableThStyle2">적립</th>
            <th class="tableThStyle2">사용 포인트</th>
            <th class="tableThStyle2">총 결제금액</th>
            <th class="tableThStyle">처리상태</th>
          </tr>
          <tr>
            <td>
              <img src="data:image/<?=$titleImgType ?>;base64,<?php echo base64_encode($titleImg); ?>" alt="Title Image" width="100px">
            </td>
            <td>
              <?=$productName ?>
            </td>
            <td>
              <?=$amount ?>
            </td>
            <td>
              \<?php echo number_format($totalPrice); ?>
            </td>
            <td>
              \<?php echo number_format($delPrice); ?>
            </td>
            <td>
              <?php echo number_format($totalPrice/100); ?>P
            </td>
            <td>
              <?php echo number_format($usedPoint); ?>P
            </td>
            <td>
              \<?php echo number_format($totalPrice + $delPrice - $usedPoint); ?>
            </td>
            <td>
              <?php if($delDate <= $currentDate): ?>
                배송 완료
              <?php
                else:
                  if($calIngDelDate == $currentDate):
              ?>
                  배송 중
                <?php elseif($calStartDelDate == $currentDate): ?>
                  송장 출력 대기
                <?php else: ?>
                  배송 준비 중
                <?php endif; ?>
              <?php endif; ?>
            </td>
          </tr>
        </table>
      </div>

    <div id="btnDiv">
      <?php if($calStartDelDate > $currentDate): ?>
        <button type="button" onClick="cancelOrder();" class="detailBtn">주문취소</button>
      <?php endif; ?>
      <button type="button" onClick="window.close();" class="detailBtn">닫기</button>
    </div>
    </div>

</div>
<script src="../js/member_orderDetail.js"></script>
</body>
</html>