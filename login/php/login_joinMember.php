<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGoodsStore</title>
  <link rel="stylesheet" href="../css/login_joinMember.css">
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <?php
    session_start();
    $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  ?>
  <script>
    const memberNo = <?php echo $memberNo ?>;
    if(memberNo > 0){
      alert('이미 로그인 된 상태입니다.');
      location.href='../../home/php/index.php';
    }
  </script>
  <div id="mainDiv">

    <div id="titleDiv">
      <div id="mainTitleDiv">
        <img src="../../img/MyGoodsStoreLogoBlack.png" alt="logoImg" width="180px" id="logoImg" onClick="location.href='../../home/php/index.php'">
      </div>
    </div>

    <form name="joinForm" action="./process/joinProc.php" method="post">
      <div id="joinDiv">

        <h1>Join Us</h1>

        <hr id="contentHr">

        <div id="subTitleDiv">
          <div id="subTitleWrapper">
            <span class="subTitle">이름</span><br>
            <span class="subTitle">생년월일</span><br>
            <span class="subTitle">성별</span><br>
            <span class="subTitle">휴대폰</span><br>
            <span class="subTitle">아이디</span><br>
            <span class="subTitle">비밀번호</span><br>
            <span class="subTitle">비밀번호 확인</span><br>
            <span class="subTitle">주소</span><br>
            <div id="emailTitle">
              <span class="subTitle">이메일</span>
            </div><br>
          </div>
        </div>
        <div id="contentDiv">
          <input type="text" name="name" id="name"><br>
          <label id="label_name"></label>
          <input type="text" name="birthYear" id="birthYear" maxlength="4" placeholder="0000" oninput="this.value = this.value.replace(/\D/g, '');"> 년
          <input type="text" name="birthMonth" id="birthMonth" maxlength="2" placeholder="00" oninput="this.value = this.value.replace(/\D/g, '');"> 월
          <input type="text" name="birthDay" id="birthDay" maxlength="2" placeholder="00" oninput="this.value = this.value.replace(/\D/g, '');"> 일 <br>
          <label id="label_birth"></label>
          <input type="radio" name="gender" id="genderMan" value="남" checked> <label for="genderMan">남자</label> &nbsp;&nbsp;
          <input type="radio" name="gender" id="genderWoman" value="여"> <label for="genderWoman">여자</label><br>
          <input type="text" name="phone1" id="phone1" maxlength="3" placeholder="000" oninput="this.value = this.value.replace(/\D/g, '');"> &nbsp;&nbsp;-&nbsp;&nbsp;
          <input type="text" name="phone2" id="phone2" maxlength="4" placeholder="0000" oninput="this.value = this.value.replace(/\D/g, '');"> &nbsp;&nbsp;-&nbsp;&nbsp;
          <input type="text" name="phone3" id="phone3" maxlength="4" placeholder="0000" oninput="this.value = this.value.replace(/\D/g, '');"><br>
          <label id="label_phone"></label>
          <input type="text" name="id" id="id" minlength="4" maxlength="16" placeholder="아이디는 4~16글자로 입력해주세요.">
          <input type="button" onClick="idCheck();" value="아이디 중복체크" id="searchIdBtn"><br>
          <label id="label_id"></label>
          <input type="hidden" name="tempId" id="tempId" value="">
          <input type="password" name="pwd" id="pwd" minlength="6" maxlength="16" placeholder="비밀번호는 6~16글자로 입력해주세요."><br>
          <label id="label_pwd"></label>
          <input type="password" name="pwdChk" id="pwdChk" minlength="6" maxlength="16"><br>
          <label id="label_pwdChk"></label>
          <input type="text" id="sample6_postcode" placeholder="우편번호" name="address1" readonly>
			    <input type="button" onClick="sample6_execDaumPostcode();" value="주소찾기" id="searchAddBtn"><br>
          <input type="text" id="sample6_address" placeholder="주소" name="address2" readonly><br>
          <input type="text" id="sample6_detailAddress" placeholder="상세주소" name="address3">
          <input type="text" id="sample6_extraAddress" placeholder="참고항목" name="address4" readonly><br>
          <label id="label_address"></label>
          <input type="text" name="email1" id="email1" placeholder="example">@
          <input type="text" name="email2" id="email2" placeholder="xxx.com"><br>
          <label id="label_email"></label>
        </div>
        <button type="button" onClick="join();" id="joinBtn">JOIN</button>
        <button type="button" onClick="goBack();" id="cancelBtn">CANCEL</button>
      </div>
    </form>

  </div>
<script src="../js/login_joinMember.js"></script>
<script src="../../commonFile/js/addressInput.js"></script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</body>
</html>