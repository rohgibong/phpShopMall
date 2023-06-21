<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/product_list.css">
</head>
<body>
  
<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/product_list_header.php";?>
  
  <div id="contentDiv">
    <div id="sideDiv">
      <div class="subTitle" id="subTitle1" onClick="location.href='product_list.php?cateCode=1'">
          MUSIC
      </div>
      <div class="subTitle" id="subTitle2" onClick="location.href='product_list.php?cateCode=2'">
          PHOTO
      </div>
      <div class="subTitle" id="subTitle3" onClick="location.href='product_list.php?cateCode=3'">
          FASHION
      </div>
      <div class="subTitle" id="subTitle4" onClick="location.href='product_list.php?cateCode=4'">
          CONCERT
      </div>
      <div class="subTitle" id="subTitle5" onClick="location.href='../funding/list.php'">
        <!-- 링크수정 -->
          FUNDING
      </div>
      <div class="subTitle" id="subTitle6" onClick="location.href='../eventPage/list.php'">
        <!-- 링크수정 -->
          EVENT
      </div>
    </div>
    
    <div id="productDiv">
      <?php if($searchValue != 0): ?>
        <div id="serachResult">
          <span id="serachMent1">
            "<?=$searchValue ?>"
          </span>
          <span id="serachMent2">
            (으)로 검색된 목록
          </span>
        </div>
      <?php endif; ?>
      <span id="totalMent">
        Total : <?=$productCount ?>
      </span>
      <table id="productTable">
        <?php
          while($count < $num): 
          $count++;
            if(($count-1)%3 == 0):
        ?>
          <tr>
        <?php endif; ?>
            <td class="productTd" onClick="location.href='product_detail.php?productCode=<?=$product[$count]['productCode'] ?>'">
              <?php if($product[$count]['soldOut'] == 'O'): ?>
                <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Main Image" id="soldOutImgId">
              <?php else: ?>
                <img src="data:image/<?=$product[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($product[$count]['titleImg']); ?>" alt="Main Image" id="imgId">
              <?php endif; ?>
              <br>
              <div id="productInfo">
                <span id="artistInfo">
                  <?=$product[$count]['artistName'] ?>
                </span>
                <span id="nameInfo">
                  <?=$product[$count]['productName'] ?>
                </span>
                <span id="priceInfo">
                <?php if($product[$count]['soldOut'] == 'O'): ?>
                  <span>SOLD OUT<span>
                <?php else: ?>
                  \<?php echo number_format($product[$count]
                  ['productPrice']); ?>
                <?php endif; ?>
                </span>
              </div>
            </td>
        <?php endwhile; ?>
      </table>

      <div id="pageDiv">
        <?php if($pageNumber > 1 && $cateCode != 0) : ?>
          <span class="arrowBtn" onClick="location.href='product_list.php?cateCode=<?=$cateCode?>&pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
        <?php elseif($pageNumber > 1 && $cateCode == 0) : ?>
          <span class="arrowBtn" onClick="location.href='product_list.php?searchValue=<?=$searchValue?>&pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">< 이전</span>
        <?php endif ; ?>
        
        <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
          <?php if($cateCode != 0 && $productCount != 0) : ?>
            <span id="pageSpan" onClick="location.href='product_list.php?cateCode=<?=$cateCode?>&pageNumber=<?=$page ?>'">
              <?=$page ?>
            </span>
          <?php elseif($searchValue != 0 && $productCount != 0) : ?>
            <span id="pageSpan" onClick="location.href='product_list.php?searchValue=<?=$searchValue?>&pageNumber=<?=$page ?>'">
              <?=$page ?> 
            </span>
          <?php endif ; ?>
        <?php endfor; ?>
        
        <?php if($pageNumber < $pageCount && $cateCode != 0) : ?>
          <span class="arrowBtn" onClick="location.href='product_list.php?cateCode=<?=$cateCode?>&pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
        <?php elseif($pageNumber < $pageCount && $cateCode == 0) : ?>
            <span class="arrowBtn" onClick="location.href='product_list.php?searchValue=<?=$searchValue?>&pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
        <?php else : ?>
          <span class="arrowBtn" id="noName">다음 ></span>
        <?php endif ; ?>
      </div>
    </div>

  </div>

</div>
<script src="../js/product_list.js"></script>
<script src="../../commonFile/js/header.js"></script>
</body>
</html>