function viewDetail(orderNo) {
  let childWindow = window.open(
    "member_orderDetail.php?orderNo=" + orderNo,
    "orderDetail",
    "width=1025, height=700"
  );

  window.addEventListener("message", function(event) {
    if (event.data === "childWindowClosed") {
      location.reload();
    }
  });
}