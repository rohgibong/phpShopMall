function cancelOrder(){
  if(confirm('정말 주문을 취소하시겠습니까?')){
    location.href="./process/member_cancelOrderProc.php?orderNo="+orderNo;
  }
}

window.onbeforeunload = function() {
  window.opener.postMessage("childWindowClosed", "*");
};
