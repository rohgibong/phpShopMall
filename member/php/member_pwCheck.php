<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/member_pwCheck.css">
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
    $name = isset($_SESSION["memberNo"]) ? $_SESSION["name"] : 0;
    $id = isset($_SESSION["memberNo"]) ? $_SESSION["id"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo <= 0){
      alert('잘못된 접근입니다.');
      location.href='../../home/php/index.php';
    }
  </script>

<div id="mainDiv">
  <div id="titleDiv">
    <div id="mainTitleDiv">
      <img src="../../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../index.php'">
    </div>
  </div>

  <form name="checkForm" action="./process/member_pwCheckProc.php" method="post">
    <div id="contentDiv">
      <h1>회원정보 확인</h1>

      <div id="subTitleDiv">
        <span id="subTitleSpan"><?=$name ?>(<?=$id ?>)</span>님의 정보를 안전하게 보호하기 위해 비밀번호를 다시 한번 확인합니다.
      </div>

      <div id="mentDiv">
        <span id="idTitle">ID</span><br><br>
        <span id="pwdTitle">PASSWORD</span>
      </div>

      <div id="inputDiv">
        <input type="text" name="id" id="id" value="<?=$id ?>" readonly><br>
        <input type="password" name="pwd" id="pwd" onkeydown="if(event.keyCode==13) check()"><br>
      </div>
      <label id="label_pwd"></label>
      <div id="btnDiv">
        <button type="button" onClick="check();" id="checkBtn">확인</button>
        <button type="button" onClick="location.href='member_myPage.php';" id="cancelBtn">취소</button>
      </div>
    </div>
  </form>
</div>
<script src="../js/member_pwCheck.js"></script>
</body>
</html>