<script>
  if(memberNo <= 0){
    location.href='../../login/php/login_loginPage.php';
  }
</script>
<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from storemember where memberNo = $memberNo;";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
       $name = $row['name'];
       $point = $row['point'];
       $level = $row['level'];
    }
  }
  $sql = "select p.*, o.orderNo, o.amount, o.orderPrice, o.orderDate from storeproduct p join storeorder o on p.productCode = o.productCode where memberNo = $memberNo order by o.orderDate desc";
  $result2 = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result2);
  $count = 0;
  $num = 0;
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result2)){
      $product[$num]['productCode'] = $row['productCode'];
      $product[$num]['productName'] = $row['productName'];
      $product[$num]['productPrice'] = $row['productPrice'];
      $product[$num]['delPrice'] = $row['delPrice'];
      $product[$num]['titleImgType'] = $row['titleImgType'];
      $product[$num]['titleImg'] = $row['titleImg'];
      $product[$num]['orderNo'] = $row['orderNo'];
      $product[$num]['amount'] = $row['amount'];
      $product[$num]['orderPrice'] = $row['orderPrice'];
      $product[$num]['orderDate'] = $row['orderDate'];
      $num++;
    }
  }
  $sql = "select p.* from storeproduct p, storewish w where p.productCode = w.productCode and w.memberNo = $memberNo order by w.regiDate desc limit 5";
  $result3 = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result3);
  $count2 = 0;
  $num2 = 0;
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result3)){
      $wish[$num2]['productCode'] = $row['productCode'];
      $wish[$num2]['productName'] = $row['productName'];
      $wish[$num2]['productPrice'] = $row['productPrice'];
      $wish[$num2]['artistName'] = $row['artistName'];
      $wish[$num2]['titleImgType'] = $row['titleImgType'];
      $wish[$num2]['titleImg'] = $row['titleImg'];
      $num2++;
    }
  }

  $sql = "select count(*) from storeorder where memberNo = $memberNo;";
  $result3 = mysqli_query($con, $sql);
  $productCount = mysqli_fetch_array($result3)[0];
  mysqli_close($con);
?>