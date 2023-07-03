<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  if(memberNo != 1){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $pageSet = 10;
  $startNum = ($pageSet * ($pageNumber-1) + 1);
  $endNum = $pageSet * $pageNumber;
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from (select row_number() over(order by memberNo asc) as rowNum, m.* from storemember m) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  $count = 0;
  $num = 0;

  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $member[$num]['rowNum'] = $row['rowNum'];
      $member[$num]['memberNo'] = $row['memberNo'];
      $member[$num]['name'] = $row['name'];
      $member[$num]['birth1'] = $row['birth1'];
      $member[$num]['birth2'] = $row['birth2'];
      $member[$num]['birth3'] = $row['birth3'];
      $member[$num]['gender'] = $row['gender'];
      $member[$num]['phone1'] = $row['phone1'];
      $member[$num]['phone2'] = $row['phone2'];
      $member[$num]['phone3'] = $row['phone3'];
      $member[$num]['id'] = $row['id'];
      $member[$num]['pwd'] = $row['pwd'];
      $member[$num]['address1'] = $row['address1'];
      $member[$num]['address2'] = $row['address2'];
      $member[$num]['address3'] = $row['address3'];
      $member[$num]['address4'] = $row['address4'];
      $member[$num]['email1'] = $row['email1'];
      $member[$num]['email2'] = $row['email2'];
      $member[$num]['regiDate'] = $row['regiDate'];
      $member[$num]['level'] = $row['level'];
      $member[$num]['point'] = $row['point'];
      $member[$num]['age'] = 2023 - $member[$num]['birth1'] + 1;
      $num++;
    }
  }
  $sql = "select count(*) from storemember;";
  $result2 = mysqli_query($con, $sql);
  $memberCount = mysqli_fetch_array($result2)[0];
  if($memberCount == 0){
    $pageCount = 1;
  } else {
    $pageCount = floor(($memberCount-1) / $pageSet) + 1;
  }

  if($pageNumber < 1 || $pageNumber > $pageCount){
    echo '<script>alert("잘못된 접근입니다.");location.href="../../home/php/index.php";</script>';
  }
  
  mysqli_close($con);
?>