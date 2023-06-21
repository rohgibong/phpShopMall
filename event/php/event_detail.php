<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/event_detail.css">
</head>
<body>
  
<div id="mainDiv">
  <?php include "../../commonFile/php/header.php";?>
  <?php include "./header/event_detail_header.php";?>

  <div id="contentDiv">
    <table id="eventTable">
      <tr>
        <td id="titleId">
          <?=$title ?>
        </td>
      </tr>
      <tr>
        <td id="dateId">
          이벤트 기간 : <?=$startDate ?> ~ <?=$endDate ?>
          <span>
            조회수 : <?=$updateHits ?>
          </span>
        </td>
      </tr>
      <tr>
        <td id="contentId">
          <?=$content ?>
        </td>
      </tr>
    </table>
    <div id="btnDiv">
      <?php if($memberNo == $eventMemberNo): ?>
      <button type="button" onClick="updateEvent(<?=$eventNo ?>);">수정</button>
      <button type="button" onClick="deleteEvent(<?=$eventNo ?>);">삭제</button>
      <?php endif; ?>
      <button type="button" onClick="location.href='event_list.php'">목록</button>
    </div>
    
  </div>

</div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/event_detail.js"></script>
</body>
</html>