<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/manage_productList.css">
</head>
<body>
  <?php include "./header/manage_productList_header.php";?>
  <div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../../home/php/index.php'">
    </div>
  </div>

  <form name="productAddForm" action="./process/productAddProc.php" method="post">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">상품 리스트</span>
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
          <?php
            while($count < $num):
            $count++;
          ?>
          <tr id="productTr">
            <td id="firstTd">
              <?=$product[$count]['rowNum'] ?>
            </td>
            <td id="secondTd">
              <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Main Image" width="50px;">
            </td>
            <td id="thirdTd" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$product[$count]['productCode'] ?>'">
              <?=$product[$count]['productName'] ?>
            </td>
            <td id="fourthTd">
              <?=$product[$count]['artistName'] ?>
            </td>
            <td id="fifthTd">
              <?php
                if($product[$count]['cateCode'] == 1){
                  echo "MUSIC";
                } else if($product[$count]['cateCode'] == 2){
                  echo "PHOTO";
                } else if($product[$count]['cateCode'] == 3){
                  echo "FASHION";
                } else if($product[$count]['cateCode'] == 4){
                  echo "CONCERT";
                }
              ?>
            </td>
            <td id="sixthTd">
              <?=$product[$count]['stock'] ?>개
            </td>
            <td id="seventhTd">
              <?=$product[$count]['soldOut'] ?>
            </td>
            <td id="eightthTd">
              <?=$product[$count]['regiDate'] ?>
            </td>
            <td id="ninthTd">
              <button type="button" class="deleteBtn" onClick="deleteOne('<?=$product[$count]['productCode'] ?>', '<?=$product[$count]['productName'] ?>', '<?=$product[$count]['soldOut'] ?>');">X</button>
            </td>
          </tr>
          <?php endwhile; ?>
        </table>
      </div>
      
      <div id="pageDiv">
        <?php if($pageNumber > 1) : ?>
          <span class="arrowBtn" onClick="location.href='manage_productList.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">< 이전</span>
        <?php endif ; ?>
        
        <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
          <?php if($pageNumber == $page) : ?>
            <span id="selectedPageSpan" onClick="location.href='manage_productList.php?pageNumber=<?=$page ?>'">
              <?=$page ?>
            </span>
          <?php else: ?>
            <span id="pageSpan" onClick="location.href='manage_productList.php?pageNumber=<?=$page ?>'">
              <?=$page ?>
            </span>
          <?php endif; ?>
        <?php endfor; ?>
        
        <?php if($pageNumber < $pageCount) : ?>
          <span class="arrowBtn" onClick="location.href='manage_productList.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">다음 ></span>
        <?php endif ; ?>
      </div>
        
       
      <div id="btnDiv">
        <div>
          <span onClick="location.href='../../product/php/product_list.php?cateCode=1'">MUSIC</span>
          <span onClick="location.href='../../product/php/product_list.php?cateCode=2'">PHOTO</span>
          <span onClick="location.href='../../product/php/product_list.php?cateCode=3'">FASHION</span>
          <span onClick="location.href='../../product/php/product_list.php?cateCode=4'">CONCERT</span>
        </div>
        <span id="productAddBtn" onClick="productAdd();">상품추가</span>
      </div>
    </div>
  </form>
</div>
  
<script src="../js/manage_productList.js"></script>
</body>
</html>