  <?php
    $memberNo = $_POST["memberNo"];
    $birth1 = $_POST["birth1"];
    $birth2 = $_POST["birth2"];
    $birth3 = $_POST["birth3"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];
    $pwd = $_POST["pwd"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $address3 = $_POST["address3"];
    $address4 = $_POST["address4"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];

    $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
    $sql = "update storemember set birth1 = '$birth1', birth2 = '$birth2', birth3 = '$birth3', phone1 = '$phone1', phone2 = '$phone2', phone3 = '$phone3', pwd = '$pwd', address1 = $address1, address2 = '$address2', address3 = '$address3', address4 = '$address4', email1 = '$email1', email2 = '$email2' where memberNo = $memberNo";

    mysqli_query($con, $sql);

    mysqli_close($con);
  ?>
  <script>
    alert("수정이 완료되었습니다.");
    location.href="../member_modify.php?memberNo=<?=$memberNo ?>";
  </script>