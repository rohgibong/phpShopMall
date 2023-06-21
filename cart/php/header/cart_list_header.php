<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select p.*, c.amount from storeproduct p join storecart c on p.productCode = c.productCode where c.memberNo = $memberNo";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  $count = 0;
  $num = 0;
  $totalPrice = 0;
  $totalDelPrice = 0;
  
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $num++;
      $product[$num]['productCode'] = $row['productCode'];
      $product[$num]['productName'] = $row['productName'];
      $product[$num]['detailName'] = $row['detailName'];
      $product[$num]['productPrice'] = $row['productPrice'];
      $product[$num]['artistName'] = $row['artistName'];
      $product[$num]['stock'] = $row['stock'];
      $product[$num]['cateCode'] = $row['cateCode'];
      $product[$num]['delPeriod'] = $row['delPeriod'];
      $product[$num]['delPrice'] = $row['delPrice'];
      $product[$num]['titleImgType'] = $row['titleImgType'];
      $product[$num]['mainImgType'] = $row['mainImgType'];
      $product[$num]['contentImgType'] = $row['contentImgType'];
      $product[$num]['titleImg'] = $row['titleImg'];
      $product[$num]['mainImg'] = $row['mainImg'];
      $product[$num]['contentImg'] = $row['contentImg'];
      $product[$num]['soldOut'] = $row['soldOut'];
      $product[$num]['regiDate'] = $row['regiDate'];
      $product[$num]['amount'] = $row['amount'];
    }
  }
  mysqli_close($con);
?>