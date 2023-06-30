<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/manage_memberList.css">
</head>
<body>
  <?php include "./header/manage_memberList_header.php";?>
  <div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../../home/php/index.php'">
    </div>
  </div>

  <div id="contentDiv">
    <div id="titleMentDiv">
      <span id="titleMent">회원 리스트</span>
    </div>
    <div id="tableDiv">
      <table id="memberTable">
        <tr>
          <th>회원번호</th>
          <th>이름</th>
          <th>성별</th>
          <th>나이</th>
          <th>생년월일</th>
          <th>연락처</th>
          <th>등급</th>
          <th>보유포인트</th>
        </tr>
        <?php while($count < $num): ?>
        <tr id="memberTr">
          <td id="firstTd">
            <?php if($member[$count]['memberNo'] == 1): ?>
              <span>관리자</span>
            <?php else: ?>
              <?=$member[$count]['memberNo'] ?>
            <?php endif; ?>
          </td>
          <td id="secondTd">
            <?=$member[$count]['name'] ?>
          </td>
          <td id="thirdTd">
            <?=$member[$count]['gender'] ?>
          </td>
          <td id="fourthTd">
            <?=$member[$count]['age'] ?>
          </td>
          <td id="fifthTd">
            <?=$member[$count]['birth1'] ?>년 <?=$member[$count]['birth2'] ?>월 <?=$member[$count]['birth3'] ?>일
          </td>
          <td id="sixthTd">
            <?=$member[$count]['phone1'] ?>-<?=$member[$count]['phone2'] ?>-<?=$member[$count]['phone3'] ?>
          </td>
          <td id="seventhTd">
            <?php if($member[$count]['level'] == 1): ?>
              <span>BRONZE</span>
            <?php elseif($member[$count]['level'] == 2): ?>
              <span>SILVER</span>
            <?php elseif($member[$count]['level'] == 2): ?>
              <span>GOLD</span>
            <?php elseif($member[$count]['level'] == 4): ?>
              <span>PLATINUM</span>
            <?php elseif($member[$count]['level'] == 5): ?>
              <span>DIAMOND</span>
            <?php endif; ?>
          </td>
          <td id="eightthTd">
            <?=$member[$count]['point'] ?>점
          </td>
        </tr>
        <?php 
          $count++;
          endwhile;
        ?>
      </table>
    </div>

  </div>
  
  
<script src="../js/manage_memberList.js"></script>
</body>
</html>