<?php
  $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
?>
<script>
  if(memberNo <= 0){
    location.href='../../login/php/login_loginPage.php';
  }
</script>
<?php
  $pageSet = 12;
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
  $sql = "select * from (select row_number() over (order by w.regidate desc) as rowNum, p.* from storeproduct p, storewish w where p.productCode = w.productCode and w.memberNo = $memberNo) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  $result2 = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result2);
  $count = 0;
  $num= 0;
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result2)){
      $wish[$num]['productCode'] = $row['productCode'];
      $wish[$num]['productName'] = $row['productName'];
      $wish[$num]['productPrice'] = $row['productPrice'];
      $wish[$num]['artistName'] = $row['artistName'];
      $wish[$num]['titleImgType'] = $row['titleImgType'];
      $wish[$num]['titleImg'] = $row['titleImg'];
      $num++;
    }
  }
  $sql = "select count(*) from storewish where memberNo = $memberNo;";
  $result3 = mysqli_query($con, $sql);
  $productCount = mysqli_fetch_array($result3)[0];
  if($productCount == 0){
    $pageCount = 1;
  } else {
    $pageCount = floor(($productCount-1) / $pageSet) + 1;
  }
  if($pageNumber < 1 || $pageNumber > $pageCount){
    echo '<script>alert("잘못된 접근입니다.");location.href="../index.php";</script>';
  }
  $sql = "select count(*) from storeorder where memberNo = $memberNo;";
  $result4 = mysqli_query($con, $sql);
  $orderCount = mysqli_fetch_array($result4)[0];
  mysqli_close($con);
?>