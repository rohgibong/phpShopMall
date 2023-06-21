<?php
  $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  if(memberNo <= 0){
    location.href='../../login/php/login_loginPage.php';
  }
</script>
<?php
  $pageSet = 10;
  $startNum = ($pageSet * ($pageNumber-1) + 1);
  $endNum = $pageSet * $pageNumber;
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
  $sql = "select * from (select row_number() over (order by o.orderDate desc) as rownum, p.*, o.amount, o.orderPrice, o.orderDate from storeproduct p join storeorder o on p.productCode = o.productCode where memberNo = $memberNo) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
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
      $product[$num]['amount'] = $row['amount'];
      $product[$num]['orderPrice'] = $row['orderPrice'];
      $product[$num]['orderDate'] = $row['orderDate'];
      $num++;
    }
  }
  $sql = "select count(*) from storeorder where memberNo = $memberNo;";
    $result3 = mysqli_query($con, $sql);
    $productCount = mysqli_fetch_array($result3)[0];
    if($productCount == 0){
      $pageCount = 1;
    } else {
      $pageCount = floor(($productCount-1) / $pageSet) + 1;
    }

    if($pageNumber < 1 || $pageNumber > $pageCount){
      echo '<script>alert("잘못된 접근입니다.");location.href="../../home/php/index.php";</script>';
    }
  mysqli_close($con);
?>