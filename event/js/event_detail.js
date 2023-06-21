function updateEvent(eventNo){
  location.href='event_update.php?eventNo='+eventNo;
}

function deleteEvent(eventNo){
  if(confirm('정말 삭제하시겠습니까?')){
    location.href='./process/deleteEventProc.php?eventNo='+eventNo;
  }
}