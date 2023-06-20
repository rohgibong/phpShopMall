<?php
  $productCode = isset($_GET["productCode"]) ? $_GET["productCode"] : 0;
?>
<script>
  const productCode = <?php echo $productCode ?>; 
  if(productCode <= 0){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $currentDate = date('Y-m-d');
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from storeproduct where productCode = $productCode";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);

  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $productName = $row['productName'];
      $detailName = $row['detailName'];
      $productPrice = $row['productPrice'];
      $artistName = $row['artistName'];
      $stock = $row['stock'];
      $delPeriod = $row['delPeriod'];
      $delPrice = $row['delPrice'];
      $mainImgType = $row['mainImgType'];
      $contentImgType = $row['contentImgType'];
      $mainImg = $row['mainImg'];
      $contentImg = $row['contentImg'];
      $soldOut = $row['soldOut'];
    }
  }
  $deliveryDate = date('Y-m-d', strtotime("+$delPeriod days", strtotime($currentDate)));
  $delDate = explode("-", $deliveryDate);
  $point = $productPrice / 100;

  mysqli_close($con);
?>
<script>
  let productPrice = <?php echo $productPrice ?>;
</script>