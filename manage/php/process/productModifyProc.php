<?php
    $productCode = $_POST["productCode"];
    $productName = $_POST["productName"];
    $detailName = $_POST["detailName"];
    $productPrice = $_POST["productPrice"];
    $artistName = $_POST["artistName"];
    $stock = $_POST["stock"];
    $cateCode = $_POST["cateCode"];
    $delPeriod = $_POST["delPeriod"];
    $delPrice = $_POST["delPrice"];
    
    if($stock == 0){
      $soldOut = 'O';
    } else {
      $soldOut = 'X';
    }

    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "update storeproduct set productName = '$productName', detailName = '$detailName', productPrice = '$productPrice', artistName = '$artistName', stock = $stock, cateCode = $cateCode, delPeriod = $delPeriod, delPrice = $delPrice, soldOut = '$soldOut'";


    $titleImgData = isset($_FILES["titleImg"]["tmp_name"]) ? $_FILES["titleImg"]["tmp_name"] : "";
    $mainImgData = isset($_FILES["mainImg"]["tmp_name"]) ? $_FILES["mainImg"]["tmp_name"] : "";
    $contentImgData = isset($_FILES["contentImg"]["tmp_name"]) ? $_FILES["contentImg"]["tmp_name"] : "";

    if($titleImgData != ""){
      $titleImgType = explode("/", $_FILES["titleImg"]["type"])[1];
      $titleImg = addslashes(file_get_contents($titleImgData));
      $sql .= ", titleImg = '$titleImg', titleImgType = '$titleImgType'";
    }
    if($mainImgData != ""){
      $mainImgType = explode("/", $_FILES["mainImg"]["type"])[1];
      $mainImg = addslashes(file_get_contents($mainImgData));
      $sql .= ", mainImg = '$mainImg', mainImgType = '$mainImgType'";
    }
    if($contentImgData != ""){
      $contentImgType = explode("/", $_FILES["contentImg"]["type"])[1];
      $contentImg = addslashes(file_get_contents($contentImgData));
      $sql .= ", contentImg = '$contentImg', contentImgType = '$contentImgType'";
    }
    $sql .= " where productCode = $productCode";

    mysqli_query($con, $sql);

    mysqli_close($con);
?>
<script>
  alert("수정이 완료되었습니다.");
  location.href="../manage_productList.php";
</script>
