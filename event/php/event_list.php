<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/event_list.css">
</head>
<body>
  
  <div id="mainDiv">
    <?php include "../../commonFile/php/header.php";?>
    <?php include "./header/event_list_header.php";?>

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
        <div class="subTitle" onClick="location.href='../../funding/php/funding_list.php'">
            FUNDING
        </div>
        <div class="changeTitle" onClick="location.href='event_list.php'">
            EVENT
        </div>
      </div>

      <div id="eventDiv">
        <!-- <span id="eventTableMent">진행중인 이벤트</span> -->
        <select id="eventTableMent" onChange="changeEvent(this.value);">
          <?php if($process == 'o'): ?>
            <option value="o" selected>진행중인 이벤트</option>
            <option value="x">종료된 이벤트</option>
            <?php else: ?>
              <option value="o">진행중인 이벤트</option>
              <option value="x" selected>종료된 이벤트</option>
          <?php endif; ?>
        </select>
        <div id="eventPlace">
          <table id="eventTable" border="0">
          <?php if($num == 0): ?>
            <tr>
              <td id="emtpyTd">
                이벤트가 없습니다.
              </td>
            </tr>
          <?php else : ?>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>이벤트 기간</th>
            </tr>
          <?php while($count < $num): ?>
            <tr>
              <td class="tdClass" id="NoId"><?=$count+1 ?></td>
              <td class="tdClass" id="titleId">
                <span id="titleSpan" onClick="location.href='event_detail.php?eventNo=<?=$content[$count]['eventNo'] ?>'">
                  <?=$content[$count]['title'] ?>
                </span>
              </td>
              <td class="tdClass" id="dateId"><?=$content[$count]['startDate'] ?> ~ <?=$content[$count]['endDate'] ?></td>
            </tr>
            <?php
              $count++;
              endwhile;
            ?>
          <?php endif; ?>
          </table>
        </div>

        <div id="writeDiv">
          <?php if ($memberNo == 1) : ?>
          <button onClick="location.href='event_add.php'">등록하기</button>
          <?php endif; ?>
        </div>
        <div id="pageDiv">
          <?php if($pageNumber > 1) : ?>
            <span class="arrowBtn" onClick="location.href='event_list.php?pageNumber=<?=$pageNumber-1 ?>'">< 이전</span>
          <?php else : ?>
            <span class="arrowBtn" id="noName">< 이전</span>
          <?php endif ; ?>
          
          <?php for($page = 1; $page < $pageCount+1; $page++) : ?>
            <span id="pageSpan" onClick="location.href='event_list.php?pageNumber=<?=$page ?>'">
              <?=$page ?>
            </span>
          <?php endfor; ?>
          
          <?php if($pageNumber < $pageCount) : ?>
            <span class="arrowBtn" onClick="location.href='event_list.php?pageNumber=<?=$pageNumber+1 ?>'">다음 ></span>
          <?php else : ?>
            <span class="arrowBtn" id="noName">다음 ></span>
          <?php endif ; ?>
        </div>
      </div>
    </div>

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/event_list.js"></script>
</body>
</html>