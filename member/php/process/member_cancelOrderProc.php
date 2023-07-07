<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $orderNo = isset($_GET["orderNo"]) ? $_GET["orderNo"] : 0;
  $boughtPrice = 0;

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");

  //주문번호에 맞는 상품코드와 수량, 주문가격 뽑아오기
  $sql = "select productCode, amount, orderPrice from storeorder where orderNo = $orderNo";
  $result = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $productCode = $row['productCode'];
    $amount = $row['amount'];
    $orderPrice = $row['orderPrice'];
  }

  //돌려줘야할 포인트 계산
  $minusPoint = $orderPrice / 100;

  //해당하는 상품의 재고와 품절여부 뽑아오기
  $sql = "select stock, soldOut from storeproduct where productCode = $productCode";
  $result2 = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result2)) {
    $stock = $row['stock'];
    $soldOut = $row['soldOut'];
  }

  //해당하는 회원의 포인트, 레벨 뽑아오기
  $sql = "select level, point from storemember where memberNo = $memberNo";
  $result3 = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result3)) {
    $level = $row['level'];
    $point = $row['point'];
  }

  $updateStock = $stock + $amount;
  $point = $point - $minusPoint;

  if($soldOut = "O"){
    $soldOut = "X";
  }

  $sql = "delete from storeorder where orderNo = $orderNo";
  mysqli_query($con, $sql);

  $sql = "select orderPrice from storeorder where memberNo = $memberNo";
  $result4 = mysqli_query($con, $sql);
  while($row = mysqli_fetch_assoc($result4)) {
    $boughtPrice = $boughtPrice + $row['orderPrice'];
  }

  if($boughtPrice > 1000000){
    $userLevel = 5;
  } else if($boughtPrice > 750000){
    $userLevel = 4;
  } else if($boughtPrice > 500000){
    $userLevel = 3;
  } else if($boughtPrice > 250000){
    $userLevel = 2;
  } else {
    $userLevel = 1;
  }

  $sql = "update storemember set point = $point, level = $userLevel where memberNo = $memberNo";
  mysqli_query($con, $sql);

  $sql = "update storeproduct set stock = $updateStock, soldOut = '$soldOut' where productCode = $productCode";
  mysqli_query($con, $sql);

  mysqli_close($con);
?>
<script>
  alert("주문이 취소되었습니다.");
  window.close();
</script>