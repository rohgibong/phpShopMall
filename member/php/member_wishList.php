<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/member_wishList.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/member_wishList_header.php";?>

    <div id="contentDiv">
      <?php include "./header/member_commonHeader.php";?>

      <div id="wishListDiv">
        <div id="wishListTitle">
          위시리스트
          <div>
            <span onClick="location.href='../../home/php/index.php'">HOME</span>
            >
            <span onClick="location.href='member_myPage.php'">MY PAGE</span>
            >
            <span onClick="location.href='member_wishList.php'">WISH</span>
            <br>
            <br>
            <?php if($num != 0) : ?>
            <button type="button" id="deleteAllBtn" onClick="deleteAll();">전체상품 삭제</button>
            <?php endif; ?>
          </div>
        </div>
        <div id="tableHeightDiv">
          <table id="wishTable">
            <?php if($num > 0):?>
              <?php
                while($count < $num):
                if ($count % 6 == 0) echo '<tr>';
              ?>
              <td class="wishItemsTd">
                <img src="data:image/<?=$wish[$count]['titleImgType'] ?>;base64,<?php echo base64_encode($wish[$count]['titleImg']); ?>" alt="Title Image" id="productImg" width="130px;">
                <div id="wishItemsDiv" onClick="location.href='../../product/php/product_detail.php?productCode=<?=$wish[$count]['productCode'] ?>'">
                  <div id="nameDiv">
                    <span id="wishSpan1"><?=$wish[$count]['artistName']?></span>
                    <span id="wishSpan2"><?=$wish[$count]['productName']?></span>
                  </div>
                  <div id="priceDiv">
                    <span id="wishSpan3">\<?php echo number_format($wish[$count]['productPrice']); ?></span>
                  </div>
                </div>
                <div id="deleteDiv">
                  <button type="button" id="deleteBtn" onClick="deleteOne('<?=$wish[$count]['productCode'] ?>');">삭제</button>
                </div>
              </td>
              <?php
                $count++;
                if ($count % 6 == 0 || $count == $num):
                  while($count % 6 != 0):
              ?>
              <td class="emptywishItemsTd"></td>
              <?php
                  $count++;
                  endwhile;
                  echo '</tr>';
                endif;
                endwhile;
              ?>
            <?php else: ?>
            <tr>
              <td id="noWishTd">
                위시리스트 내역이 없습니다.
              </td>
            </tr>
            <?php endif; ?>
          </table>
        </div>
      </div>
      <div id="pageDiv">
      <?php if($pageNumber > 1) : ?>
        <span class="arrowBtn" onClick="location.href='member_wishList.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
      <?php else : ?>
        <span class="arrowBtn" id="noName">< 이전</span>
      <?php endif ; ?>
      
      <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
        <span id="pageSpan" onClick="location.href='member_wishList.php?pageNumber=<?=$page ?>'">
          <?=$page ?>
        </span>
      <?php endfor; ?>
      
      <?php if($pageNumber < $pageCount) : ?>
        <span class="arrowBtn" onClick="location.href='member_wishList.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
      <?php else : ?>
        <span class="arrowBtn" id="noName">다음 ></span>
      <?php endif ; ?>
    </div>

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/member_wishList.js"></script>
</body>
</html>