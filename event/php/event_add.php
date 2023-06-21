<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../../commonFile/css/header.css">
  <link rel="stylesheet" href="../css/event_add.css">
</head>
<body>
  
  <div id="mainDiv">
    <?php include "../../commonFile/php/header.php";?>
    <script>
      if(memberNo != 1){
        alert('잘못된 접근입니다.');
        location.href='../../home/php/index.php';
      }
    </script>

    <div id="contentDiv">
        <h2>이벤트 등록</h2>
        <hr>
        <form name="eventForm" action="./process/addEventProc.php" method="post">
          <input type="hidden" id="memberNo" name="memberNo" value="<?=$memberNo ?>">
          <input type="text" id="titleInput" name="titleInput" placeholder="T i t l e">
          <br>
          <label for="startDate" class="dateMent">시작일 : </label>
          <input type="date" id="startDate" name="startDate" class="dateInput">
          <label for="endDate" class="dateMent">종료일 : </label>
          <input type="date" id="endDate" name="endDate" class="dateInput">
          <br>
          <textarea name="contentInput" id="contentInput" cols="95" rows="15"></textarea>
          <br>
          <div id="btnDiv">
            <button type="button" onClick="location.href='event_list.php';">취소하기</button>
            <button type="button" onClick="addEvent();">등록하기</button>
          </div>
        </form>
        
    </div>
    

  </div>
<script src="../../commonFile/js/header.js"></script>
<script src="../js/event_add.js"></script>
</body>
</html>