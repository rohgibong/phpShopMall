<?php
  $productCode = $_GET['productCode'];
  
  $con = mysqli_connect("localhost", "user1", "12345", "phpfinalproject");
  $sql = "update storeproduct set stock = 0, soldOut = 'O' where productCode = $productCode";

  mysqli_query($con, $sql);

  mysqli_close($con);
?>

<script>
  location.href="../manage_productList.php";
</script>