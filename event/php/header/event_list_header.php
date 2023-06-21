<?php
  $pageNumber = isset($_GET["pageNumber"]) ? $_GET["pageNumber"] : 1;
?>
<?php
  $pageSet = 5;
  $startNum = ($pageSet * ($pageNumber-1) + 1);
  $endNum = $pageSet * $pageNumber;
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "select * from (select row_number() over(order by regiDate desc) as rowNum, e.* from storeevent e) as subquery where rowNum >= $startNum and rowNum <= $endNum;";
  $result = mysqli_query($con, $sql);
  $row_cnt = mysqli_num_rows($result);
  $count = 0;
  $num = 0;
  if($row_cnt != 0){
    while($row = mysqli_fetch_assoc($result)){
      $content[$num]['eventNo'] = $row['eventNo'];
      $content[$num]['memberNo'] = $row['memberNo'];
      $content[$num]['title'] = $row['title'];
      $content[$num]['content'] = $row['content'];
      $content[$num]['hits'] = $row['hits'];
      $content[$num]['startDate'] = $row['startDate'];
      $content[$num]['endDate'] = $row['endDate'];
      $content[$num]['regiDate'] = $row['regiDate'];
      $num++;
    }
  }
  $sql = "select count(*) from storeevent;";
  $result2 = mysqli_query($con, $sql);
  $eventCount = mysqli_fetch_array($result2)[0];
  if($eventCount == 0){
    $pageCount = 1;
  } else {
    $pageCount = floor(($eventCount-1) / $pageSet) + 1;
  }

  if($pageNumber < 1 || $pageNumber > $pageCount){
    echo '<script>alert("잘못된 접근입니다.");location.href="../../home/php/index.php";</script>';
  }
  
  mysqli_close($con);
?>