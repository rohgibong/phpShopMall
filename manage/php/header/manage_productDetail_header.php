<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $productCode = isset($_POST["productCode"]) ? $_POST["productCode"] : 0;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  const productCode = <?php echo $productCode ?>;
  if(memberNo != 1 || productCode <= 0){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from storeproduct where productCode = $productCode";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);

  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $productCode = $row['productCode'];
      $productName = $row['productName'];
      $detailName = $row['detailName'];
      $productPrice = $row['productPrice'];
      $artistName = $row['artistName'];
      $stock = $row['stock'];
      $cateCode = $row['cateCode'];
      $delPeriod = $row['delPeriod'];
      $delPrice = $row['delPrice'];
      $titleImg = $row['titleImg'];
      $titleImgType = $row['titleImgType'];
      $mainImg = $row['mainImg'];
      $mainImgType = $row['mainImgType'];
      $contentImg = $row['contentImg'];
      $contentImgType = $row['contentImgType'];
      $soldOut = $row['soldOut'];
      $regiDate = $row['regiDate'];
    }
  }
  mysqli_close($con);
?>