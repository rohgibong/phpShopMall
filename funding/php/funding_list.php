<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/funding_list.css">
</head>
<body>
  
  <div id="mainDiv">
    <?php include "../../commonFile/php/header.php";?>


    <div id="contentDiv">

      <div id="sideDiv">
        <div class="subTitle" onClick="location.href='../../product/php/product_list.php?cateCode=1'">
            MUSIC
        </div>
        <div class="subTitle" onClick="location.href='../../product/php/product_list.php?cateCode=2'">
            PHOTO
        </div>
        <div class="subTitle" onClick="location.href='../../product/php/product_list.php?cateCode=3'">
            FASHION
        </div>
        <div class="subTitle" onClick="location.href='../../product/php/product_list.php?cateCode=4'">
            CONCERT
        </div>
        <div class="changeTitle" onClick="location.href='funding_list.php'">
            FUNDING
        </div>
        <div class="subTitle" onClick="location.href='../../event/php/event_list.php'">
            EVENT
        </div>
      </div>

      <div id="fundingDiv">
        
      </div>
    </div>

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/funding_list.js"></script>
</body>
</html>