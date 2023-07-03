<?php
    $cateCode = isset($_GET["cateCode"]) ? $_GET["cateCode"] : 0;
    $searchValue = isset($_GET["searchValue"]) ? $_GET["searchValue"] : 0;
    $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "";
?>
<script>
  const cateCode = <?php echo $cateCode ?>;
  const searchValue = <?php echo $searchValue ?>;
  if((cateCode <= 0 || cateCode > 4) && searchValue == 0){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $pageSet = 9;
  $startNum = ($pageSet * ($pageNumber-1) + 1);
  $endNum = $pageSet * $pageNumber;
  if($searchValue == 0){
    $sql = "select * from (select row_number() over(order by soldout desc, regiDate desc) as rowNum, p.* from storeproduct p where cateCode = $cateCode) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  } else {
    $sql = "select * from (select row_number() over(order by soldout desc, regiDate desc) as rowNum, p.* from storeproduct p where productName like '%$searchValue%') as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  }
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  $count = 0;
  $num = 0;
  
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $num++;
      $product[$num]['productCode'] = $row['productCode'];
      $product[$num]['productName'] = $row['productName'];
      $product[$num]['productPrice'] = $row['productPrice'];
      $product[$num]['artistName'] = $row['artistName'];
      $product[$num]['titleImgType'] = $row['titleImgType'];
      $product[$num]['titleImg'] = $row['titleImg'];
      $product[$num]['soldOut'] = $row['soldOut'];
    }
  }
  
  if($searchValue == 0){
    $sql = "select count(*) from storeproduct where cateCode = $cateCode;";
  } else {
    $sql = "select count(*) from storeproduct where productName like '%$searchValue%';";
  }
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