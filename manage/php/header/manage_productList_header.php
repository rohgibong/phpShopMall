<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  if(memberNo != 1){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $pageSet = 5;
  $startNum = ($pageSet * ($pageNumber-1) + 1);
  $endNum = $pageSet * $pageNumber;
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from (select row_number() over(order by soldout desc, regiDate desc) as rowNum, p.* from storeproduct p) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  $count = 0;
  $num = 0;

  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $num++;
      $product[$num]['rowNum'] = $row['rowNum'];
      $product[$num]['productCode'] = $row['productCode'];
      $product[$num]['productName'] = $row['productName'];
      $product[$num]['artistName'] = $row['artistName'];
      $product[$num]['stock'] = $row['stock'];
      $product[$num]['cateCode'] = $row['cateCode'];
      $product[$num]['titleImgType'] = $row['titleImgType'];
      $product[$num]['titleImg'] = $row['titleImg'];
      $product[$num]['soldOut'] = $row['soldOut'];
      $product[$num]['regiDate'] = $row['regiDate'];
    }
  }
  $sql = "select count(*) from storeproduct;";
  $result2 = mysqli_query($con, $sql);
  $productCount = mysqli_fetch_array($result2)[0];
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