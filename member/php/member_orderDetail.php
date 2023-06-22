<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/member_orderDetail.css">
</head>
<body>

<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/member_orderDetail_header.php";?>

    <div id="contentDiv">
      <h3>주문 상세</h3>
      <div id="orderDetailDiv">
        <?=$productName ?>
        <?=$delDate ?>
        <?=$currentDate ?>
      </div>
    </div>

</div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/member_orderDetail.js"></script>
</body>
</html>