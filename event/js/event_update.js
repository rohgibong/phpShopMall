let titleInput = document.eventForm.titleInput;
let contentInput = document.eventForm.contentInput;
let startDate = document.eventForm.startDate;
let endDate = document.eventForm.endDate;

function updateEvent(){
  if(titleInput.value == ""){
    alert("제목을 입력해주세요!");
    titleInput.focus();
    return;
  }
  if(startDate.value == ""){
    alert("시작일을 입력해주세요!");
    return;
  }
  if(endDate.value == ""){
    alert("종료일을 입력해주세요!");
    return;
  }
  if(contentInput.value == ""){
    alert("내용을 입력해주세요!");
    contentInput.focus();
    return;
  }
  if(confirm("수정 하시겠습니까?")){
    document.eventForm.submit();
  }
}