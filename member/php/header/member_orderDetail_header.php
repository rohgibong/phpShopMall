<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $orderNo = isset($_GET["orderNo"]) ? $_GET["orderNo"] : 0;
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select memberNo from storeorder where orderNo = $orderNo;";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $checkMemberNo = $row['memberNo'];
  }
  date_default_timezone_set("Asia/Seoul");
  $currentDate = date("Y-m-d");
?>
<script>
  const checkMemberNo = <?php echo $checkMemberNo ?>;
  const orderNo = <?php echo $orderNo ?>;
  if(memberNo <= 0){
    location.href='../../login/php/login_loginPage.php';
  }
  if(orderNo <= 0 || checkMemberNo != memberNo) {
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select p.*, o.amount, o.orderPrice, o.usedPoint, o.delMessage, o.payMethod, o.orderDate, o.delDate from storeproduct p join storeorder o on p.productCode = o.productCode where memberNo = $memberNo and orderNo = $orderNo";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $productCode = $row['productCode'];
      $productName = $row['productName'];
      $detailName = $row['detailName']; 
      $productPrice = $row['productPrice'];
      $artistName = $row['artistName'];
      $delPrice = $row['delPrice'];
      $titleImgType = $row['titleImgType'];
      $titleImg = $row['titleImg'];
      $amount = $row['amount'];
      $orderPrice = $row['orderPrice'];
      $usedPoint = $row['usedPoint'];
      $delMessage = $row['delMessage'];
      $payMethod = $row['payMethod'];
      $orderDate = $row['orderDate'];
      $delDate = $row['delDate'];
      $totalPrice = $productPrice * $amount;
      $orderYear = explode("-", $orderDate)[0];
      $orderMonth = explode("-", $orderDate)[1];
      $orderDay = explode("-", $orderDate)[2];
    }
  } else {
    echo "<script>alert('잘못된 접근입니다.');location.href='../../home/php/index.php';</script>";
  }

  $sql = "select * from storemember where memberNo = $memberNo";
  $result2 = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result2);

  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result2)){
      $name = $row['name'];
      $phone1 = $row['phone1'];
      $phone2 = $row['phone2'];
      $phone3 = $row['phone3'];
      $address1 = $row['address1'];
      $address2 = $row['address2'];
      $address3 = $row['address3'];
      $address4 = $row['address4'];
    }
  }

  $calDelDate = new DateTime($delDate);
  $calDelDate->modify("-1 days");
  $calIngDelDate = $calDelDate->format("Y-m-d");
  $calDelDate->modify("-1 days");
  $calStartDelDate = $calDelDate->format("Y-m-d");

  mysqli_close($con);
?>