<?php
  session_start();
  $memberNo = isset($_SESSION["memberNo"]) ? $_SESSION["memberNo"] : 0;
  $productCode = isset($_GET["productCode"]) ? $_GET["productCode"] : 0;
?>
<script>
  const memberNo = <?php echo $memberNo ?>;
  const productCode = <?php echo $productCode?>;
  if(memberNo != 1 || productCode == 0){
    alert('잘못된 접근입니다.');
    location.href='../../../home/php/index.php';
  }
</script>
<?php
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "update storeproduct set stock = 0, soldOut = 'O' where productCode = $productCode";

  mysqli_query($con, $sql);

  mysqli_close($con);
?>
<script>
  location.href="../product_detail.php?productCode="+productCode;
</script>