<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/event_update.css">
</head>
<body>
  
  <div id="mainDiv">
    <?php include "../../commonFile/php/header.php";?>
    <?php include "./header/event_update_header.php";?>

    <div id="contentDiv">
        <h2>이벤트 수정</h2>
        <hr>
        <form name="eventForm" action="./process/updateEventProc.php" method="post">
          <input type="hidden" id="eventNo" name="eventNo" value="<?=$eventNo ?>">
          <input type="text" id="titleInput" name="titleInput" placeholder="T i t l e" value="<?=$title ?>">
          <br>
          <label for="startDate" class="dateMent">시작일 : </label>
          <input type="date" id="startDate" name="startDate" class="dateInput" value="<?=$startDate ?>">
          <label for="endDate" class="dateMent">종료일 : </label>
          <input type="date" id="endDate" name="endDate" class="dateInput" value="<?=$endDate ?>">
          <br>
          <textarea name="contentInput" id="contentInput" cols="95" rows="15"><?=$content ?></textarea>
          <br>
          <div id="btnDiv">
            <button type="button" onClick="location.href='event_detail.php?eventNo=<?=$eventNo ?>';">취소하기</button>
            <button type="button" onClick="updateEvent();">수정하기</button>
          </div>
        </form>
        
    </div>
    

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/event_update.js"></script>
</body>
</html>