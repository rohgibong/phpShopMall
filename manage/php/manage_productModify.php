<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/manage_productAdd_Modify.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $productCode = isset($_GET["productCode"]) ? $_GET["productCode"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    const productCode = <?php echo $productCode ?>;
    if(memberNo != 1 || productCode == 0){
      alert('잘못된 접근입니다.');
      location.href='../../home/php/index.php';
    }
  </script>
  <?php
    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "select * from storeproduct where productCode = '$productCode';";
    $result = mysqli_query($con, $sql);
    $row_cnt = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
      $productName = $row['productName'];
      $detailName = $row['detailName'];
      $productPrice = $row['productPrice'];
      $artistName = $row['artistName'];
      $stock = $row['stock'];
      $cateCode = $row['cateCode'];
      $delPeriod = $row['delPeriod'];
      $delPrice = $row['delPrice'];
      $titleImgType = $row['titleImgType'];
      $mainImgType = $row['mainImgType'];
      $contentImgType = $row['contentImgType'];
      $titleImg = $row['titleImg'];
      $mainImg = $row['mainImg'];
      $contentImg = $row['contentImg'];
      $soldOut = $row['soldOut'];
    }
    mysqli_close($con);
  ?>
  <div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../../home/php/index.php'">
    </div>
  </div>

  <form name="productForm" action="./process/productModifyProc.php" method="post" enctype="multipart/form-data">
    <div id="contentDiv">
      <div id="titleMentDiv">
        <span id="titleMent">상품 수정</span>
      </div>
      
      <table id="productTable">
        <tr>
          <td class="titleTd">
            상품명
          </td>
          <td class="contentTd">
            <input type="text" name="productName" id="productName" placeholder="간략한 상품명" value="<?=$productName ?>"><br>
            <input type="text" name="detailName" id="detailName" placeholder="상세한 상품명" value="<?=$detailName ?>">
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            상품가격
          </td>
          <td class="contentTd">
            <input type="text" name="productPrice" id="productPrice" maxlength="6" placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');" value="<?=$productPrice ?>"> 원
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            아티스트명
          </td>
          <td class="contentTd">
            <input type="text" name="artistName" id="artistName" placeholder="15글자 이내" maxlength="15" value="<?=$artistName ?>">
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            수량
          </td>
          <td class="contentTd">
            <input type="text" name="stock" id="stock" maxlength="5" placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');" value="<?=$stock ?>"> 개
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            카테고리
          </td>
          <td class="contentTd">
            <select name="cateCode" id="cateCode">
              <?php if($cateCode == 1): ?>
                <option value="1" selected>MUSIC</option>
                <option value="2">PHOTO</option>
                <option value="3">FASHION</option>
                <option value="4">CONCERT</option>
              <?php elseif($cateCode == 2): ?>
                <option value="1">MUSIC</option>
                <option value="2" selected>PHOTO</option>
                <option value="3">FASHION</option>
                <option value="4">CONCERT</option>
              <?php elseif($cateCode == 3): ?>
                <option value="1">MUSIC</option>
                <option value="2">PHOTO</option>
                <option value="3" selected>FASHION</option>
                <option value="4">CONCERT</option>
              <?php elseif($cateCode == 4): ?>
                <option value="1">MUSIC</option>
                <option value="2">PHOTO</option>
                <option value="3">FASHION</option>
                <option value="4" selected>CONCERT</option>
              <?php endif; ?>
            </select>
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            배송기간
          </td>
          <td class="contentTd">
            <input type="text" name="delPeriod" id="delPeriod" maxlength="2" placeholder="1" oninput="this.value = this.value.replace(/\D/g, '');" value="<?=$delPeriod ?>"> 일
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            배송비
          </td>
          <td class="contentTd">
            <input type="text" name="delPrice" id="delPrice" maxlength="5"  placeholder="0" oninput="this.value = this.value.replace(/\D/g, '');" value="<?=$delPrice ?>"> 원
          </td>
        </tr>
        <tr>
          <td class="titleTd">
            상품 이미지
          </td>
          <td class="contentTd">
            <span class="mentId">배너 이미지 :</span> <input type="file" name="titleImg" id="titleImg"><br>
            <span class="mentId">메인 이미지 :</span> <input type="file" name="mainImg" id="mainImg"><br>
            <span class="mentId">설명 이미지 :</span> <input type="file" name="contentImg" id="contentImg">
            <br>
            <span id="imgMent">(상품 이미지는 수정이 필요할 시에만 첨부)</span>
          </td>
        </tr>
      </table>
      
        
      <div id="btnDiv">
        <button type="button" onClick="formInput('modify');" id="formInputBtn">수정</button>
        
        <button type="button" onClick="goBack();" id="cancelBtn">취소</button>
      </div>
    </div>
  </form>


</div>
<script src="../js/manage_productAdd_Modify.js"></script>
</body>
</html>