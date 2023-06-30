<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/manage_productDetail.css">
</head>
<body>
  <?php include "./header/manage_productDetail_header.php";?>
  <div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../../home/php/index.php'">
    </div>
  </div>

  <form name="productAddForm" action="" method="post">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">상품 상세</span>
      </div>
      <div id="tableDiv">
        <table id="productTable">
          <tr>
            <th>No</th>
            <th>사진</th>
            <th>상품명</th>
            <th>아티스트명</th>
            <th>카테고리</th>
            <th>수량</th>
            <th>품절여부</th>
            <th>등록일</th>
            <th>삭제</th>
          </tr>
          
        </table>
      </div>
      
    </div>
  </form>
</div>
  
<script src="../js/manage_productDetail.js"></script>
</body>
</html>