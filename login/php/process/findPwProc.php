<?php
  $id = $_POST["id"];
  $name = $_POST["name"];
  $phone1 = $_POST["phone1"];
  $phone2 = $_POST["phone2"];
  $phone3 = $_POST["phone3"];

  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");

  $sql = "select memberNo from storemember where id = '$id' and name = '$name' and phone1 = '$phone1' and phone2 = '$phone2' and phone3 = '$phone3'";

  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  
  if($row_cnt == 0){
    echo "
      <script>
      alert('일치하는 회원정보가 없습니다.');
      location.href = '../login_findPw.php';
      </script>
    ";
  } else {
    while($row = mysqli_fetch_assoc($result)) {
      $memberNo = $row['memberNo'];
    }
    echo "
      <script>
        alert('비밀번호는 분실 시 찾아드릴 수 없는 정보입니다.                           비밀번호를 다시 설정해주세요.');
        location.href = '../login_changePw.php?memberNo=$memberNo';
      </script>
    ";
  }
  

?>
