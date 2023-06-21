<?php
  $eventNo = isset($_GET["eventNo"]) ? $_GET["eventNo"] : 0;
?>
<script>
  const eventNo = <?php echo $eventNo ?>;
  if(memberNo != 1 || eventNo == 0){
    alert('잘못된 접근입니다.');
    location.href='../../home/php/index.php';
  }
</script>
<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from storeevent where eventNo = $eventNo";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $eventNo = $row['eventNo'];
      $eventMemberNo = $row['memberNo'];
      $title = $row['title'];
      $content = $row['content'];
      $hits = $row['hits'];
      $startDate = $row['startDate'];
      $endDate = $row['endDate'];
      $regiDate = $row['regiDate'];
    }
  }

  mysqli_close($con);
?>