<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select count(*) from storeorder where memberNo = $memberNo;";
  $res = mysqli_query($con, $sql);
  $countNum = mysqli_fetch_array($res)[0];
?>

<div id="contentTopDiv">
  <div id="imgDiv">
    <img src="../../img/myPageUser.png" alt="" width="150px">
  </div>
  <div id="infoDiv">
    <span id="nameSpan">
      <?=$name ?>님 &nbsp;
      <?php if($level == 1): ?>
        BRONZE
      <?php elseif($level == 2): ?>
        SILVER
      <?php elseif($level == 3): ?>
        GOLD
      <?php elseif($level == 4): ?>
        PLATINUM
      <?php elseif($level == 5): ?>
        DIAMOND
      <?php endif; ?>
    </span>
    <div>
      <span id="countSpan" onClick="location.href='member_orderPage.php'">
        주문내역 <br>
        <span><?=$countNum ?></span>
      </span>
      <span id="pointSpan">
        포인트 <br>
        <span><?=$point ?> P</span>
      </span>
      <span id="couponSpan">
        쿠폰 <br>
        <span>0</span>
      </span>
    </div>
  </div>
</div>