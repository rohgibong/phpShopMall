<?php
  $memberNoData = isset($_POST["memberNoData"]) ? $_POST["memberNoData"] : 0;
  $productCode = isset($_POST["productCodeData"]) ? $_POST["productCodeData"] : 0;
  $amount = isset($_POST["amountData"]) ? $_POST["amountData"] : 0;
  $checkProduct = isset($_POST["checkProduct"]) ? $_POST["checkProduct"] : 0;
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $count = 0;
  $num = 0;
  $pricePlus = 0;
  $delPlus = 0;

  if ($checkProduct != 0) {
    foreach ($checkProduct as $arrProductCode) {
      $sql = "select p.*, c.amount from storeproduct p join storecart c on p.productCode = c.productCode where c.memberNo = $memberNo and c.productCode = $arrProductCode";
      $result = mysqli_query($con, $sql);
      mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result)){
        $product[$num]['productCode'] = $row['productCode'];
        $product[$num]['productName'] = $row['productName'];
        $product[$num]['productPrice'] = $row['productPrice'];
        $product[$num]['artistName'] = $row['artistName'];
        $product[$num]['delPrice'] = $row['delPrice'];
        $product[$num]['titleImgType'] = $row['titleImgType'];
        $product[$num]['titleImg'] = $row['titleImg'];
        $product[$num]['amount'] = $row['amount'];
        $product[$num]['totalPrice'] = $row['productPrice'] * $row['amount'];
        $num++;
      }
    }
  } else if($productCode != 0) {  
    $sql = "select * from storeproduct where productCode = $productCode";
    $result = mysqli_query($con, $sql);
    mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
      $product[$num]['productCode'] = $row['productCode'];
      $product[$num]['productName'] = $row['productName'];
      $product[$num]['productPrice'] = $row['productPrice'];
      $product[$num]['artistName'] = $row['artistName'];
      $product[$num]['delPrice'] = $row['delPrice'];
      $product[$num]['titleImgType'] = $row['titleImgType'];
      $product[$num]['titleImg'] = $row['titleImg'];
      $product[$num]['amount'] = $amount;
      $product[$num]['totalPrice'] = $row['productPrice'] * $amount;
      $num++;
    }
  }

  $sql = "select * from storemember where memberNo = $memberNo";
  $result = mysqli_query($con, $sql);
  mysqli_num_rows($result);
  while($row = mysqli_fetch_assoc($result)){
    $name = $row['name'];
    $address1 = $row['address1'];
    $address2 = $row['address2'];
    $address3 = $row['address3'];
    $address4 = $row['address4'];
    $phone1 = $row['phone1'];
    $phone2 = $row['phone2'];
    $phone3 = $row['phone3'];
  }
  mysqli_close($con);
?>
<script>
  const checkProduct = <?php echo json_encode($checkProduct)?>;
  const productCode = <?php echo $productCode ?>;
  if(memberNo <= 0 || (checkProduct == 0 && productCode == 0)){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>